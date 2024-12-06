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
        } elseif (auth()->user()->hasRole('staff')) {
            return view('dashboard.staff');
        }
    }
}

