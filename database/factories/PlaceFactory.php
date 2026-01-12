<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Place;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->title(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->companyEmail(),
            'timezone_id' => $this->faker->timezone('RU'),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Place $place) {
            $place->address()->create(
                Address::factory()->make()->toArray()
            );
        });
    }
}
