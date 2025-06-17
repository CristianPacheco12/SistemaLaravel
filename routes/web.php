<?php

use Illuminate\Support\Facades\Route;
//agregamos los siguientes controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CabanaController;
use App\Http\Controllers\ReservacionController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\OfreceController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ControlController;
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
    return view('inicio');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/registro', function () {
    return view('login.index');
})->name('registro'); 

Route::get('/vercabanas', function () {
    return view('cabanas.conoce');
})->name('vercabanas'); 

Route::get('/verhome', function () {
    return view('controls.bienvenido');
})->name('verhome'); 
//y creamos un grupo de rutas protegidas para los controladores
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('cabanas', CabanaController::class);
    Route::resource('reservaciones', ReservacionController::class);
    Route::resource('actividades', ActividadController::class);
    Route::resource('ofreces', OfreceController::class);
    Route::resource('reservas',ReservaController::class);
    Route::resource('controls',ControlController::class);
 

// En tu archivo web.php
Route::post('/actualizar-cabanas-disponibles', [ReservacionController::class, 'actualizarCabanasDisponibles'])->name('actualizar-cabanas-disponibles');
Route::put('reservaciones/{reservacion}', 'ReservacionController@update')->name('reservaciones.update');
//Route::patch('/reservaciones/{reservacion}', 'ReservacionController@update')->name('reservaciones.update');
// routes/web.php

Route::delete('/controls/{control}/eliminar', 'ControlController@eliminarRegistro')->name('controls.eliminar');










});
