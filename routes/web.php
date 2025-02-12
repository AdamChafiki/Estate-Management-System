<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstateController;
use Illuminate\Support\Facades\Route;

/*
 * Route to view page
 */

Route::get('/', function () {
    return view('home');
})->name('home');

/*
 * Route to view signup
 */

Route::get('/signup', function () {
    return view('auth.signup');
})->name('signup')->middleware('guest');

/*
 * Route to view login
 */

Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

/*
 * Route to  @authcontroller @method[ register ] [ authenticate ] [ logout ]
 */

Route::post('/register', [AuthController::class, 'register'])->name('register');
// middleware('throttle:5,1') means that the user can only make 5 requests in 1 minute
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate')->middleware('throttle:5,1');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
 * Route to view account
 */

Route::get('/account', function () {
    return view('account.index');
})->name('account')->middleware('auth');


/*
 * Route to  @estatecontroller
 */
Route::resource('estate', EstateController::class)->middleware('auth');