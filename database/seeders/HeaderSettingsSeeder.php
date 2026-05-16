<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeaderSettings;

class HeaderSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeaderSettings::firstOrCreate(
            [],
            [
                'address' => 'Pet Street 123 - New York',
                'email' => 'info@example.com',
                'phone' => '(123) 456-789',
                'social_text' => 'We are social',
                'facebook_url' => '#',
                'twitter_url' => '#',
                'instagram_url' => '#',
            ]
        );
    }
}
