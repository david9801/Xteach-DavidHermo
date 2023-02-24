<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
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
    return view('class.welcome');
})->name('welcome');
Route::resource('register',RegisterController::class);
Route::get('register-admin',[RegisterController::class,'createadmin'])->name('register.create.admin');
Route::post('goto-register-admin',[RegisterController::class,'storeadmin'])->name('register.store.admin');
Route::resource('session',SessionsController::class);
Route::post('do-login',[SessionsController::class,'doLogin'])->name('dologin');
Route::post('log-out',[SessionsController::class,'logout'])->name('logout')->middleware('auth');


