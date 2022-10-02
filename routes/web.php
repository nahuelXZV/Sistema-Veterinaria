<?php

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
});
