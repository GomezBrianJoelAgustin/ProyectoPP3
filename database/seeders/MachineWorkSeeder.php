<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Machine;
use App\Models\MachineWork;

class MachineWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $machines = Machine::inRandomOrder()->take(15)->get();

        // foreach($machines as $machine){
        //     MachineWork::factory()->create([
        //         'id_machines' => $machine->id,
        //     ]);
        // }
    }
}
