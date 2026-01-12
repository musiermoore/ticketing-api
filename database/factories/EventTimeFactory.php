<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventTime>
 */
class EventTimeFactory extends Factory
{
    protected static array $eventIds = [];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (!self::$eventIds) {
            self::$eventIds = Event::pluck('id')->toArray();
        }

        return [
            'event_id' => $this->faker->randomElement(self::$eventIds),

            'date' => $this->faker->dateTimeBetween('now', '+3 months')->format('Y-m-d'),

            // Event-friendly times (not 03:17 AM)
            'time' => $this->getTime(),

            'ticket_count' => $this->faker->numberBetween(0, 500),
        ];
    }

    private function getTime()
    {
        $hours = $this->faker->numberBetween(8, 22);
        $minutes = $this->faker->randomElement([0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55]);

        return sprintf(
            '%02d:%02d:00',
            $hours,
            $minutes
        );
    }
}
