<?php

use App\Http\Controllers\CompraVenta\NotaCompraController;
use App\Http\Controllers\CompraVenta\NotaVentaController;
use App\Http\Controllers\CompraVenta\ProductoController;
use App\Http\Controllers\CompraVenta\ProveedorController;
use App\Http\Controllers\Servicio\AtencionController;
use App\Http\Controllers\Servicio\ClienteController;
use App\Http\Controllers\Servicio\MascotaController;
use App\Http\Controllers\Servicio\ReservaController;
use App\Http\Controllers\Servicio\ServicioController;
use App\Http\Controllers\Servicio\VacunaController;
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
    Route::group(['prefix' => 'usuario', 'middleware' => ['can:usuario.index', 'auth']], function () {
        Route::get('/', [UserController::class, 'index'])->name('usuario.index');
        Route::get('/create', [UserController::class, 'create'])->name('usuario.create');
        Route::post('/', [UserController::class, 'store'])->name('usuario.store');
        Route::get('/edit/{usuario}', [UserController::class, 'edit'])->name('usuario.edit');
        Route::put('/{usuario}', [UserController::class, 'update'])->name('usuario.update');
        Route::delete('/{usuario}', [UserController::class, 'destroy'])->name('usuario.delete');
    });

    Route::group(['prefix' => 'roles', 'middleware' => ['can:roles.index', 'auth']], function () {
        Route::get('/', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
        Route::get('/edit/{rol}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::delete('/{rol}', [RoleController::class, 'destroy'])->name('roles.delete');
    });

    Route::get('/bitacora', [BitacoraController::class, 'index'])->name('bitacora.index')->can('bitacora.index');

    // Modulo Servicio
    Route::group(['prefix' => 'cliente', 'middleware' => ['can:cliente.index', 'auth']], function () {
        Route::get('/', [ClienteController::class, 'index'])->name('cliente.index');
        Route::get('/create', [ClienteController::class, 'create'])->name('cliente.create');
        Route::post('/', [ClienteController::class, 'store'])->name('cliente.store');
        Route::get('/edit/{cliente}', [ClienteController::class, 'edit'])->name('cliente.edit');
        Route::get('/show/{cliente}', [ClienteController::class, 'show'])->name('cliente.show');
        Route::put('/{cliente}', [ClienteController::class, 'update'])->name('cliente.update');
        Route::delete('/{cliente}', [ClienteController::class, 'destroy'])->name('cliente.delete');
    });

    Route::group(['prefix' => 'mascota', 'middleware' => ['can:mascota.index', 'auth']], function () {
        Route::get('/', [MascotaController::class, 'index'])->name('mascota.index');
        Route::get('/create', [MascotaController::class, 'create'])->name('mascota.create');
        Route::get('/edit/{mascota}', [MascotaController::class, 'edit'])->name('mascota.edit');
        Route::get('/show/{mascota}', [MascotaController::class, 'show'])->name('mascota.show');
        Route::get('/vacunar/{mascota}', [MascotaController::class, 'vacunar'])->name('mascota.vacunar');
        Route::post('/', [MascotaController::class, 'store'])->name('mascota.store');
        Route::post('/vacunar', [MascotaController::class, 'store_vacunar'])->name('mascota.store_vacunar');
        Route::put('/{mascota}', [MascotaController::class, 'update'])->name('mascota.update');
        Route::delete('/{mascota}', [MascotaController::class, 'destroy'])->name('mascota.delete');
    });

    Route::group(['prefix' => 'vacuna', 'middleware' => ['can:vacuna.index', 'auth']], function () {
        Route::get('/', [VacunaController::class, 'index'])->name('vacuna.index');
        Route::get('/create', [VacunaController::class, 'create'])->name('vacuna.create');
        Route::post('/', [VacunaController::class, 'store'])->name('vacuna.store');
        Route::get('/edit/{vacuna}', [VacunaController::class, 'edit'])->name('vacuna.edit');
        Route::put('/{vacuna}', [VacunaController::class, 'update'])->name('vacuna.update');
        Route::delete('/{vacuna}', [VacunaController::class, 'destroy'])->name('vacuna.delete');
    });

    Route::group(['prefix' => 'servicio', 'middleware' => ['can:servicio.index', 'auth']], function () {
        Route::get('/', [ServicioController::class, 'index'])->name('servicio.index');
        Route::get('/create', [ServicioController::class, 'create'])->name('servicio.create');
        Route::post('/', [ServicioController::class, 'store'])->name('servicio.store');
        Route::get('/edit/{servicio}', [ServicioController::class, 'edit'])->name('servicio.edit');
        Route::put('/{servicio}', [ServicioController::class, 'update'])->name('servicio.update');
        Route::delete('/{servicio}', [ServicioController::class, 'destroy'])->name('servicio.delete');
    });

    Route::group(['prefix' => 'reserva', 'middleware' => ['can:reserva.index', 'auth']], function () {
        Route::get('/', [ReservaController::class, 'index'])->name('reserva.index');
        Route::get('/create', [ReservaController::class, 'create'])->name('reserva.create');
        Route::post('/', [ReservaController::class, 'store'])->name('reserva.store');
        Route::get('/edit/{reserva}', [ReservaController::class, 'edit'])->name('reserva.edit');
        Route::get('/show/{reserva}', [ReservaController::class, 'show'])->name('reserva.show');
        Route::get('/reserva/{reserva}', [ReservaController::class, 'atencion'])->name('reserva.atencion');
        Route::put('/{reserva}', [ReservaController::class, 'update'])->name('reserva.update');
        Route::delete('/{reserva}', [ReservaController::class, 'destroy'])->name('reserva.delete');
    });

    Route::group(['prefix' => 'atencion', 'middleware' => ['can:atencion.index', 'auth']], function () {
        Route::get('/', [AtencionController::class, 'index'])->name('atencion.index');
        Route::get('/create', [AtencionController::class, 'create'])->name('atencion.create');
        Route::get('/edit/{atencion}', [AtencionController::class, 'edit'])->name('atencion.edit');
        Route::get('/show/{atencion}', [AtencionController::class, 'show'])->name('atencion.show');
        Route::get('/recibo/{atencion}', [AtencionController::class, 'recibo'])->name('atencion.recibo');
        Route::post('/', [AtencionController::class, 'store'])->name('atencion.store');
        Route::post('/recibo', [AtencionController::class, 'recibo_store'])->name('atencion.recibo_store');
        Route::put('/{atencion}', [AtencionController::class, 'update'])->name('atencion.update');
        Route::delete('/{atencion}', [AtencionController::class, 'destroy'])->name('atencion.delete');
    });

    // Modulo compra y venta
    Route::group(['prefix' => 'producto', 'middleware' => ['can:producto.index', 'auth']], function () {
        Route::get('/', [ProductoController::class, 'index'])->name('producto.index');
        Route::get('/create', [ProductoController::class, 'create'])->name('producto.create');
        Route::post('/', [ProductoController::class, 'store'])->name('producto.store');
        Route::get('/edit/{producto}', [ProductoController::class, 'edit'])->name('producto.edit');
        Route::get('/show/{producto}', [ProductoController::class, 'show'])->name('producto.show');
        Route::put('/{producto}', [ProductoController::class, 'update'])->name('producto.update');
        Route::delete('/{producto}', [ProductoController::class, 'destroy'])->name('producto.delete');
    });

    Route::group(['prefix' => 'proveedor', 'middleware' => ['can:proveedor.index', 'auth']], function () {
        Route::get('/', [ProveedorController::class, 'index'])->name('proveedor.index');
        Route::get('/create', [ProveedorController::class, 'create'])->name('proveedor.create');
        Route::post('/', [ProveedorController::class, 'store'])->name('proveedor.store');
        Route::get('/edit/{proveedor}', [ProveedorController::class, 'edit'])->name('proveedor.edit');
        Route::get('/show/{proveedor}', [ProveedorController::class, 'show'])->name('proveedor.show');
        Route::put('/{proveedor}', [ProveedorController::class, 'update'])->name('proveedor.update');
        Route::delete('/{proveedor}', [ProveedorController::class, 'destroy'])->name('proveedor.delete');
    });

    Route::group(['prefix' => 'nota_compra', 'middleware' => ['can:nota_compra.index', 'auth']], function () {
        Route::get('/', [NotaCompraController::class, 'index'])->name('nota_compra.index');
        Route::get('/create', [NotaCompraController::class, 'create'])->name('nota_compra.create');
        Route::post('/', [NotaCompraController::class, 'store'])->name('nota_compra.store');
        Route::get('/edit/{nota_compra}', [NotaCompraController::class, 'edit'])->name('nota_compra.edit');
        Route::get('/show/{nota_compra}', [NotaCompraController::class, 'show'])->name('nota_compra.show');
        Route::put('/{nota_compra}', [NotaCompraController::class, 'update'])->name('nota_compra.update');
        Route::delete('/{nota_compra}', [NotaCompraController::class, 'destroy'])->name('nota_compra.delete');
    });

    Route::group(['prefix' => 'nota_venta', 'middleware' => ['can:nota_venta.index', 'auth']], function () {
        Route::get('/', [NotaVentaController::class, 'index'])->name('nota_venta.index');
        Route::get('/create', [NotaVentaController::class, 'create'])->name('nota_venta.create');
        Route::post('/', [NotaVentaController::class, 'store'])->name('nota_venta.store');
        Route::get('/edit/{nota_venta}', [NotaVentaController::class, 'edit'])->name('nota_venta.edit');
        Route::get('/show/{nota_venta}', [NotaVentaController::class, 'show'])->name('nota_venta.show');
        Route::put('/{nota_venta}', [NotaVentaController::class, 'update'])->name('nota_venta.update');
        Route::delete('/{nota_venta}', [NotaVentaController::class, 'destroy'])->name('nota_venta.delete');
    });
});
