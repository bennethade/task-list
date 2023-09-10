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
            //ENTER THE TABLE COLUMN NAMES AND THE DETAILS YOU WISH TO PAGE INTO THE COLUMN
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'long_description' => fake()->paragraph(7, true),
            'completed' => fake()->boolean()

        ];
    }
}
