<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherCourseController;
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
//Route::get('/employee', [EmployeeController::class, 'index'])->name('emlpoyee.dashboard');
Route::get('/student/select-course', [StudentController::class, 'selectCourse'])->name('student.selectCourse');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/courses', [CourseController::class, 'index']);

Route::group(['prefix' => 'teachers', 'middleware' => ['auth','isActiveTeacher']], function () {
    Route::post('/enroll', function () {
        dd(request()->all());
    })->name('teacher.selectCourses');

    Route::get('/courses', [TeacherCourseController::class, 'index']);
    Route::get('/courses/{course}', [TeacherCourseController::class, 'show']);
});

Route::group(['prefix' => 'students', 'middleware' => ['auth','isActiveStudent']], function () {
    Route::post('/enroll', function () {
        dd(request()->all());
    })->name('student.selectCourses');
});

Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/employee/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');
    Route::get('/dashboard/employee', [DashboardController::class, 'index'])->name('dashboard.employee');
    Route::get('/employee/courses', [EmployeeController::class, 'index'])->name('employee.courses');
    Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/employee/users', [EmployeeController::class, 'listUsers'])->name('employee.users');
    //Route::post('/employee/users/{id}/approve', [EmployeeController::class, 'approveUser'])->middleware('csrf');
    //Route::post('/employee/users/{id}/reject', [EmployeeController::class, 'rejectUser'])->name('employee.rejectUser');
});

//Route::get('/courses/list', [CourseController::class, 'list'])->name('courses.list');
