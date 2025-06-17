<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//agregamos el modelo de permisos de spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
         //Tabla roles 

            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',


            //Opereaciones sobre la tabla cabanas
            'ver-cabana',
            'crear-cabana',
            'editar-cabana',
            'borrar-cabana',
            
            //Operaciones sobre la tabla reservaciones 
            'ver-reservacion',
            'crear-reservacion',
            'editar-reservacion',
            'borrar-reservacion',

            //operaciones sobre la tabla de actividades
            'ver-ofrece',
            'crear-ofrece',
            'editar-ofrece',
            'borrar-ofrece',

            // Tabla reservaciones
            'ver-reserva',

        ];

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}
