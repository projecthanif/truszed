<?php

namespace Database\Factories;

use App\Models\Agent;
use App\Models\LocalGovernmentArea;
use App\Models\State;
use League\CommonMark\Normalizer\SlugNormalizer;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $status = $this->faker->randomElement(['available', 'sold']);

        $state = State::pluck('name', 'name');
        return [
            'slug' => $slug,
            'agent_id' => Agent::class,
            'listing_type' => $listing_type,
            'status' => $status,
            'address' => $this->faker->address(),
            'city' => LocalGovernmentArea::where([
                'state_id' => $state->id
            ]),
            'state' => $state,
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
