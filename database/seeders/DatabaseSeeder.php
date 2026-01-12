<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Event;
use App\Models\EventTime;
use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Place::factory()
            ->count(100)
            ->has(Address::factory())
            ->create();
        Event::factory()->count(10000)->create();
        EventTime::factory()->count(10000)->create();
    }
}
