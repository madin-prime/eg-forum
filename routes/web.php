<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use App\Models\Post;

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

    Route::get('/post', function (Request $request) {
        return view('pages.post')->with('user', $request->user());
    })->name('post');
    
    Route::get('/home', function (Request $request) {
        return view('pages.home')->with('user', $request->user())->with('posts', Post::all());
    })->name('home');

    Route::post('/post', [ PostController::class , 'createPost' ])->name('post-upload');

    Route::get('logout', [ AuthController::class, 'logout'])->name('logout');
    
    Route::get('delete-account', [AuthController::class, 'deleteAccount'])->name('delete');

    Route::get('my-posts' , function (Request $request) {
        return view('pages.myposts')->with('user', $request->user())->with('posts', Post::all());
    })->name('my-posts');
});