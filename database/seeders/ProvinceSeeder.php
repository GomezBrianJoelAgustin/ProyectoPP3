<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $province = [
            'Buenos Aires',
            'Catamarca',
            'Chaco',
            'Chubut',
            'Córdoba',
            'Corrientes',
            'Entre Ríos',
            'Formosa',
            'Jujuy',
            'La Pampa',
            'La Rioja',
            'Mendoza',
            'Misiones',
            'Neuquén',
            'Río Negro',
            'Salta',
            'San Juan',
            'San Luis',
            'Santa Cruz',
            'Santa Fe',
            'Santiago del Estero',
            'Tierra del Fuego',
            'Tucumán',
            'Ciudad Autónoma de Buenos Aires'
        ];

        foreach($province as $name){
            Province::create(['name' => $name]);
        }
    }
}
