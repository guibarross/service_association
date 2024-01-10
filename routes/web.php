<?php

use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;

Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/', [ServiceController::class, 'index'])->name('services.index');
Route::post('/service', [ServiceController::class, 'store'])->name('services.store');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
