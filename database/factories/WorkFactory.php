<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Work;
use App\Models\Province;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Work>
 */
class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $dateStar = $this->faker->date('Y-m-d');
        $dateEnd = $this->faker->dateTimeBetween($dateStar, '+1 year')->format('Y-m-d');
        return [
            'name' => $this->faker->sentence(3, true), 
            'province' => Province::inRandomOrder()->first()->id,
            'date_start' => $dateStar,
            'date_end' => $dateEnd,
        ];
    }
}
