<?php

use App\Http\Controllers\Servicio\ClienteController;
use App\Http\Controllers\Servicio\MascotaController;
use App\Http\Controllers\Sistema\BitacoraController;
use App\Http\Controllers\Sistema\RoleController;
use App\Http\Controllers\Sistema\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // Modulo Sistema
    Route::group(['prefix' => 'usuario'], function () {
        Route::get('/', [UserController::class, 'index'])->name('usuario.index');
        Route::get('/create', [UserController::class, 'create'])->name('usuario.create');
        Route::post('/', [UserController::class, 'store'])->name('usuario.store');
        Route::get('/edit/{usuario}', [UserController::class, 'edit'])->name('usuario.edit');
        Route::put('/{usuario}', [UserController::class, 'update'])->name('usuario.update');
        Route::delete('/{usuario}', [UserController::class, 'destroy'])->name('usuario.delete');
    });

    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
        Route::get('/edit/{rol}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::delete('/{rol}', [RoleController::class, 'destroy'])->name('roles.delete');
    });

    Route::get('/bitacora', [BitacoraController::class, 'index'])->name('bitacora.index');

    // Modulo Servicio
    Route::group(['prefix' => 'cliente'], function () {
        Route::get('/', [ClienteController::class, 'index'])->name('cliente.index');
        Route::get('/create', [ClienteController::class, 'create'])->name('cliente.create');
        Route::post('/', [ClienteController::class, 'store'])->name('cliente.store');
        Route::get('/edit/{cliente}', [ClienteController::class, 'edit'])->name('cliente.edit');
        Route::put('/{cliente}', [ClienteController::class, 'update'])->name('cliente.update');
        Route::delete('/{cliente}', [ClienteController::class, 'destroy'])->name('cliente.delete');
    });

    Route::group(['prefix' => 'mascota'], function () {
        Route::get('/', [MascotaController::class, 'index'])->name('mascota.index');
        Route::get('/create', [MascotaController::class, 'create'])->name('mascota.create');
        Route::post('/', [MascotaController::class, 'store'])->name('mascota.store');
        Route::get('/edit/{mascota}', [MascotaController::class, 'edit'])->name('mascota.edit');
        Route::get('/show/{mascota}', [MascotaController::class, 'show'])->name('mascota.show');
        Route::put('/{mascota}', [MascotaController::class, 'update'])->name('mascota.update');
        Route::delete('/{mascota}', [MascotaController::class, 'destroy'])->name('mascota.delete');
    });
});
