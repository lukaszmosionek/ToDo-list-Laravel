<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskHistoryController;
use App\Http\Controllers\TaskShareController;
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

Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::get('/tasks/{task}/history', [TaskHistoryController::class, 'index'])->name('tasks.history');
});


Route::middleware(['auth'])->group(function () {
    Route::post('/tasks/{task}/share', [TaskShareController::class, 'generateLink'])->name('tasks.share');
    Route::post('/tasks/{task}/revoke', [TaskShareController::class, 'revokeLink'])->name('tasks.revoke');
});

Route::get('/tasks/access/{token}', [TaskShareController::class, 'accessViaToken'])->name('tasks.access');


require __DIR__.'/auth.php';
