<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Maintenance;
use App\Models\Machine;
use App\Models\MaintenanceType;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maintenance>
 */
class MaintenanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // $dateStar = $this->faker->date('Y-m-d');
        // $dateEnd = $this->faker->dateTimeBetween($dateStar, '+1 year')->format('Y-m-d');
        // return [
        //     'maintenance_date_start' => $dateStar,
        //     'maintenance_date_end' => $dateEnd,
        //     'type' => MaintenanceType::inRandomOrder()->first()->id,
        // ];
    }
}
