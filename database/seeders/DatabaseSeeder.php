<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            SliderSeeder::class,
            WelcomeItemSeeder::class,
            FeatureSeeder::class,
            CounterItemSeeder::class,
            TestimonialSeeder::class,
            FaqSeeder::class,
            BlogCategorySeeder::class,
        ]);
    }
}
