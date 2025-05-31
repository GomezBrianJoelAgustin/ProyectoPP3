<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Maintenance;
use App\Models\Machine; 


class MaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // $machines = Machine::inRandomOrder()->take(5)->get();

        // foreach($machines as $machine){
        //     Maintenance::factory()->create([
        //         'id_machine' => $machine->id,
        //     ]);
        // }

    }
}
