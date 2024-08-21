<?php

namespace Database\Seeders;

use App\Models\Listing;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => '8wqFP@example.com',
        ]);

        Listing::factory(6)->create(
            [
                'user_id' => $user->id,
            ]
        );

        // Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'I8Hb6@example.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quasi?',
        // ]);

        // Listing::create([
        //     'title' => 'React.js Developer',
        //     'tags' => 'react, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'user12@example.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quasi?',
        // ]);

        // Listing::create([
        //     'title' => 'Laravel Developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'random@example.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quasi?',
        // ]);
    }
}

// User::factory()->create([
//     'name' => 'Test User',
//     'email' => 'test@example.com',
// ]);
