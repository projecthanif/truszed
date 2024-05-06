<?php

namespace Database\Factories;

use App\Models\Agent;
use Illuminate\Database\Eloquent\Factories\Factory;
use League\CommonMark\Normalizer\SlugNormalizer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $random = uuid_create();
        $slug = new SlugNormalizer();
        $slug = $slug->normalize($random);

        $listing_type = $this->faker->randomElement(['Sale', 'Rent']);
        return [
            'slug' => $slug,
            'agent_id' => Agent::class,
            'listing_type' => $listing_type,
            'status' => '',
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'price' => $this->faker->numberBetween(1000, 99999),
            'square_footing' => $this->faker->numberBetween(233, 5555),
            'no_of_bedroom' => $this->faker->numberBetween(0, 10),
            'no_of_bathroom' => $this->faker->numberBetween(0, 10),
            'year_built' => $this->faker->dateTimeThisDecade(),
            'description' => $this->faker->paragraph(),
            'admin_permission' => $this->faker->boolean(),
            'admin_remark' => $this->faker->paragraph(),
        ];
    }
}
