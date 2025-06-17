<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ofrece;

class OfreceController extends Controller
{
    /**
     * Constructor de la clase OfreceController.
     * Define los middleware de permisos para cada acción del controlador.
     */
    function __construct()
    {
        $this->middleware('permission:ver-ofrece|crear-ofrece|editar-ofrece|borrar-ofrece')->only('index');
        $this->middleware('permission:crear-ofrece', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-ofrece', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-ofrece', ['only' => ['destroy']]);
    }

    /**
     * Muestra una lista de los registros  Ofrece.
     * Utiliza paginación para mostrar 5 registros por página.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ofreces = Ofrece::paginate(5);
        return view('ofreces.index', compact('ofreces'));
    }

    /**
     * Muestra el formulario para crear un nuevo recurso Ofrece.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ofreces.crear');
    }

    /**
     * Almacena un recurso recién creado en el almacenamiento.
     * Realiza validación de datos, asegurándose de que el nombre sea único y los precios sean numéricos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de datos
        request()->validate([
            'nombre' => 'required|unique:ofrece,nombre',
            'precio' => 'required|numeric',
            'precion' => 'required|numeric',
            'descripcion' => 'required',
        ]);

        // Crear un nuevo recurso Ofrece
        Ofrece::create($request->all());

        // Redirigir a la vista index
        return redirect()->route('ofreces.index');
    }

    /**
     * Muestra el recurso Ofrece especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // La función show no tiene implementación específica en este caso.
    }

    /**
     * Muestra el formulario para editar el recurso Ofrece especificado.
     *
     * @param  \App\Models\Ofrece  $ofrece
     * @return \Illuminate\Http\Response
     */
    public function edit(Ofrece $ofrece)
    {
        return view('ofreces.editar', compact('ofrece'));
    }

    /**
     * Actualiza el recurso Ofrece especificado en el almacenamiento.
     * Realiza validación de datos, asegurándose de que el nombre sea único y los precios sean numéricos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ofrece  $ofrece
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ofrece $ofrece)
    {
        // Validación de datos
        request()->validate([
            'nombre' => 'required|unique:ofrece,nombre,' . $ofrece->id,
            'precio' => 'required|numeric',
            'precion' => 'required|numeric',
            'descripcion' => 'required',
        ]);

        // Actualizar el recurso Ofrece
        $ofrece->update($request->all());

        // Redirigir a la vista index
        return redirect()->route('ofreces.index');
    }

    /**
     * Elimina el recurso Ofrece especificado del almacenamiento.
     *
     * @param  \App\Models\Ofrece  $ofrece
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ofrece $ofrece)
    {
        // Eliminar el recurso Ofrece
        $ofrece->delete();

        // Redirigir a la vista index
        return redirect()->route('ofreces.index');
    }
}
