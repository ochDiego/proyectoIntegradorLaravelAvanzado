<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\MostrarEmpleados;
use App\Http\Controllers\ExportController;

Route::get('/', HomeController::class)->name('home');

Route::get('/export',[ExportController::class,'export'])->name('export');

Route::get('/empleados',MostrarEmpleados::class)->name('admin.empleados.index')->middleware('can:admin.empleados.index');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
