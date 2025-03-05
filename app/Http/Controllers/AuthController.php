<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard/' . Auth::user()->role);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    // Dashboards for each role
    public function studentDashboard()
    {
        $courses = auth()->user()->studentCourses;
        return view('dashboard.student',compact('courses'));
    }

    public function teacherDashboard()
    {
        $courses = auth()->user()->teacherCourses;
        return view('dashboard.teacher',compact('courses'));
    }

    public function employeeDashboard()
    {
        return view('dashboard.employee');
    }
    public function Register(Request $request)
    {
        return view('auth.register');
    }
    public function Varify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'role' => 'required|in:employee,teacher,student'
        ]);
        $user = User::create([
            'email' => $request->email,
            'name'  =>'test',
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        Auth::login($user);
        return redirect()->intended('/dashboard/' . Auth::user()->role);
    }

    

}

