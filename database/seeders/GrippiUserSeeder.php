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
            throw new \LogicException('GRIPPI test accounts is only for local environment');
        }

        $testPassword = "password123";

        $accounts = [
            [
                'name' => 'admin',
                'email' => 'admin@grippi.test',
                'personnel_number' => 'TEST-ADMIN-001',
                'email_verified_at' => now(),
                'role' => User::ROLE_ADMIN
            ],
            [
                'name' => 'sub-encoder',
                'email' => 'sub-encoder@grippi.test',
                'personnel_number' => 'TEST-SUB-ENCODER-001',
                'email_verified_at' => now(),
                'role' => User::ROLE_SUB_ENCODER
            ],
            [
                'name' => 'main-encoder',
                'email' => 'main-encoder@grippi.test',
                'personnel_number' => 'TEST-MAIN-ENCODER-002',
                'email_verified_at' => now(),
                'role' => User::ROLE_MAIN_ENCODER
            ],
            [
                'name' => 'officer',
                'email' => 'officer@grippi.test',
                'personnel_number' => 'TEST-OFFICER-001',
                'email_verified_at' => now(),
                'role' => User::ROLE_OFFICER
            ]
        ];

        foreach ($accounts as $data) {
            $user = User::withTrashed()
                ->where('email', $data['email'])
                ->first();

                if(!$user) {
                    $user = new User();
                }

                $user->forceFill([
                    ...$data,
                    'password' => $testPassword,
                    'email_verified_at' => now(),
                    'station_id' => null,
                    'deleted_at' => null
                ]);

                $user->save();
        }
    }
}
