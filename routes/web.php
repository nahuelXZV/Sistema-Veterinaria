<?php

use App\Http\Controllers\CompraVenta\NotaCompraController;
use App\Http\Controllers\CompraVenta\NotaVentaController;
use App\Http\Controllers\CompraVenta\ProductoController;
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

    // Modulo compra y venta
    Route::group(['prefix' => 'producto'], function () {
        Route::get('/', [ProductoController::class, 'index'])->name('producto.index');
        Route::get('/create', [ProductoController::class, 'create'])->name('producto.create');
        Route::post('/', [ProductoController::class, 'store'])->name('producto.store');
        Route::get('/edit/{producto}', [ProductoController::class, 'edit'])->name('producto.edit');
        Route::get('/show/{producto}', [ProductoController::class, 'show'])->name('producto.show');
        Route::put('/{producto}', [ProductoController::class, 'update'])->name('producto.update');
        Route::delete('/{producto}', [ProductoController::class, 'destroy'])->name('producto.delete');
    });

    Route::group(['prefix' => 'nota_compra'], function () {
        Route::get('/', [NotaCompraController::class, 'index'])->name('nota_compra.index');
        Route::get('/create', [NotaCompraController::class, 'create'])->name('nota_compra.create');
        Route::post('/', [NotaCompraController::class, 'store'])->name('nota_compra.store');
        Route::get('/edit/{nota_compra}', [NotaCompraController::class, 'edit'])->name('nota_compra.edit');
        Route::get('/show/{nota_compra}', [NotaCompraController::class, 'show'])->name('nota_compra.show');
        Route::put('/{nota_compra}', [NotaCompraController::class, 'update'])->name('nota_compra.update');
        Route::delete('/{nota_compra}', [NotaCompraController::class, 'destroy'])->name('nota_compra.delete');
    });

    Route::group(['prefix' => 'nota_venta'], function () {
        Route::get('/', [NotaVentaController::class, 'index'])->name('nota_venta.index');
        Route::get('/create', [NotaVentaController::class, 'create'])->name('nota_venta.create');
        Route::post('/', [NotaVentaController::class, 'store'])->name('nota_venta.store');
        Route::get('/edit/{nota_venta}', [NotaVentaController::class, 'edit'])->name('nota_venta.edit');
        Route::get('/show/{nota_venta}', [NotaVentaController::class, 'show'])->name('nota_venta.show');
        Route::put('/{nota_venta}', [NotaVentaController::class, 'update'])->name('nota_venta.update');
        Route::delete('/{nota_venta}', [NotaVentaController::class, 'destroy'])->name('nota_venta.delete');
    });
});
