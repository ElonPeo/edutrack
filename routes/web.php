<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
Route::get('/', action: function () {
    return view('welcome');
});

Route::get('/authentication', function () {
    return view('auth.authentication');
})->name('authentication');

#Authentication
Route::get('authentication', [AuthController::class, 'showAuthenticationForm'])->name('authentication');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::delete('/account/delete', [AuthController::class, 'deleteAccount'])->name('account.delete')->middleware('auth');
Route::get('profile', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/password/update', [AuthController::class, 'updatePassword'])->name('password.update');




Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/teacher', function () {
        return view('teacher.dashboard');
    })->name('teacher.dashboard');

    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::get('/student/courses', [CourseController::class, 'course'])->name('student.courses');

});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/student', function () {
        return view('student.dashboard');
    });
    Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
    Route::post('/enrollments/enroll/{course}', [EnrollmentController::class, 'enroll'])->name('courses.enroll');
    Route::delete('/enrollments/leave/{course}', [EnrollmentController::class, 'leave'])->name('courses.leave');
});




