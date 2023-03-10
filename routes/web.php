<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExcelController;
use App\Exports\goExport;
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
    return view('contact.welcome');
})->name('welcome');
Route::get('/about', function () {
    return view('contact.AboutUs');
})->name('aboutus');
Route::resource('register',RegisterController::class);
Route::get('register-admin',[RegisterController::class,'createadmin'])->name('register.create.admin');
Route::post('goto-register-admin',[RegisterController::class,'storeadmin'])->name('register.store.admin');
Route::resource('session',SessionsController::class);
Route::post('do-login',[SessionsController::class,'doLogin'])->name('dologin');
Route::post('log-out',[SessionsController::class,'logout'])->name('logout')->middleware('auth');

Route::get('showcursos',[CursoController::class,'index'])->name('curso.index')->middleware('auth');
Route::get('/goto-addcurso', function () {
    return view('class.AñadirCurso');
})->name('goto-add-curso');
Route::post('add-curso',[CursoController::class,'create'])->name('createCurso')->middleware('auth');
Route::post('/curso-inscribirse', [CursoController::class, 'inscribirse'])->name('curso.inscribirse')->middleware('auth');

Route::get('show-my-cursos',[CursoController::class,'showmycursos'])->name('show')->middleware('auth');

Route::PUT('do-it/{id}',[CursoController::class,'doingcurso'])->name('gocurso')->middleware('auth');
Route::DELETE('delete-curso-alumno/{id}',[CursoController::class,'deleteCurso'])->name('desmatricularse')->middleware('auth');

Route::get('show-cursos-admin',[AdminController::class,'show'])->name('showcursosadmin')->middleware('auth');
Route::get('show-alumnos-admin',[AdminController::class,'index'])->name('showalumnosadmin')->middleware('auth');
Route::get('show-notaMedia-misAlumnos',[AdminController::class,'media'])->name('showmedia')->middleware('auth');
Route::get('show-progresoMedio-misAlumnos',[AdminController::class,'progresoMedio'])->name('showprogreso')->middleware('auth');


Route::get('/mis-cursos-superados',[CursoController::class,'showmycursossuperados'])->name('miperfil')->middleware('auth');

Route::get('/exportar-cursos', [ExcelController::class, 'goExport'])->name('exportar')->middleware('auth');
