<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crear 40 clientes con el modelo create
        Cliente::create([
            'nombre' => 'Juan Perez',
            'direccion' => 'Calle 1 # 2 - 3',
            'telefono'  => '1234567',
            'correo'   => 'juan@gmail.com',
            'otros' => 'Ninguno',
        ]);
        Cliente::create([
            'nombre' => 'Maria Lopez',
            'direccion' => 'Calle 4 # 5 - 6',
            'telefono'  => '7654321',
            'correo'   => 'maria@gmail.com',
            'otros' => 'Ninguno',
        ]);
        Cliente::create([
            'nombre' => 'Pedro Gomez',
            'direccion' => 'Calle 7 # 8 - 9',
            'telefono'  => '9876543',
            'correo'   => 'pedrp@gmail.com',
            'otros' => 'Ninguno',
        ]);
        Cliente::create([
            'nombre' => 'Luisa Martinez',
            'direccion' => 'Calle 10 # 11 - 12',
            'telefono'  => '3456789',
            'correo'   => 'luisa@gmai.com',
            'otros' => 'Ninguno',
        ]);
        Cliente::create([
            'nombre' => 'Carlos Sanchez',
            'direccion' => 'Calle 13 # 14 - 15',
            'telefono'  => '5678901',
            'correo'   => 'carlos@gmail.com',
            'otros' => 'Ninguno',
        ]);
    }
}
