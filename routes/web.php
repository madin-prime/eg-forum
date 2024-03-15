<?php

use App\Http\Controllers\AuthController;
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
    return view('pages.auth.login');
})->name('log');

Route::post('/register', [AuthController::class , 'register'])->name('auth');

Route::get('/register', function () {
    return view('pages.auth.register');
})->name('register');

Route::post('/home', function () {});