<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Spatie
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
        //
        $permisos = [
            //Todos los roles 
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Todos los productos 
            'ver-productos',
            'crear-productos',
            'editar-productos',
            'borrar-productos'
        ]; 
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]); 
        }
    }
}
