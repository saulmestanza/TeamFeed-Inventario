<?php

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

Route::resource('/roles', App\Http\Controllers\Admin\RolesController::class);
Route::resource('/usuarios', App\Http\Controllers\Admin\UsersController::class);
Route::resource('/permisos', App\Http\Controllers\Admin\PermissionsController::class);
Route::resource('/marcas', App\Http\Controllers\MarcasController::class);
Route::resource('/categorias', App\Http\Controllers\CategoriasController::class);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
