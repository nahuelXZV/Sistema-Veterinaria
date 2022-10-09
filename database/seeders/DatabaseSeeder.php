<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            ClienteSeeder::class,
            MascotaSeeder::class,
        ]);
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Administrador');

        Proveedor::create([
            'nombre' => 'Proveedor 1',
            'direccion' => 'Direccion 1',
            'telefono' => '12345678',
            'correo' => 'prove@gmail.com',
            'tipo' => 'Proveedor',
            'encargado' => 'Encargado 1',
        ]);

        Producto::create([
            'nombre' => 'Producto 1',
            'descripcion' => 'Descripcion 1',
            'precio' => 100,
            'tipo' => 'Producto',
            'cantidad' => 10,
        ]);

        Producto::create([
            'nombre' => 'Producto 2',
            'descripcion' => 'Descripcion 2',
            'precio' => 200,
            'tipo' => 'Producto',
            'cantidad' => 20,
        ]);
    }
}
