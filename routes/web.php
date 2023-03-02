<?php

use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('index');
})->name('home');

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class,'login'])->name('login');

Route::get('/signup', function () {
    return view('signup');
});

Route::post('/signup', [LoginController::class,'register'])->name('signup');
