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
            'project_id' => $this->faker->numberBetween(0, 10),
            'name' => $this->faker->sentence(mt_rand(2,3)),
            'description' => $this->faker->sentence(mt_rand(10,20)),
            'deadline' => $this->faker->dateTimeBetween('now', '+1 year'),
            'status' =>$this->faker->randomElement(['onprogress', 'completed']),
        ];
    }
}
