<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Seeder;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amenities = [
            'Swimming Pool',
            'Mountain Bike',
            'Sightseeing',
            'Free Wifi',
            'Personal Guide',
            'Entrance Fees',
            'Air fares',
            'Accommodation',
            'Departure Taxes',
            'Festival & Events',
        ];
        foreach ($amenities as $amenity) {
            Amenity::create([
                'name' => $amenity,
            ]);
        }
    }
}
