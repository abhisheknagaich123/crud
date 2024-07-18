<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\usersdata;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [usersdata::class, 'index'])->name('users.index');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/home', function () {
//     return view('home');
// })->middleware(['auth', 'verified'])->name('home');


Route::get('/create', [usersdata::class, 'create'])->name('create');

Route::post('/store', [usersdata::class, 'store'])->name('store');


Route::get('/edit/{id}/', [usersdata::class, 'edit'])->name('edit');

Route::put('/update/{id}', [usersdata::class, 'update'])->name('users.update');

Route::get('/delete/{product}/', [usersdata::class, 'delete'])->name('delete');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
