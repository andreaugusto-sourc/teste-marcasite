<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\InscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('courses', CourseController::class);
Route::get('dashboard/courses', [CourseController::class,'dashboard'])->name('courses.dashboard');
Route::resource('inscriptions', InscriptionController::class);
Route::get('dashboard/inscriptions/{course_id}', [CourseController::class,'dashboard'])->name('inscriptions.dashboard');