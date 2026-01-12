<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Event;
use App\Models\EventTime;
use App\Models\Place;
use App\Models\User;
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
        Place::factory(10000);
        Event::factory(1000000);   
        EventTime::factory(100000000);
    }
}
