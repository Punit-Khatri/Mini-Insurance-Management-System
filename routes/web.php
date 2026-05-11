<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/policies', [PolicyController::class, 'index'])->name('policies.index');
    Route::get('/policies/create', [PolicyController::class, 'create'])->name('policies.create');
    Route::post('/policies/store', [PolicyController::class, 'store'])->name('policies.store');
    Route::get('/policies/edit/{id}', [PolicyController::class, 'edit'])->name('policies.edit');
    Route::put('/policies/update/{id}', [PolicyController::class, 'update'])->name('policies.update');
    Route::delete('/policies/destroy/{id}', [PolicyController::class, 'destroy'])->name('policies.destroy');

    Route::get('/policy/receipt/download/{id}', [PolicyController::class, 'downloadReceipt'])->name('policies.downloadReceipt');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
