<?php

namespace App\Http\Controllers;

use App\Models\Course; // Make sure to import the Course model
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all(); // Retrieve all courses
        return view('courses.index', compact('courses')); // Pass the courses to the view
    }
}