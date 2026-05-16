<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MainAbout;

class MainAboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MainAbout::create([
            'years_of_experience' => 'Quality & Experience',
            'main_heading' => 'Best Pet',
            'main_heading_highlight' => 'Care Service',
            'main_description' => "At Animal Pride, we are dedicated to providing exceptional pet grooming and care services. Our experienced team of professional groomers is committed to keeping your pets healthy, happy, and looking their best. We offer a modern, safe, and comfortable environment where your beloved pets receive the highest quality care and attention they deserve",
            'why_choose_items' => [
                'Professional grooming services for all pet breeds and sizes',
                'Experienced and certified pet care professionals',
                'Safe and comfortable environment for your pets',
            ],
        ]);
    }
}
