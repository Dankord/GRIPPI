<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StationsTestSeeder extends Seeder
{
    public function run(): void
    {
        $stations = [
            [
                'name' => 'Station 1',
                'address' => 'Marilao, Bulacan',
                'is_active' => true,
                'deleted_at' => null,
            ],
            [
                'name' => 'Station 2',
                'address' => 'Meycauayan, Bulacan',
                'is_active' => true,
                'deleted_at' => null,
            ],
            [
                'name' => 'Station 3',
                'address' => 'Bocaue, Bulacan',
                'is_active' => true,
                'deleted_at' => null,
            ],
            [
                'name' => 'Station 4',
                'address' => 'Malolos, Bulacan',
                'is_active' => false,
                'deleted_at' => null,
            ],
            [
                'name' => 'Station 5',
                'address' => 'Meycauayan, Bulacan',
                'is_active' => true,
                'deleted_at' => null,
            ],
        ];

        DB::table('stations')->insert(
            array_map(fn ($station) => [
                ...$station,
                'created_at' => now(),
                'updated_at' => now(),
            ], $stations)
        );
    }
}
