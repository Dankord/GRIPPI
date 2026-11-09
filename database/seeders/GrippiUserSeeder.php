<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class GrippiUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(! app()->environment('local')) {
            throw new \LogicException('GRIPPI test accounts is onyl for local environment');
        }

        $testPassword = "password123";

        $accounts = [
            [
                'name' => 'admin',
                'personnel_number' => 'TEST-ADMIN-001',
                'role' => User::ROLE_ADMIN
            ],
            [
                'name' => 'encoder',
                'personnel_number' => 'TEST-ENCODER-001',
                'role' => User::ROLE_ENCODER
            ],
            [
                'name' => 'admin',
                'personnel_number' => 'TEST-OFFICER-001',
                'role' => User::ROLE_OFFICER
            ]
        ];

        foreach ($accounts as $data) {
            $user = User::withTrashed()
                ->where('personnel_number', $data['personnel_number'])
                ->first();

                if(!$user) {
                    $user = new User();
                }

                $user->forceFill([
                    ...$data,
                    'password' => $testPassword,
                    'station_id' => null,
                    'deleted_at' => null
                ]);

                $user->save();
        }
    }
}
