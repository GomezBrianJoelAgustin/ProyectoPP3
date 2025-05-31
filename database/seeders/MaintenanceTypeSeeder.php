<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MaintenanceType;

class MaintenanceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maintenance = [
            'Mechanical failure',
            'Parts wear',
            'Component replacement',
            'Scheduled lubrication',
            'calibration'
        ];
        
        foreach($maintenance as $name){
            MaintenanceType::create(['name' => $name]);
        }
    }
}
