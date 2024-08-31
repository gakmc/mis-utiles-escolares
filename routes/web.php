<?php

use App\Http\Controllers\CiudadController;
use App\Http\Controllers\ComplementoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\TipoProductoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::name('admin.')->group(function () {
    Route::resource('/producto', ProductoController::class);
    Route::resource('/ciudad', CiudadController::class);
    Route::resource('/sucursal', SucursalController::class);
    Route::resource('/tipo_producto', TipoProductoController::class);
    Route::resource('/inventario', InventarioController::class);


    Route::get('/complemento', [ComplementoController::class, 'index'])->name('complemento.complemento');

});
require __DIR__.'/auth.php';
