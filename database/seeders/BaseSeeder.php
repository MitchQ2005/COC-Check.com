<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Base;
use App\Models\User;

class BaseSeeder extends Seeder
{
    public function run()
    {
        // Haal de eerste gebruiker op
        $user = User::first();

        // Controleer of er een gebruiker bestaat
        if ($user) {
            Base::create([
                'name' => 'Base 1',
                'image_url' => 'https://example.com/image1.jpg',
                'layout_link' => 'https://example.com/layout1',
                'description' => 'Description for Base 1',
                'base_type' => 'Type 1',
                'user_id' => $user->id, // Gebruik de dynamisch opgehaalde user_id
                'town_hall_id' => 1, // Zorg ervoor dat er een town hall met ID 1 bestaat
            ]);

            Base::create([
                'name' => 'Base 2',
                'image_url' => 'https://example.com/image2.jpg',
                'layout_link' => 'https://example.com/layout2',
                'description' => 'Description for Base 2',
                'base_type' => 'Type 2',
                'user_id' => $user->id, // Gebruik de dynamisch opgehaalde user_id
                'town_hall_id' => 1, // Zorg ervoor dat er een town hall met ID 1 bestaat
            ]);
        } else {
            // Optioneel: Gooi een foutmelding als er geen gebruiker bestaat
            throw new \Exception('No users found in the database.');
        }
    }
}