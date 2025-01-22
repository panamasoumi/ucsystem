<?php

namespace App\Http\Controllers;

use App\Models\Course; 
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all(); 
        return view('courses.index', compact('courses')); 
    }

    public function store(Request $request)
    {  
        //dd($request->all());

        $request->validate([
        'course_name' => 'required|string|max:255',
        'course_code' => 'required|string|max:10|unique:courses,course_code',
        'credit' => 'required|integer|min:0' , 
        ]);

        Course::create([
        'course_name' => $request->course_name,
        'course_code' => $request->course_code,
        'credit' => $request->credit,
        ]);

        $courses = Course::all();
        return redirect()->back()->with([
            'success' => 'Course added successfully.',
            'courses' => $courses, 
        ]);
      

        
    }
}