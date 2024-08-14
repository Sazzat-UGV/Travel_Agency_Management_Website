<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Cultural Exploration',
            'Adventure Safari',
            'Nature Excursion',
            'Cruise Voyage',
            'City Discovery',
            'Educational Journey',
            'Luxury Retreat',
            'Photography Expedition',
        ];

        foreach ($categories as $item) {
            BlogCategory::create([
                'name' => $item,
                'slug' => Str::slug($item),
            ]);
        }
    }
}
