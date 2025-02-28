<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/authentication', function () {
    return view('auth.authentication');
})->name('authentication');


Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware('auth')->name('dashboard');


Route::get('/users', [AuthController::class, 'showUsers'])->name('users.list');


// Hiển thị form đăng nhập/đăng ký/đăng xuất
Route::get('authentication', [AuthController::class, 'showAuthenticationForm'])->name('authentication');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/change-password', [AuthController::class, 'changePassword'])->name('user.changePassword');
Route::post('/delete-account', [AuthController::class, 'deleteAccount'])->name('user.deleteAccount');


Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');



Route::post('/courses/{id}/leave', [CourseController::class, 'leaveCourse'])->name('courses.leave');
Route::post('/courses/{id}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');


