<?php

use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;

Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy')->middleware('auth');
Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update')->middleware('auth');
Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit')->middleware('auth');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create')->middleware('auth');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show')->middleware('auth');
Route::get('/', [ServiceController::class, 'index'])->name('services.index')->middleware('auth');
Route::post('/service', [ServiceController::class, 'store'])->name('services.store')->middleware('auth');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
