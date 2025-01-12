<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('student')) {
            return view('dashboard.student');
        } elseif (auth()->user()->hasRole('teacher')) {
            return view('dashboard.teacher');
        } elseif (auth()->user()->hasRole('employee')) {
            
            $students = Students::all();
            $teachers = Teacher::all();
            $courses = Course::all();

            return view('dashboard.employee', compact('students', 'teachers', 'courses'));
        }
        
    }
}

