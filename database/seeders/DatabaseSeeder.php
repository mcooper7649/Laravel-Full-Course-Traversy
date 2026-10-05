<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the demo database (fixed data, no Faker, so it runs on a --no-dev install).
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'demo@mycodedojo.com'],
            ['name' => 'Demo User', 'password' => 'laragigs-demo']
        );

        $listings = [
            ['Senior Laravel Developer', 'laravel, php, vue', 'Acme Corp', 'Boston, MA', 'https://www.acme.com',
                'Own the backend of our flagship SaaS product. You will design APIs, tune MySQL queries, and mentor two junior developers. Five or more years of Laravel experience preferred.'],
            ['Full Stack React / Laravel Engineer', 'react, laravel, javascript', 'Stark Industries', 'Remote', 'https://www.stark.example',
                'Build customer-facing dashboards in React backed by a Laravel API. Comfortable with Inertia, Tailwind and writing tests. Fully remote, US time zones.'],
            ['Junior PHP Developer', 'php, mysql, laravel', 'Wayne Enterprises', 'Gotham, NJ', 'https://www.wayne.example',
                'A great first role: maintain internal tools, fix bugs, and ship small features with a supportive team. We pair often and value curiosity over years of experience.'],
            ['DevOps Engineer', 'docker, aws, linux', 'Umbrella Labs', 'Raleigh, NC', 'https://www.umbrella.example',
                'Keep our container platform healthy. CI/CD pipelines, Terraform, observability, and on-call rotation shared across a team of six.'],
            ['Frontend Developer (Tailwind)', 'javascript, tailwind, alpine', 'Initech', 'Austin, TX', 'https://www.initech.example',
                'Turn Figma designs into accessible, responsive Blade and Alpine.js components. Strong eye for detail and performance budgets.'],
            ['API Engineer', 'laravel, api, redis', 'Hooli', 'Palo Alto, CA', 'https://www.hooli.example',
                'Design and scale public REST APIs serving millions of requests per day. Queues, caching with Redis, and rate limiting are your bread and butter.'],
        ];

        foreach ($listings as [$title, $tags, $company, $location, $website, $description]) {
            Listing::firstOrCreate(
                ['title' => $title, 'user_id' => $user->id],
                [
                    'tags' => $tags,
                    'company' => $company,
                    'location' => $location,
                    'email' => 'jobs@' . parse_url($website, PHP_URL_HOST),
                    'website' => $website,
                    'description' => $description,
                ]
            );
        }
    }
}
