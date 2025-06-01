<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MachineType;
use App\Models\Machine;
use App\Models\Maintenance;
use App\Models\MaintenanceTypes;
use App\Models\Province;
use App\Models\ReasonEnd;
use App\Models\Work;
use App\Models\MachineWork;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       $this->call([
            MachineTypeSeeder::class,
            MachineSeeder::class,
            ReasonEndSeeder::class,
            ProvinceSeeder::class,
            WorkSeeder::class,
        ]);

    }
}
