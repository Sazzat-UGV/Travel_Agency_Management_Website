<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                'icon' => 'fas fa-briefcase',
                'heading' => 'Explore Destinations',
                'description' => 'Discover amazing places to visit, from bustling cities to serene beaches, and plan your perfect adventure with our expert guides.',
            ],
            [
                'icon' => 'fas fa-search',
                'heading' => 'Custom Travel Packages',
                'description' => 'Create custom travel packages designed to your accommodations, activities & transportation for a smooth journey.',
            ],
            [
                'icon' => 'fas fa-share-alt',
                'heading' => 'Travel Deals & Discounts',
                'description' => 'Take advantage of our exclusive travel deals and discounts, ensuring you get the best value for your dream vacation.',
            ],
        ];

        foreach ($features as $feature) {
            Feature::create([
                'icon' => $feature['icon'],
                'heading' => $feature['heading'],
                'description' => $feature['description'],
            ]);
        }
    }
}
