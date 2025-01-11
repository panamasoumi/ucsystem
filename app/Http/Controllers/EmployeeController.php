<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;

class EmployeeController extends Controller
{
    public function index()
    {
        $students = User::where('role', 2)->get();
        $teachers = User::where('role', 3)->get(); 
        $courses = Course::all(); 
        return view('employee.dashboard', compact('students', 'teachers', 'courses'));
    }
}
