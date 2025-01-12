<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
public function selectCourses(Request $request)
{
    $teacher = auth()->user(); 
    
    $selectedCourses = $request->input('courses'); 

    
    $totalCredits = Course::whereIn('id', $selectedCourses)->sum('credits');

    
    if ($totalCredits > 9) {
        return redirect()->back()->withErrors('The maximum allowed credits are 9.');
    }

    
    $teacher->courses()->syncWithPivotValues($selectedCourses, ['credits' => $totalCredits]);

    return redirect()->route('teacher.dashboard')->with('success', 'Courses successfully selected.');
}

}
