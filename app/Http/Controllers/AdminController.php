<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;

class AdminController extends Controller
{
    public function index()
    {
        $students = User::where('role_id', 2)->get();
        $teachers = User::where('role_id', 3)->get(); 
        $courses = Course::all(); 
        return view('admin.dashboard', compact('students', 'teachers', 'courses'));
    }
}
