<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Control;
use Illuminate\Http\Request;
use App\Models\Reservacion;
use App\Models\Cabana; 
use Carbon\Carbon;
use App\Mail\ReservacionMail;
use Illuminate\Support\Facades\Mail;


class ReservacionController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:ver-reservacion|crear-reservacion|editar-reservacion|borrar-reservacion')->only('index');
         $this->middleware('permission:crear-reservacion', ['only' => ['create','store']]);
         $this->middleware('permission:editar-reservacion', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-reservacion', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reservaciones = Control::orderBy('fecha_entrada', 'asc')
        ->paginate(5);

        return view('reservaciones.index', compact('reservaciones'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

     public function create()
{
    $cabanasDisponibles = Cabana::where('disponibilidad', 0)->get();
    $nombreUsuario = auth()->user()->name;

    return view('reservaciones.crear', compact('cabanasDisponibles', 'nombreUsuario'));
}


     public function store(Request $request)
     {
         $request->validate([
             'numero_personas' => 'required',
             'fecha_entrada' => 'required|date',
             'fecha_salida' => 'required|date|after:fecha_entrada',
             'telefono' => 'required',
             'cabanas_seleccionadas' => 'required|array',
             'cabanas_seleccionadas.*' => 'exists:cabanas,nombre',
         ]);
     
         $fechaEntrada = Carbon::parse($request->input('fecha_entrada'));
    $fechaSalida = Carbon::parse($request->input('fecha_salida'));
    $numeroPersonas = $request->input('numero_personas');

    foreach ($request->cabanas_seleccionadas as $cabanaNombre) {
        $cabanaReservada = Reservacion::whereHas('cabanas', function ($query) use ($cabanaNombre, $fechaEntrada, $fechaSalida) {
            $query->where('nombre', $cabanaNombre)
                ->where(function ($query) use ($fechaEntrada, $fechaSalida) {
                    $query->whereBetween('fecha_entrada', [$fechaEntrada, $fechaSalida])
                        ->orWhereBetween('fecha_salida', [$fechaEntrada, $fechaSalida])
                        ->orWhere(function ($query) use ($fechaEntrada, $fechaSalida) {
                            $query->where('fecha_entrada', '<=', $fechaEntrada)
                                ->where('fecha_salida', '>=', $fechaSalida);
                        });
                });
        })->exists();

        if ($cabanaReservada) {
            return redirect()->route('reservaciones.create')->with('error', 'La ' . $cabanaNombre . ' ya está reservada para el rango de fechas seleccionado.');
        }
    }


    if ($fechaSalida->lessThan($fechaEntrada)) {
        return redirect()->route('reservaciones.create')->with('error', 'La fecha de salida debe ser posterior a la fecha de entrada.');
    }

    // Calcular la duración de la estadía en días
    $duracionEstadia = $fechaEntrada->diffInDays($fechaSalida);

    // Calcular la capacidad total de las cabañas seleccionadas
    $capacidadTotal = 0;

    $numCabañasSeleccionadas = count($request->cabanas_seleccionadas);

    for ($i = 0; $i < $numCabañasSeleccionadas; $i++) {
        $cabanaNombre = $request->cabanas_seleccionadas[$i];
        $cabana = Cabana::where('nombre', $cabanaNombre)->first();
    
        if ($cabana) {
            $capacidadTotal += $cabana->capacidad;
    
            // Verificar si es la penúltima cabaña y ya cubre la capacidad
            if ($i === $numCabañasSeleccionadas - 2 && $capacidadTotal >= $numeroPersonas) {
                return redirect()->route('reservaciones.create')->with('error', 'La capacidad de las cabañas seleccionadas ya cubre la cantidad de personas en la reservación. No se puede agregar otra cabaña.');
            }
        }
    }
    
   
    // Verificar si la capacidad total es suficiente
    if ($capacidadTotal < $numeroPersonas) {
        return redirect()->route('reservaciones.create')->with('error', 'La capacidad total de las cabañas seleccionadas no es suficiente para el número de personas ingresado.');
    }

    // Calcular el número mínimo de cabañas necesarias basado en la capacidad de las cabañas
    $numeroMinimoCabanas = ($capacidadTotal > 0) ? ceil($numeroPersonas / $capacidadTotal) : 0;

    // Validar si el número de cabañas seleccionadas es suficiente
    if (count($request->cabanas_seleccionadas) < $numeroMinimoCabanas) {
        return redirect()->route('reservaciones.create')->with('error', 'El número de cabañas seleccionadas no es suficiente para el número de personas en la reservación.');
    }
        // Si la estancia es de un solo día y se va el mismo día
        if ($duracionEstadia == 0 && $fechaEntrada->isSameDay($fechaSalida)) {
            // Calcular el costo según el número de personas
            $costo = ($numeroPersonas <= 2) ? 600 : ($numeroPersonas * 250);
        } else {
            // Calcular el costo en función de la duración y el número de personas
            $costo = ($numeroPersonas <= 2) ? ($duracionEstadia * 600) : ($duracionEstadia * $numeroPersonas * 250);
        }

       

        try {
            // Crear la reserva
            $reservacion = Reservacion::create([
                'nombre_reservador' => Auth::user()->name,
                'numero_personas' => $numeroPersonas,
                'fecha_entrada' => $fechaEntrada,
                'fecha_salida' => $fechaSalida,
                'costo' => $costo,
                'telefono' => $request->telefono,
                'usuario_id' => Auth::user()->id,
            ]);
    
            // Asociar las cabañas a la reserva
            foreach ($request->cabanas_seleccionadas as $cabanaNombre) {
                $cabana = Cabana::where('nombre', $cabanaNombre)->first();
                if ($cabana) {
                    $reservacion->cabanas()->attach($cabana->id, ['fecha_reservacion' => now()]);
                }
            }
           

            return redirect()->route('reservaciones.index')->with('success', 'Reservación creada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('reservaciones.create')->with('error', 'Error al crear la reserva. Por favor, inténtalo de nuevo.');
        }
    }
     
    private function enviarCorreoReservacion(Reservacion $reservacion)
    {
        // Obtén la información necesaria de la reserva
        $asunto = 'Hola!! ' . $reservacion->usuario->name . ' Tienes una nueva reservación';
        $cuerpo = 'Detalles de la reserva:'
            . "\nFecha de entrada: " . $reservacion->fecha_entrada
            . "\nFecha de salida: " . $reservacion->fecha_salida
            . "\nNúmero de personas: " . $reservacion->numero_personas
            . "\nCosto total: $" . $reservacion->costo
            . "\nCabañas reservadas: " . implode(', ', $reservacion->cabanas->pluck('nombre')->toArray());
    
        // Enviar correo electrónico al usuario actual
        Mail::to($reservacion->usuario->email)->send(new ReservacionMail($asunto, $cuerpo, $reservacion->usuario->name));
    }

 
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservacion $reservacion)
    {
        $nombreUsuario = auth()->user()->name;
        $cabanasDisponibles = Cabana::where('disponibilidad', 0)->get();
        return view('reservaciones.editar', compact('reservacion', 'cabanasDisponibles', 'nombreUsuario'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservacion $reservacion)
    {
        if ($request->isMethod('post')) {
        $request->validate([
            'numero_personas' => 'required',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date|after:fecha_entrada',
            'telefono' => 'required',
            'cabana_id' => 'required|exists:cabanas,id',
        ]);
    
        $fechaEntrada = Carbon::parse($request->input('fecha_entrada'));
        $fechaSalida = Carbon::parse($request->input('fecha_salida'));
        $numeroPersonas = $request->input('numero_personas');
    
        // Validación de disponibilidad de cabañas
        foreach ($request->cabanas_seleccionadas as $cabanaNombre) {
            $cabanaReservada = Reservacion::whereHas('cabanas', function ($query) use ($cabanaNombre, $fechaEntrada, $fechaSalida) {
                $query->where('nombre', $cabanaNombre)
                    ->where(function ($query) use ($fechaEntrada, $fechaSalida) {
                        $query->whereBetween('fecha_entrada', [$fechaEntrada, $fechaSalida])
                            ->orWhereBetween('fecha_salida', [$fechaEntrada, $fechaSalida])
                            ->orWhere(function ($query) use ($fechaEntrada, $fechaSalida) {
                                $query->where('fecha_entrada', '<=', $fechaEntrada)
                                    ->where('fecha_salida', '>=', $fechaSalida);
                            });
                    });
            })->exists();
    
            if ($cabanaReservada) {
                return redirect()->route('reservaciones.edit', $reservacion->id)->with('error', 'La ' . $cabanaNombre . ' ya está reservada para el rango de fechas seleccionado.');
            }
        }
    
        if ($fechaSalida->lessThan($fechaEntrada)) {
            return redirect()->route('reservaciones.edit', $reservacion->id)->with('error', 'La fecha de salida debe ser posterior a la fecha de entrada.');
        }
    
        $duracionEstadia = $fechaEntrada->diffInDays($fechaSalida);
        $capacidadTotal = 0;
    
        $numCabañasSeleccionadas = count($request->cabanas_seleccionadas);
    
        for ($i = 0; $i < $numCabañasSeleccionadas; $i++) {
            $cabanaNombre = $request->cabanas_seleccionadas[$i];
            $cabana = Cabana::where('nombre', $cabanaNombre)->first();
    
            if ($cabana) {
                $capacidadTotal += $cabana->capacidad;
    
                if ($i === $numCabañasSeleccionadas - 2 && $capacidadTotal >= $numeroPersonas) {
                    return redirect()->route('reservaciones.edit', $reservacion->id)->with('error', 'La capacidad de las cabañas seleccionadas ya cubre la cantidad de personas en la reservación. No se puede agregar otra cabaña.');
                }
            }
        }
    
        if ($capacidadTotal < $numeroPersonas) {
            return redirect()->route('reservaciones.edit', $reservacion->id)->with('error', 'La capacidad total de las cabañas seleccionadas no es suficiente para el número de personas ingresado.');
        }
    
        $numeroMinimoCabanas = ($capacidadTotal > 0) ? ceil($numeroPersonas / $capacidadTotal) : 0;
    
        if (count($request->cabanas_seleccionadas) < $numeroMinimoCabanas) {
            return redirect()->route('reservaciones.edit', $reservacion->id)->with('error', 'El número de cabañas seleccionadas no es suficiente para el número de personas en la reservación.');
        }
        
        try {
            $costo = ($numeroPersonas <= 2) ? ($duracionEstadia * 600) : ($duracionEstadia * $numeroPersonas * 250);
    
            $reservacion->update([
                'numero_personas' => $numeroPersonas,
                'fecha_entrada' => $fechaEntrada,
                'fecha_salida' => $fechaSalida,
                'costo' => $costo,
                'telefono' => $request->telefono,
                // ... (Actualiza otros campos según sea necesario)
            ]);
    
            $reservacion->cabanas()->sync([$request->cabana_id => ['fecha_reservacion' => now()]]);
    
            return redirect()->route('reservaciones.index')->with('success', 'Reservación actualizada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('reservaciones.edit', $reservacion->id)->with('error', 'Error al actualizar la reserva. Por favor, inténtalo de nuevo.');
        }
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservacion $reservacion)
    {
        try {
            // Verificar si la reservación existe
            if (!$reservacion) {
                return redirect()->route('reservaciones.index')->with('error', 'La reservación no existe.');
            }
    
            // Eliminar la reservación
            $reservacion->delete();
    
            // Redirigir con un mensaje de éxito
            return redirect()->route('reservaciones.index')->with('success', 'Reservación eliminada exitosamente.');
        } catch (\Exception $e) {
            // En caso de error, imprime el mensaje de error
            dd($e->getMessage());
    
            // Redirigir con un mensaje de error
            return redirect()->route('reservaciones.index')->with('error', 'Error al eliminar la reservación. Por favor, inténtalo de nuevo.');
        }
    }
    

}
