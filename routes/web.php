<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeshopController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CategoriaExtraController;
use App\Http\Controllers\TamanioController;
use App\Http\Controllers\ExtraController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\DbUpController; 


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'auth'], function (){

Route::get('/venta',[CoffeshopController::class, 'venta'])->name('venta');
Route::get('/venta/productos',[CoffeshopController::class, 'productos'])->name('productos');
Route::get('/venta/categorias',[CoffeshopController::class, 'categorias'])->name('categorias');
Route::get('/venta/tamanios',[CoffeshopController::class, 'tamanios'])->name('tamanios');
//faker
Route::get('/dbup/cliente',[DbUpController::class, 'clientes'])->name('clientes');
Route::get('/dbup/orden',[DbUpController::class, 'orden'])->name('orden');

//faker

// por ai acaso Route::post('/venta/save',[CoffeshopController::class, 'guardar_orden'])->name('guardar_orden');

//Catalogo tipo de Categorias
Route::get('/categoria', [CategoriaController::class, 'categoria'])->name ('categoria');
Route::get('categoria/formulario/{id?}', [CategoriaController::class, 'formulario'])->name ('categoria.formulario');
Route::post('categoria/guardar', [CategoriaController::class, 'guardar'])->name ('categoria.guardar');


//Catalogo tipo de Categorias extras
Route::get('/categoriaExtra', [CategoriaExtraController::class, 'categoriaExtra'])->name ('categoriaExtra');
Route::get('categoriaExtra/formulario/{id?}', [CategoriaExtraController::class, 'formulario'])->name ('categoriaExtra.formulario');
Route::post('categoriaExtra/guardar', [CategoriaExtraController::class, 'guardar'])->name ('categoriaExtra.guardar');

//Catalogo tipo de Tamanios
Route::get('/tamanio', [TamanioController::class, 'tamanio'])->name ('tamanio');
Route::get('tamanio/formulario/{id?}', [TamanioController::class, 'formulario'])->name ('tamanio.formulario');
Route::post('tamanio/guardar', [TamanioController::class, 'guardar'])->name ('tamanio.guardar');

//Catalogo tipo de Extras
Route::get('/extra', [ExtraController::class, 'extra'])->name ('extra');
Route::get('extra/formulario/{id?}', [ExtraController::class, 'formulario'])->name ('extra.formulario');
Route::post('extra/guardar', [ExtraController::class, 'guardar'])->name ('extra.guardar');


//Catalogo tipo de Productos
Route::get('/producto', [ProductoController::class, 'producto'])->name ('producto');
Route::get('producto/formulario/{id?}', [ProductoController::class, 'formulario'])->name ('producto.formulario');
Route::post('producto/guardar', [ProductoController::class, 'guardar'])->name ('producto.guardar');

//Catalogo tipo de Froma de pago
Route::get('/formaPago', [FormaPagoController::class, 'formaPago'])->name ('formaPago');
Route::get('formaPago/formulario/{id?}', [FormaPagoController::class, 'formulario'])->name ('formaPago.formulario');
Route::post('formaPago/guardar', [FormaPagoController::class, 'guardar'])->name ('formaPago.guardar');

//Catalogo tipo de Sucursales
Route::get('/sucursal', [SucursalController::class, 'sucursal'])->name ('sucursal');
Route::get('sucursal/formulario/{id?}', [SucursalController::class, 'formulario'])->name ('sucursal.formulario');
Route::post('sucursal/guardar', [SucursalController::class, 'guardar'])->name ('sucursal.guardar');

//Catalogo tipo de Orden
Route::get('/orden', [OrdenController::class, 'orden'])->name ('orden');
Route::get('orden/formulario/{id?}', [OrdenController::class, 'formulario'])->name ('orden.formulario');
Route::post('orden/guardar', [OrdenController::class, 'guardar'])->name ('orden.guardar');

//Catalogo tipo de Promocion
Route::get('/promocion', [PromocionController::class, 'promocion'])->name ('promocion');
Route::get('promocion/formulario/{id?}', [PromocionController::class, 'formulario'])->name ('promocion.formulario');
Route::post('promocion/guardar', [PromocionController::class, 'guardar'])->name ('promocion.guardar');




});

//iniciar sesion y registro
use App\Http\Controllers\Auth\SignupController;
Route::get('/signup', [SignupController::class, 'show'])->name('signup.show');
Route::post('/signup', [SignupController::class, 'register'])->name('signup.register');

use App\Http\Controllers\Auth\LoginController;
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
