<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Cotizador']);
        $role3 = Role::create(['name' => 'Asistente']);
        
        Permission::create(['name' => 'solicitante.list'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'contacto.list'])->syncRoles([$role2,$role3]);
        
    }
}
