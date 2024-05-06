<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agent>
 */
class AgentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $type =

        $approval = $this->faker->randomElement([true, false]);
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phone_number' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'nin' => $this->faker->numberBetween(11111111111, 99999999999),
            'approve' => $approval,
            'suspend' => $approval
        ];
    }
}
