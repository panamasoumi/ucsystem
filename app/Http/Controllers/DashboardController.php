<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('student')) {
            return view('dashboard.student');
        } elseif (auth()->user()->hasRole('teacher')) {
            return view('dashboard.teacher');
        } elseif (auth()->user()->hasRole('employee')) {
            
            $students = User::role('student')->get();
            $teachers = User::role('teacher')->get();
            $courses = Course::all();

            return view('dashboard.employee', compact('students', 'teachers', 'courses'));
        }
    }
}
