<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestingUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Test',
            'last_name' => 'Staff',
            'email' => 'test-staff@test.com',
            'password' => bcrypt('password'),
        ])->assignRole('staff');

        User::create([
            'first_name' => 'Test',
            'last_name' => 'Client',
            'email' => 'test-client@test.com',
            'password' => bcrypt('password'),
        ])->assignRole('client');
    }
}
