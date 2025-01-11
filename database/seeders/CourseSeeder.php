<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'course_name' => 'Course 1',
            'name' => 'Sample Name', // مقداردهی ستون name
            'units' => 3,
            'credit' => 4,
            'semester' => 1
        ]);
        
        Course::create([
            'course_name' => 'Course 2',
            'name' => 'Another Name', // مقداردهی ستون name
            'units' => 4,
            'credit' => 3,
            'semester' => 2
        ]);
        
    }
}        