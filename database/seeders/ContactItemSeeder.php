<?php

namespace Database\Seeders;

use App\Models\ContactItem;
use Illuminate\Database\Seeder;

class ContactItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactItem::create([
            'map_code' => ' <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7360.768539890718!2d90.3502345810408!3d22.71395433888304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755369d678f1643%3A0xa6b5fb9e5df4a123!2z4Kas4Ka_4KaG4Kaw4Kaf4Ka_4Ka44Ka_IOCmrOCmvuCmuCDgpqHgpr_gpqrgp4ssIOCmqOCmpeCngeCmsuCnjeCmsuCmvuCmrOCmvuCmpg!5e0!3m2!1sen!2sbd!4v1725812639154!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        ]);
    }
}
