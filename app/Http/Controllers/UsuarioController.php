<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//agregamos lo siguiente
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UsuarioController extends Controller
{
   
    // Definimos los permisos de ver crear, editar, borrar. 
    function __construct()
    {
         $this->middleware('permission:ver-usuario|crear-usuario|editar-usuario|borrar-usuario', ['only' => ['index']]);
         $this->middleware('permission:crear-usuario', ['only' => ['create','store']]);
         $this->middleware('permission:editar-usuario', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-usuario', ['only' => ['destroy']]);
    }
   
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {      
        //Toma todos los usuarios del sistema. 
        $usuarios = User::all();
        // Al precionar el boton de usuarios en el Menu nos redirige a esta vista con todos los usuarios del sistema. 
        return view('usuarios.index',compact('usuarios'));

    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // Obtenemos todos los roles que hay en el sistema. 
        $roles = Role::pluck('name','name')->all();
        // Al precionar el boton nuevo usuario se nos manda a la vista crear y los roles que hay en el sistema. 
        return view('usuarios.crear',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validamos todos los campos para que sean requeridos si no se mandara un mensaje de error. 
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    // Creamos el usuario y por defecto se creara con el rol cliente. 
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
       
        $role_cliente = Role::where('name', 'cliente')->first(); 
        $user->assignRole($role_cliente);
     // Nos redirije a la vista index una ves guardamos. 
        return redirect()->route('usuarios.index');
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
    
    public function edit($id)
    {
        // Se obtiene los datos del usuario.
        $user = User::find($id);
        // Se obtiene los roles que hay en el sistema.
        $roles = Role::pluck('name','name')->all();
        // Se obtiene el rol actual del usuario. 
        $userRole = $user->roles->pluck('name','name')->all();
        // Nos re dirje a la vista editar con todos los parametros que se obtuvieron. 
        return view('usuarios.editar',compact('user','roles','userRole'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Valida que los campos sean correctos si no se manda un mensaje. 
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
        // Validacion de las contraseñas que sean iguales
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
       // Envia los datos a la entidad que almacena el usuario con su rol. 
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
      // Nos re dirije a la vista index una ves se guarda. 
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        // Obtiene el id del usuario que se quiere eliminar y lo elimina. 
        User::find($id)->delete();
        // Nos re dirije a la vista index. 
        return redirect()->route('usuarios.index');
    }
}
