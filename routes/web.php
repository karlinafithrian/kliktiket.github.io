<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

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

Route::get('index', [AdminController::class,'index']);
Route::get('about', [AdminController::class,'about']);

Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/postlogin', [AuthController::class,'postlogin'])->name('postlogin');

Route::get('/register', [AuthController::class,'register'])->name('register');
Route::post('/postregister', [AuthController::class,'postregister'])->name('postregister');


