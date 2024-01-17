<?php

use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;

Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy')->middleware('auth');
Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update')->middleware('auth');
Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit')->middleware('auth');
Route::get('/services/search', [ServiceController::class, 'search'])->name('services.search');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create')->middleware('auth');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show')->middleware('auth');
Route::get('/', [ServiceController::class, 'index'])->name('services.index')->middleware('auth');
Route::post('/service', [ServiceController::class, 'store'])->name('services.store')->middleware('auth');


Route::post('services/{id}/associate', [ServiceController::class, 'associateUser'])->name('services.associate')->middleware('auth');
Route::get('user-services', [ServiceController::class, 'userServices'])->name('user.services')->middleware('auth');
Route::post('services/{id}/disassociation', [ServiceController::class, 'disassociationUser'])->name('services.disassociation')->middleware('auth');
Route::get('/user-associated/{serviceId}', [ServiceController::class, 'userAssociated'])->name('user.associated')->middleware('auth');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
