<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\CoordinadorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;

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
    return view('auth.login');
});

Route::resource('carrera', CarreraController::class)->middleware('auth');

//Route::resource('coordinador', CoordinadorController::class)->middleware('auth');
Route::resource('estudiante', EstudianteController::class)->middleware('auth');
Route::resource('usuario', UserController::class)->middleware('auth');
Route::resource('registro', RegisterController::class)->middleware('auth');
//Route::resource('home', HomeController::class)->middleware('auth');





Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
//Route::get('/principal', [HomeController::class, 'show'])->middleware('auth')->name('principal');
Route::get('/carreras', [CarreraController::class, 'index'])->middleware('auth')->name('carreras');
Route::get('/usuarios', [UserController::class, 'index'])->middleware('auth')->name('usuarios');
Route::post('/register/role', [RegisterController::class, 'selectRole'])->name('role');
Route::post('/verification', [RegisterController::class, 'verification'])->name('verification');
Route::patch('/index/{user}', [RegisterController::class, 'storeRole'])->name('role.store');



Route::prefix(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'show'])->name('principal');
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/', [CarreraController::class, 'index'])->name('carreras');
    Route::get('/', [UserController::class, 'index'])->name('usuarios');
    
});