<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabana; 

class CabanaController extends Controller
{
    // Permisos de ver, crear, editar y eliminar para esta tabla.

    function __construct()
    {
         $this->middleware('permission:ver-cabana|crear-cabana|editar-cabana|borrar-cabana')->only('index');
         $this->middleware('permission:crear-cabana', ['only' => ['create','store']]);
         $this->middleware('permission:editar-cabana', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-cabana', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          //Obtenemos todos los registros de esta tabla con paginación 5. 
          $cabanas = Cabana::paginate(5);
          // DIRIJIMOS A LA VISTA INDEX Y MANDAMOS TODOS LOS REGISTROS MEDIANTE EL COMPACT. 
          return view('cabanas.index',compact('cabanas'));
          
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        return view('cabanas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required|unique:cabanas,nombre',
            'capacidad' => 'required',
            'disponibilidad' => 'required',
            'descripcion' => 'required',
        ]);
    
        Cabana::create($request->all());
    
        return redirect()->route('cabanas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cabana $cabana)
    {
        return view('cabanas.editar',compact('cabana'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cabana $cabana)
    {
        request()->validate([
            'nombre' => 'required|unique:cabanas,nombre,' . $cabana->id,
            'capacidad' => 'required',
            'disponibilidad' => 'required',
            'descripcion' => 'required',
        ]);
    
        $cabana->update($request->all());
    
        return redirect()->route('cabanas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cabana $cabana)
    {
        $cabana->delete();
    
        return redirect()->route('cabanas.index');
    }
}
