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
            'name' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'completed' => $this->faker->boolean(),
            'assignee' => $this->faker->name(),
            'category' => $this->faker->randomElement(['Urgent and Important', 'Not Urgent but Important', 'Urgent but Not Important', 'Not Urgent and Not Important']),
            'due_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'priority' => $this->faker->randomElement(['High', 'Medium', 'Low']),
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
