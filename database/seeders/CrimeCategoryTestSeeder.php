<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CrimeCategoryTestSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Theft',
                'description' => 'Unlawful taking of another person\'s property without consent.',
            ],
            [
                'name' => 'Robbery',
                'description' => 'Taking property through force, intimidation, or threat.',
            ],
            [
                'name' => 'Physical Assault',
                'description' => 'Causing physical harm or injury to another person.',
            ],
            [
                'name' => 'Sexual Offense',
                'description' => 'Criminal acts involving non-consensual sexual conduct.',
            ],
            [
                'name' => 'Homicide',
                'description' => 'Unlawful killing of another person.',
            ],
            [
                'name' => 'Grand Theft Auto',
                'description' => 'Criminal activities involving unauthorized use of motor vehicles.',
            ],
            [
                'name' => 'Fraud',
                'description' => 'Deception or misrepresentation intended to obtain unlawful benefits.',
            ],
            [
                'name' => 'Vandalism',
                'description' => 'Intentional destruction or damage to public or private property.',
            ],
            [
                'name' => 'Trespassing',
                'description' => 'Unauthorized entry into or remaining on another person\'s property.',
            ],
            [
                'name' => 'Cybercrime',
                'description' => 'Criminal activities involving computers, digital devices, or online systems.',
            ],
            [
                'name' => 'Domestic Violence',
                'description' => 'Abuse or violence committed against a family or household member.',
            ],
            [
                'name' => 'Public Disturbance',
                'description' => 'Acts that disrupt public peace, safety, or order.',
            ],
        ];

        DB::table('crime_categories')->insert(
            array_map(fn ($category) => [
                ...$category,
                'created_at' => now(),
                'updated_at' => now(),
            ], $categories)
        );
    }
}
