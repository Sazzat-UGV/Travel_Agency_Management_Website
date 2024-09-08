<?php

namespace Database\Seeders;

use App\Models\HomeItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomeItem::create([
            'destination_heading' => 'Destination Heading',
            'destination_subheading'=>'Destination Subheading',
            'destination_status'=>'Active',
            'feature_heading' => 'Feature Heading',
            'feature_subheading'=>'Feature Subheading',
            'feature_status'=>'Active',
            'package_heading'=>'Package Heading',
            'package_subheading'=>'Package Subheading',
            'package_status'=>'Active',
            'testimonial_heading'=>'Testimonial Heading',
            'testimonial_subheading'=>'Testimonial Subheading',
            'testimonial_status'=>'Active',
            'blog_heading'=>'Blog Heading',
            'blog_subheading'=>'Blog Subheading',
            'blog_status'=>'Active'
        ]);
    }
}

