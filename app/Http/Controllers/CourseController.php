<?php

namespace App\Http\Controllers;

use App\Models\Course; 
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all(); 
        return view('dashboard.employee', compact('courses')); 
    }

    public function store(Request $request)
    {  
        //dd($request->all());
        
        $request->validate([
        'course_name' => 'required|string|max:255',
        'course_code' => 'required|string|max:10|unique:courses,course_code',
        'credit' => 'required|integer|min:1' ,
        'semester' => 'required|integer',

         
        ]);

        Course::create([
        'course_name' => $request->input('course_name'),
        'course_code' => $request->input('course_code'),
        'credit' => $request->input('credit'),
        'semester' => $request->input('semester'),
        ]);
      

        return redirect()->route('dashboard.employee')->with('success', 'Course added successfully!');
    }
}