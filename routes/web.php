<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::post('/students', [StudentController::class, 'create']);
Route::get('/students/{id}', [StudentController::class, 'show']);
Route::get('/students/credits/gt100', [StudentController::class, 'creditsGreaterThan100'])->name('students.credits.gt100');
Route::get('/students/credits/lt50', [StudentController::class, 'creditsLessThan50'])->name('students.credits.lt50');
Route::get('/students/max/credits', [StudentController::class, 'maxCredits'])->name('students.max.credits');



require __DIR__.'/auth.php';
