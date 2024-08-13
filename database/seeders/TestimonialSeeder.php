<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Jack Michael',
                'location' => 'Bangladesh',
                'comment' => 'Duis ac est tincidunt, bibendum eros attendato, dignissim purus.Nunc posuere ornare velitbon, bibendum venenatis metus bibendum admora. Aliquam at vestibulum.',
            ],
            [
                'name' => 'Mateo Daniel',
                'location' => 'Indonesia',
                'comment' => 'I cannot express enough how satisfied I am with the web development services provided by Egens Lab. From the initial consultation to the final delivery, they have exceeded.',
            ],
            [
                'name' => 'Liam Nohkan',
                'location' => 'Istanbul',
                'comment' => 'I love Tour! This is an amazing service and it has saved me and my small business so much time. I plan to use it for a long time to come. And i travel with TripRex again',
            ],
            [
                'name' => 'Jack Michael',
                'location' => 'Bangladesh',
                'comment' => 'Duis ac est tincidunt, bibendum eros attendato, dignissim purus.Nunc posuere ornare velitbon, bibendum venenatis metus bibendum admora. Aliquam at vestibulum.',
            ],
            [
                'name' => 'Mateo Daniel',
                'location' => 'Indonesia',
                'comment' => 'I cannot express enough how satisfied I am with the web development services provided by Egens Lab. From the initial consultation to the final delivery, they have exceeded.',
            ],
            [
                'name' => 'Liam Nohkan',
                'location' => 'Istanbul',
                'comment' => 'I love Tour! This is an amazing service and it has saved me and my small business so much time. I plan to use it for a long time to come. And i travel with TripRex again',
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create([
                'name' => $testimonial['name'],
                'location' => $testimonial['location'],
                'comment' => $testimonial['comment'],
            ]);
        }
    }
}
