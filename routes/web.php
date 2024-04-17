<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InscriptionController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', [RegisteredUserController::class, 'create'])->middleware('guest');

route::group(['middleware' => ['auth']], function () {

    Route::get('/home', function () {
        return view('welcome', ['first_name' => User::getUserFirstName()]);
    })->name('home');

    Route::resource('courses', CourseController::class);
    Route::get('dashboard', [CourseController::class,'dashboard'])->name('dashboard');
    Route::resource('inscriptions', InscriptionController::class);
    Route::get('/inscriptions/create/{course_id}', [InscriptionController::class, 'create'])->name('inscriptions.create');
    Route::get('dashboard/inscriptions/{course_id}', [InscriptionController::class,'dashboard'])->name('inscriptions.dashboard');
    route::get('generate-pdf-inscriptions/{course_id}',[InscriptionController::class, 'generatePdf'])->name('inscriptions.generate.pdf');
    route::get('/inscriptions/pay/{inscription_id}', [InscriptionController::class, 'pay'])->name('inscriptions.pay');
    route::get('/inscriptions/cancel/{inscription_id}', [InscriptionController::class, 'cancel'])->name('inscriptions.cancel');
});

require __DIR__.'/auth.php';