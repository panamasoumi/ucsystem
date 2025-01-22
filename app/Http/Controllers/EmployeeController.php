<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;

class EmployeeController extends Controller
{
    public function dashboard()
    {
        $courses = Course::where('semester', 'new')->get();
        $users = User::whereIn('role', ['student', 'teacher'])->get();
        if ($users === null) {
        $users = collect();
        }
    return view('employee.dashboard', compact('courses', 'users'));
    }

    public function listCourses()
    {
        $courses = Course::where('semester', 'new')->get();
        return view('employee.courses', compact('courses'));
    }


    public function listUsers()
    {
        $users = User::whereIn('role', ['student', 'teacher'])->get();
        return view('employee.users', compact('users'));
    }

 
    public function approveUser($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'approved']);
        return back()->with('success', 'User approved successfully.');
    }


    public function rejectUser($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'rejected']);
        return back()->with('success', 'User rejected successfully.');
    }

}
