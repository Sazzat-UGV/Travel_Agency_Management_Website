<?php

namespace Database\Seeders;

use App\Models\CounterItem;
use Illuminate\Database\Seeder;

class CounterItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CounterItem::create([
            'item1_name' => 'Happy Traveler',
            'item1_number' => '6000',
            'item2_name' => 'Tours Success',
            'item2_number' => '20',
            'item3_name' => 'Positives Review',
            'item3_number' => '20',
            'item4_name' => 'Travel Guide',
            'item4_number' => '6',
        ]);
    }
}
