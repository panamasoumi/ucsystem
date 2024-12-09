<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


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

});

Route::middleware(['auth'])->get('/dashboard', [DashboardController::class, 'index']);

