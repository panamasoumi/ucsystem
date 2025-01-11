<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function selectCourse()
    {
        $courses = Course::all(); 
        dd($courses);
        return view('student', compact('courses'));
    }
}
