<?php

namespace Database\Factories;

use App\Models\Place;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    protected static array $placeIds = [];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (!self::$placeIds) {
            self::$placeIds = Place::pluck('id')->toArray();
        }

        return [
            'place_id' => $this->faker->randomElement(self::$placeIds),
            'title' => $this->faker->words(3, true)
        ];
    }
}
