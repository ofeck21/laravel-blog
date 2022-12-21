<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'doLogin')->name('do-login');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/register', 'register')->name('register');
});

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::middleware(['auth'])->group(function () {
    // Log Viewer
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

    Route::controller(HomeController::class)->group(function(){
        Route::get('/home', 'index')->name('home');
    });
});
