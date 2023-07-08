<?php

use App\Http\Controllers\ResepController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('layouts.masterlayout');
});

Route::get('/register', [UserController::class,  'register'])->name('register');
Route::post('/register', [UserController::class,  'register_req'])->name('register.process');
Route::get('/login', [UserController::class,  'login'])->name('login');
Route::post('/login', [UserController::class,  'login_req'])->name('login.process');
Route::get('/logout', [UserController::class,  'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    // Route::get('/', function () {
    //     return view('dashboard.index');
    // });

    Route::get('/', [ResepController::class, 'resep_index'])->name('resep.index');
    Route::get('/myresep', [ResepController::class, 'myresep_index'])->name('myresep');
    Route::get('/myresep/create', [ResepController::class, 'create_resep'])->name('create.resep');
    Route::get('/{id}', [ResepController::class, 'find'])->name('findbyid');
    Route::post('/myresep/create', [ResepController::class, 'store_myresep'])->name('store.resep');
    Route::delete('/myresep/{id}',[ResepController::class, 'destroy'])->name('myresep.delete');
});