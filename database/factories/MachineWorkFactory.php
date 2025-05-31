<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Machine;
use App\Models\Work;
use App\Models\ReasonEnd;
use App\Models\MachineWork;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MachineWork>
 */
class MachineWorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // $dateStart = $this->faker->date('Y-m-d');
        // $dateEnd = $this->faker->dateTimeBetween($dateStart, '+1 year')->format('Y-m-d');

        // return [
        //     'date_start' => $dateStart,
        //     'date_end' => $dateEnd,
        //     'reason_end' => ReasonEnd::inRandomOrder()->first()->id,
        //     'km_travel' => $this->faker->bothify('###'),
        //     'id_works' => Work::inRandomOrder()->first()->id,
        // ];
    }
}
