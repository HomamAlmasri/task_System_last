<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title,
            'discription' => fake()->text,
            'employer_name' => 'Test',
            'time_expected' => 3,
            'tag' => fake()->randomElement(['Back-End', 'Front-End', 'Test']),
            'priority' => fake()->randomElement(['Hight', 'Medium', 'Low']),
        ];
    }
}
