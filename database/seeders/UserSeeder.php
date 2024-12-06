<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Seeding students
        User::create([
            'name' => 'John Doe',
            'email' => 'student1@example.com',
            'password' => bcrypt('password'), // Always hash passwords
            'role' => 'student', // Assuming you have a 'role' field to store the user role
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'student2@example.com',
            'password' => bcrypt('password'),
            'role' => 'student',
        ]);

        // Seeding teachers
        User::create([
            'name' => 'Dr. Adam Johnson',
            'email' => 'teacher1@example.com',
            'password' => bcrypt('password'),
            'role' => 'teacher',
        ]);

        // Seeding employees
        User::create([
            'name' => 'Sarah Williams',
            'email' => 'employee1@example.com',
            'password' => bcrypt('password'),
            'role' => 'employee',
        ]);
    }
}
