<?php

namespace Database\Seeders;

use App\Models\Mascota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // crear 40 mascotas con el modelo create
        Mascota::create([
            'nombre' => 'Firulais',
            'sexo' => 'Macho',
            'especie' => 'Perro',
            'raza' => 'Pastor Aleman',
            'fecha_nacimiento' => '2010-01-01',
            'cliente_id' => rand(1, 4),
        ]);
        Mascota::create([
            'nombre' => 'Pelusa',
            'sexo' => 'Hembra',
            'especie' => 'Gato',
            'raza' => 'Siames',
            'fecha_nacimiento' => '2015-01-01',
            'cliente_id' => rand(1, 4),
        ]);
        Mascota::create([
            'nombre' => 'Pirulais',
            'sexo' => 'Macho',
            'especie' => 'Perro',
            'raza' => 'Pastor Aleman',
            'fecha_nacimiento' => '2010-01-01',
            'cliente_id' => rand(1, 4),
        ]);
        Mascota::create([
            'nombre' => 'Pulsa',
            'sexo' => 'Hembra',
            'especie' => 'Gato',
            'raza' => 'Siames',
            'fecha_nacimiento' => '2015-01-01',
            'cliente_id' => rand(1, 4),
        ]);
        Mascota::create([
            'nombre' => 'Firulais',
            'sexo' => 'Macho',
            'especie' => 'Perro',
            'raza' => 'Pastor Aleman',
            'fecha_nacimiento' => '2010-01-01',
            'cliente_id' => rand(1, 4),
        ]);
        Mascota::create([
            'nombre' => 'Pelusa',
            'sexo' => 'Hembra',
            'especie' => 'Gato',
            'raza' => 'Siames',
            'fecha_nacimiento' => '2015-01-01',
            'cliente_id' => rand(1, 4),
        ]);
        Mascota::create([
            'nombre' => 'Pirulais',
            'sexo' => 'Macho',
            'especie' => 'Perro',
            'raza' => 'Pastor Aleman',
            'fecha_nacimiento' => '2010-01-01',
            'cliente_id' => rand(1, 4),
        ]);
        Mascota::create([
            'nombre' => 'Pulsa',
            'sexo' => 'Hembra',
            'especie' => 'Gato',
            'raza' => 'Siames',
            'fecha_nacimiento' => '2015-01-01',
            'cliente_id' => rand(1, 4),
        ]);
        Mascota::create([
            'nombre' => 'Firulais',
            'sexo' => 'Macho',
            'especie' => 'Perro',
            'raza' => 'Pastor Aleman',
            'fecha_nacimiento' => '2010-01-01',
            'cliente_id' => rand(1, 4),
        ]);
    }
}
