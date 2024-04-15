<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RegisteredUserController::class, 'create'])->middleware('guest');

route::group(['middleware' => ['auth']], function () {

    Route::get('/home', function () {
        return view('welcome');
    })->name('home');

    Route::resource('courses', CourseController::class);
    Route::get('dashboard', [CourseController::class,'dashboard'])->name('dashboard');
    Route::resource('inscriptions', InscriptionController::class);
    Route::get('dashboard/inscriptions/{course_id}', [InscriptionController::class,'dashboard'])->name('inscriptions.dashboard');
});

require __DIR__.'/auth.php';