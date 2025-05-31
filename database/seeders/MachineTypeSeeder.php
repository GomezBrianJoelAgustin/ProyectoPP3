<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MachineType;

class MachineTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $machines = ['Excavadora', 'Bulldozer', 'Grúa', 'Retroexcavadora', 'Tractor'];

        foreach ($machines as $name) {
            MachineType::create(['name' => $name]);
        }
    }
}
