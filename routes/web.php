<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});



// Login route
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/varify', [AuthController::class, 'varify'])->name('varify');
//Route::post()
// Role-based dashboards
Route::middleware('auth')->group(function () {
    Route::get('/dashboard/student', [AuthController::class, 'studentDashboard'])->middleware('role:student');
    Route::get('/dashboard/teacher', [AuthController::class, 'teacherDashboard'])->middleware('role:teacher');
    Route::get('/dashboard/employee', [AuthController::class, 'employeedashboard'])->name('role:employee');


});

Route::middleware(['auth'])->get('/dashboard', [DashboardController::class, 'index']);
Route::get('/employee', [EmployeeController::class, 'index'])->name('emlpoyee.dashboard');
Route::get('/student/select-course', [StudentController::class, 'selectCourse'])->name('student.selectCourse');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/courses', [CourseController::class, 'index']);

