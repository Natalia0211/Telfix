<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\AutenticaController;


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

Route::view('/', 'welcome')->name('inicio');

Route::resource('/clientes',ClienteController::class);  
Route::resource('/dispositivos',DispositivoController::class); 
Route::resource('/solicitudes', SolicitudController::class);

//Ruta de registro de usuarios
Route::view('/registro', 'autenticacion.registro')->name('registro');
Route::post('/registro', [AutenticaController::class, 'registro'])->name('registro.store');

//Ruta de login de usuarios
Route::view('/login', 'autenticacion.login')->name('login');
Route::post('/login', [AutenticaController::class, 'login'])->name('login.store');

//Ruta de logout del usuario
Route::post('/logout', [AutenticaController::class, 'logout'])->name('logout');

//Ruta para editar el perfil de usuario
Route::get('/perfil', [AutenticaController::class, 'perfil'])->name('perfil');
Route::put('/perfil/{user}', [AutenticaController::class, 'perfilUpdate'])->name('perfil.update');

//Ruta para cambiar la contraseña de usuario
Route::put('/perfil/password/{user}', [AutenticaController::class, 'passwordUpdate'])->name('password.update');
