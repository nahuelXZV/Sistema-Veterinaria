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
        Permission::create(['name' => 'cliente.index', 'description' => 'Gestionar clientes'])->syncRoles($admin, $vendedor);
        Permission::create(['name' => 'mascota.index', 'description' => 'Gestionar mascotas'])->syncRoles($admin, $vendedor, $veterinario);
        Permission::create(['name' => 'bitacora.index', 'description' => 'Gestionar bitacora'])->syncRoles($admin);
        Permission::create(['name' => 'vacuna.index', 'description' => 'Gestionar vacunas'])->syncRoles($admin, $vendedor, $veterinario);
        Permission::create(['name' => 'servicio.index', 'description' => 'Gestionar servicios'])->syncRoles($admin, $vendedor, $veterinario);
        Permission::create(['name' => 'reserva.index', 'description' => 'Gestionar reservas'])->syncRoles($admin, $veterinario);
        Permission::create(['name' => 'atencion.index', 'description' => 'Gestionar atenciones'])->syncRoles($admin, $veterinario);
        Permission::create(['name' => 'producto.index', 'description' => 'Gestionar productos'])->syncRoles($admin, $vendedor);
        Permission::create(['name' => 'proveedor.index', 'description' => 'Gestionar atenciones'])->syncRoles($admin, $vendedor);
        Permission::create(['name' => 'nota_compra.index', 'description' => 'Gestionar compras'])->syncRoles($admin, $vendedor);
        Permission::create(['name' => 'nota_venta.index', 'description' => 'Gestionar ventas'])->syncRoles($admin, $vendedor);
    }
}
