<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [LoginController::class, 'loginInicio'])->name('login');
Route::get('login', [LoginController::class, 'loginInicio'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
//midelware

Route::middleware('auth')->group(function (){
    Route::get('home', [InicioController::class, 'inicio'])->name('inicio');

    Route::controller(ProductoController::class)->group(function () {
        Route::get('productos', 'index')->name('productos.index');
        Route::get('productos/creando',  'crear')->name('productos.crear');
        Route::post('productos', 'store')->name('productos.store');
        Route::get('productos/{id}', 'show')->name('productos.show');
        Route::delete('productos/{ProductoID}', 'destroy')->name('productos.delete');
        Route::put('productos/{ProductoID}', 'update')->name('productos.edit');
    });


    Route::controller(VentaController::class)->group(function () {
        Route::get('ventas', 'index')->name('ventas.index');
        Route::get('ventas/creando',  'create')->name('ventas.create');
        Route::post('ventas', 'store')->name('ventas.store');
        Route::get('ventas/{id}', 'show')->name('ventas.show');
        Route::delete('ventas/{VentasID}', 'destroy')->name('ventas.delete');
        Route::put('ventas/{id}', 'update')->name('ventas.edit');
    });

    Route::controller(ClientesController::class)->group(function () {
        Route::get('cliente', 'index');
        Route::get('cliente/creando',  'crear');
        //Route::get('cliente/{datos}',  'verProducto');
    });
});


// Route::get('productos', [ProductoController::class, 'index']);
// Route::get('productos/creando', [ProductoController::class, 'crear']);

// //paso de variables
// Route::get('productos/{datos}', [ProductoController::class, 'verProducto'] );


//clientes
Route::get('clientes', function () {
   return 'HOLA Clientes' ;
});

//rutas mas datos.


//paso de parametros con dos variables.
// Route::get('productos/{datos}/{cliente}', function($datos, $cliente){
//     return "producto $datos, $cliente";
// });
