<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Roles
        $admin = Role::create(['name' => 'Administrador']);
        $vendedor = Role::create(['name' => 'Vendedor']);
        $veterinario = Role::create(['name' => 'Veterinario']);

        //Permisos
        Permission::create(['name' => 'usuario.index', 'description' => 'Gestionar usuarios'])->syncRoles($admin);
        Permission::create(['name' => 'roles.index', 'description' => 'Gestionar roles'])->syncRoles($admin);
        Permission::create(['name' => 'clientes.index', 'description' => 'Gestionar clientes'])->syncRoles($admin, $vendedor);
        Permission::create(['name' => 'mascotas.index', 'description' => 'Gestionar mascotas'])->syncRoles($admin, $vendedor, $veterinario);
    }
}
