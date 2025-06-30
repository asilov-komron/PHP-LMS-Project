<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\StudentSubjectController;
use App\Http\Controllers\StudentTaskController;

// Main page
Route::get('/', function () {
    return view('welcome');
});

// Contact page
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Teacher Routes
Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher/subjects', [SubjectController::class, 'index'])->name('teacher.subjects.index');
    Route::get('/teacher/subjects/create', [SubjectController::class, 'create'])->name('teacher.subjects.create');
    Route::post('/teacher/subjects', [SubjectController::class, 'store'])->name('teacher.subjects.store');
    Route::get('/teacher/subjects/{subject}', [SubjectController::class, 'show'])->name('teacher.subjects.show');
    Route::get('/teacher/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('teacher.subjects.edit');
    Route::put('/teacher/subjects/{subject}', [SubjectController::class, 'update'])->name('teacher.subjects.update');
    Route::delete('/teacher/subjects/{subject}', [SubjectController::class, 'destroy'])->name('teacher.subjects.destroy');

    Route::get('/teacher/subjects/{subject}/tasks/create', [TaskController::class, 'create'])->name('teacher.tasks.create');
    Route::post('/teacher/subjects/{subject}/tasks', [TaskController::class, 'store'])->name('teacher.tasks.store');
    Route::get('/teacher/tasks/{task}', [TaskController::class, 'show'])->name('teacher.tasks.show');
    Route::get('/teacher/tasks/{task}/edit', [TaskController::class, 'edit'])->name('teacher.tasks.edit');
    Route::put('/teacher/tasks/{task}', [TaskController::class, 'update'])->name('teacher.tasks.update');

    Route::get('/teacher/solutions/{solution}/evaluate', [SolutionController::class, 'evaluate'])->name('teacher.solutions.evaluate');
    Route::post('/teacher/solutions/{solution}/evaluate', [SolutionController::class, 'storeEvaluation'])->name('teacher.solutions.storeEvaluation');



});

// // Student Routes
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/subjects', [StudentSubjectController::class, 'index'])->name('student.subjects.index');
    Route::get('/student/subjects/take', [StudentSubjectController::class, 'take'])->name('student.subjects.take');
    Route::post('/subjects/{subject}/take', [SubjectController::class, 'take'])->name('subjects.take');
    Route::post('/student/subjects/{subject}/enroll', [StudentSubjectController::class, 'enroll'])->name('student.subjects.enroll');
    Route::delete('/student/subjects/{subject}/leave', [StudentSubjectController::class, 'leave'])->name('student.subjects.leave');
    Route::get('/student/subjects/{subject}', [StudentSubjectController::class, 'show'])->name('student.subjects.show');
    Route::get('/student/tasks/{task}', [StudentTaskController::class, 'show'])->name('student.tasks.show');
    Route::post('/student/tasks/{task}/submit', [StudentTaskController::class, 'submit'])->name('student.tasks.submit');
});




require __DIR__ . '/auth.php';
