<?php

namespace Database\Seeders;

use App\Models\ProjectType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProjectType::create([
            'name' => 'WordPress Brochure Website',
        ]);
        ProjectType::create([
            'name' => 'WordPress Ecommerce Website',
        ]);
        ProjectType::create([
            'name' => 'WordPress Membership Website',
        ]);
        ProjectType::create([
            'name' => 'WordPress Multisite',
        ]);
        ProjectType::create([
           'name' => 'Laravel Custom Application'
        ]);
        ProjectType::create([
            'name' => 'Laravel Ecommerce Application'
        ]);
        ProjectType::create([
            'name' => 'Laravel Membership Application'
        ]);
    }
}
