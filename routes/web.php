<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\UsuarioController;
use App\Http\Controllers\backend\DispositivoController;
use App\Http\Controllers\backend\GrupoController;
use App\Http\Controllers\backend\VehiculoController;
use App\Http\Controllers\backend\ReporteController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::resource('usuario', UsuarioController::class)->middleware(['auth']);
Route::resource('grupo', GrupoController::class)->middleware(['auth']);
Route::resource('dispositivo', DispositivoController::class)->middleware(['auth']);
Route::resource('vehiculo', VehiculoController::class)->middleware(['auth']);
Route::resource('reporte', ReporteController::class)->middleware(['auth']);
Route::get('gps/export/{id1}/{id2}', [ReporteController::class, 'exportExcel']);
Route::get('position/{id}', [VehiculoController::class, 'getPosition']);
require __DIR__.'/auth.php';
