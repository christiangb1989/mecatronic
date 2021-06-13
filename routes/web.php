<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\UsuarioController;
use App\Http\Controllers\backend\DispositivoController;
use App\Http\Controllers\backend\GrupoController;
use App\Http\Controllers\backend\VehiculoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::resource('usuario', UsuarioController::class)->middleware(['auth']);
Route::resource('grupo', GrupoController::class)->middleware(['auth']);
Route::resource('dispositivo', DispositivoController::class)->middleware(['auth']);
Route::resource('vehiculo', VehiculoController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
