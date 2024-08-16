<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
           'logo'=>'default_logo.png',
           'favicon'=>'default_favicon.png',
           'banner'=>'default_banner.jpg',
           'phone'=>'+999-858 624 984',
           'email'=>'triprex@example.com',
           'address'=>'House 168/170, Avenue 01, Mirpur 10, Dhaka Bangladesh',
           'facebook'=>'#',
           'twitter'=>'#',
           'youtube'=>'#',
           'linkedin'=>'#',
           'instagram'=>'#',
           'copyright'=>'© Copyright 2024, TripRex. All Rights Reserved.',
        ]);
    }
}
