<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Calling the UserSeeder to populate users table
        $this->call(UserSeeder::class);
    }
}

