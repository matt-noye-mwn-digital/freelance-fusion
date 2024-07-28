<?php

namespace Database\Seeders;

use App\Models\ClientDetail;
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

        $client = User::create([
            'first_name' => 'Test',
            'last_name' => 'Client',
            'email' => 'test-client@test.com',
            'password' => bcrypt('password'),
        ])->assignRole('client');

        ClientDetail::create([
            'client_id' => $client->id,
            'company_name' => 'Acme Inc',
            'address_line_one' => '123 Fake Street',
            'city' => 'London',
            'state_region' => 'London',
            'postcode' => 'E1W 2RP',
            'country' => 'United Kingdom',
            'phone_number' => '0207 368 2698',
            'payment_method_id' => 3,
            'currency' => 'GBP',

        ]);
    }
}
