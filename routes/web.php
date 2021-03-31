<?php

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

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BloggerController;
use App\Http\Controllers\ZoeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Socialite routes
Route::get('login/{provider}', [LoginController::class, 'redirectToProvider']);
Route::get('login/{provider}/callback', [LoginController::class, 'handleProviderCallback']);
Route::get('blogger', [BloggerController::class, 'prepare']);
Route::get('zoe', [BloggerController::class, 'zoe']);
Route::get('zoe/replay/{n}/{i}', [BloggerController::class, 'replay']);
Route::get('zoe/random', [BloggerController::class, 'random']);
Route::get('zoe/crypto/{coin}', [ZoeController::class, 'criptoHistory']);
Route::get('zoe/crypto/{coin}/{days}', [ZoeController::class, 'criptoProyection']);
Route::get('zoe/pix2pix', [ZoeController::class, 'pix2pix']);
Route::get('zoe/sube_baja', [ZoeController::class, 'probarSubeBaja']);
