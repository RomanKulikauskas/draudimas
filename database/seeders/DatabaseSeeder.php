<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Car;
use App\Models\Owner;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Car::truncate();
        Owner::truncate();

        for ($i=0; $i<100; $i++) {
            Owner::factory(1)->hasCars(rand(1, 3))->create();
        }
    }
}
