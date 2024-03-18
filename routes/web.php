<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;

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
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('pages.auth.login');
    })->name('login');
    Route::post('/',[AuthController::class, 'login'])->name('log-in');
    Route::post('/register', [AuthController::class , 'register'])->name('auth');
    Route::get('/register', function () {
        return view('pages.auth.register');
    })->name('register');
});

Route::middleware('auth')->group(function () {
    
    Route::get('/home', function (Request $request) {
        return view('pages.home')->with('user', $request->user());
    })->name('name');
});


Route::get('/test', fn(Request $request) => $request->user());