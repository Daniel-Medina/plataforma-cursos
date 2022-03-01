<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::create([
            'name'=> 'Crear cursos'
        ]);

        Permission::create([
            'name'=> 'Leer Cursos'
        ]);

        Permission::create([
            'name'=> 'Actualizar Cursos'
        ]);

        Permission::create([
            'name'=> 'Eliminar cursos'
        ]);

        Permission::create([
            'name'=> 'Ver dashboard'
        ]);

        Permission::create([
            'name'=> 'Agregar Rol'
        ]);

        Permission::create([
            'name'=> 'Listar Rol'
        ]);

        Permission::create([
            'name'=> 'Editar Rol'
        ]);

        Permission::create([
            'name'=> 'Eliminar Rol'
        ]);

        Permission::create([
            'name'=> 'Listar usuarios'
        ]);

        Permission::create([
            'name'=> 'Editar usuario'
        ]);
    }
}
