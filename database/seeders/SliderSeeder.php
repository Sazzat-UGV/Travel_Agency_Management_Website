<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = [
            [
                'heading' => 'Trip to Nice Cities',
                'text' => 'Exploring vibrant cities, immersing in diverse cultures, visiting landmarks, savoring local cuisine, and engaging with locals offer unforgettable experiences, enriching your perspective, and creating lasting memories, making city trips unique and invaluable.',
                'button_name' => 'Read More',
                'button_link' => '#',
                'photo' => 'slider-1.jpg',
            ],
            [
                'heading' => 'Hire Quality Cars',
                'text' => 'Exploring vibrant cities, immersing in diverse cultures, visiting landmarks, savoring local cuisine, and engaging with locals offer unforgettable experiences, enriching your perspective, and creating lasting memories, making city trips unique and invaluable.',
                'button_name' => 'Read More',
                'button_link' => '#',
                'photo' => 'slider-2.jpg',
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::create([
                'heading' => $slider['heading'],
                'text' => $slider['text'],
                'button_name' => $slider['button_name'],
                'button_link' => $slider['button_link'],
                'photo' => $slider['photo'],
            ]);
        }
    }
}
