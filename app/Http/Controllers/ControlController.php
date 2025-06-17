<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Control;
use App\Models\Cabana; 
use Carbon\Carbon;
use App\Models\User;
use App\Mail\ReservacionMail;
use Illuminate\Support\Facades\Mail;

class ControlController extends Controller
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
        // Obtener el usuario autenticado
        $usuario = auth()->user();
    
        // Obtener las reservaciones asociadas al usuario actual
        $controls = Control::where('usuario_id', $usuario->id)
            ->orderBy('fecha_entrada', 'asc')
            ->paginate(5);
    
        return view('controls.index', compact('controls'));
        // Al usar esta paginación, recuerda poner en el index.blade.php este código {!! $reservaciones->links() !!}
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

    return view('controls.crear', compact('cabanasDisponibles', 'nombreUsuario'));
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
        $cabanaReservada = Control::whereHas('cabanas', function ($query) use ($cabanaNombre, $fechaEntrada, $fechaSalida) {
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
            return redirect()->route('controls.create')->with('error', 'La ' . $cabanaNombre . ' ya está reservada para el rango de fechas seleccionado.');
        }
    }


    if ($fechaSalida->lessThan($fechaEntrada)) {
        return redirect()->route('controls.create')->with('error', 'La fecha de salida debe ser posterior a la fecha de entrada.');
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
                return redirect()->route('controls.create')->with('error', 'La capacidad de las cabañas seleccionadas ya cubre la cantidad de personas en la reservación. No se puede agregar otra cabaña.');
            }
        }
    }
    
   
    // Verificar si la capacidad total es suficiente
    if ($capacidadTotal < $numeroPersonas) {
        return redirect()->route('controls.create')->with('error', 'La capacidad total de las cabañas seleccionadas no es suficiente para el número de personas ingresado.');
    }

    // Calcular el número mínimo de cabañas necesarias basado en la capacidad de las cabañas
    $numeroMinimoCabanas = ($capacidadTotal > 0) ? ceil($numeroPersonas / $capacidadTotal) : 0;

    // Validar si el número de cabañas seleccionadas es suficiente
    if (count($request->cabanas_seleccionadas) < $numeroMinimoCabanas) {
        return redirect()->route('controls.create')->with('error', 'El número de cabañas seleccionadas no es suficiente para el número de personas en la reservación.');
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
            $reservacion = Control::create([
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
           
            $this->enviarCorreoReservacion($reservacion);
            return redirect()->route('controls.index')->with('success', 'Reservación creada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('controls.create')->with('error', 'Error al crear la reserva. Por favor, inténtalo de nuevo.');
        }
    }
     

    private function enviarCorreoReservacion(Control $reservacion)
    {
        $asunto = 'Nueva Reservación - ' . $reservacion->fecha_entrada->format('d/m/Y') . ' - ' . $reservacion->fecha_salida->format('d/m/Y') .' - Total a pagar' . ' - $' . $reservacion->costo;
        $cuerpo = '¡Hola ' . $reservacion->usuario->name . '! Tienes una nueva reservación.'
            . "\n\nDetalles de la reserva:"
            . "\nFecha de entrada: " . $reservacion->fecha_entrada->format('d/m/Y')
            . "\nFecha de salida: " . $reservacion->fecha_salida->format('d/m/Y')
            . "\nNúmero de personas: " . $reservacion->numero_personas
            . "\nCosto total: $" . $reservacion->costo
            . "\nCabañas reservadas: " . implode(', ', $reservacion->cabanas->pluck('nombre')->toArray());

        // Enviar correo electrónico al usuario que hizo la reserva
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
    public function edit(Control $control)
    {
        $nombreUsuario = auth()->user()->name;
        $cabanasDisponibles = Cabana::where('disponibilidad', 0)->get();
        return view('controls.editar', compact('control', 'cabanasDisponibles', 'nombreUsuario'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Control $control)
    {
        $control->cabanas()->detach();
        $request->validate([
            'numero_personas' => 'required',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date|after:fecha_entrada',
            'cabanas_seleccionadas' => 'required|array',
             'cabanas_seleccionadas.*' => 'exists:cabanas,nombre',
        ]);
    
        $fechaEntrada = Carbon::parse($request->input('fecha_entrada'));
        $fechaSalida = Carbon::parse($request->input('fecha_salida'));
        $numeroPersonas = $request->input('numero_personas');
        
        // Validación de disponibilidad de cabañas
        foreach ($request->cabanas_seleccionadas as $cabanaNombre) {
            $cabanaReservada = Control::whereHas('cabanas', function ($query) use ($cabanaNombre, $fechaEntrada, $fechaSalida) {
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
                return redirect()->route('controls.edit', $control->id)->with('error', 'La ' . $cabanaNombre . ' ya está reservada para el rango de fechas seleccionado.');
            }
        }
    
        if ($fechaSalida->lessThan($fechaEntrada)) {
            return redirect()->route('controls.edit', $control->id)->with('error', 'La fecha de salida debe ser posterior a la fecha de entrada.');
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
                    return redirect()->route('controls.edit', $control->id)->with('error', 'La capacidad de las cabañas seleccionadas ya cubre la cantidad de personas en la reservación. No se puede agregar otra cabaña.');
                }
            }
        }
    
        if ($capacidadTotal < $numeroPersonas) {
            return redirect()->route('controls.edit', $control->id)->with('error', 'La capacidad total de las cabañas seleccionadas no es suficiente para el número de personas ingresado.');
        }
    
        $numeroMinimoCabanas = ($capacidadTotal > 0) ? ceil($numeroPersonas / $capacidadTotal) : 0;
    
        if (count($request->cabanas_seleccionadas) < $numeroMinimoCabanas) {
            return redirect()->route('controls.edit', $control->id)->with('error', 'El número de cabañas seleccionadas no es suficiente para el número de personas en la reservación.');
        }
        
        try {
            $costo = ($numeroPersonas <= 2) ? ($duracionEstadia * 600) : ($duracionEstadia * $numeroPersonas * 250);
    
            $control->update([
                'numero_personas' => $numeroPersonas,
                'fecha_entrada' => $fechaEntrada,
                'fecha_salida' => $fechaSalida,
                'costo' => $costo,
                'telefono' => $request->telefono,
                'usuario_id' => Auth::user()->id,
                // ... (Actualiza otros campos según sea necesario)
            ]);
    
            $cabanasSeleccionadasIds = Cabana::whereIn('nombre', $request->cabanas_seleccionadas)->pluck('id');
            $control->cabanas()->attach($cabanasSeleccionadasIds->toArray(), ['fecha_reservacion' => now()]);
    
            return redirect()->route('controls.index')->with('success', 'Reservación actualizada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('controls.edit', $control->id)->with('error', 'Error al actualizar la reserva. Por favor, inténtalo de nuevo.');
        }
    
    }

    public function eliminar($id)
    {
        // Encuentra la instancia del modelo con el ID proporcionado
        $control = Control::find($id);

        // Verifica si la instancia existe antes de intentar eliminarla
        if ($control) {
            // Elimina el registro
            $control->delete();
            return redirect()->route('controls.index')->with('success', 'Registro eliminado exitosamente');
        } else {
            return redirect()->route('controls.index')->with('error', 'Registro no encontrado');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Control $control)
    {
        // Eliminar la reservación
        $control->delete();
        return redirect()->route('controls.index');
    }
}