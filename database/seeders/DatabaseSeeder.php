<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            CurrencySeeder::class,
            PaymentMethodSeeder::class,
            SuperAdminSeeder::class,
            AdminSeeder::class,
            ProjectStatusSeeder::class,
            ProjectTypeSeeder::class,
            //TestingUserSeeder::class,

        ]);
    }
}
