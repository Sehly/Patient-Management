<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PatientController;

use App\Http\Controllers\PaymentController;

use App\Http\Controllers\RevenueController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('Patient', PatientController::class);
Route::get('Patient.index', [PatientController::class, 'search'])->name('Patient.search');


Route::get('Patient/{patient}/payments', [PaymentController::class, 'index'])->name('Patient.payments.index');
Route::get('Patient/{patient}/payments/{payment}', [PaymentController::class, 'show'])->name('Patient.payments.show');
Route::get('Patient/{patient}/payments/{payment}/edit', [PaymentController::class, 'edit'])->name('Patient.payments.edit');
Route::put('Patient/{patient}/payments/{payment}', [PaymentController::class, 'update'])->name('Patient.payments.update');



Route::get('/revenues', [RevenueController::class, 'index'])->name('revenue.index');

