<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaCRUDController;
use App\Http\Controllers\ClienteCRUDController;
use App\Http\Controllers\EmpleadoCRUDController;
use App\Http\Controllers\CuotaCRUDController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IncidenciaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/', function(){
    return view('auth.login');
});

// INCIDENCIA
Route::resource('incidencia', IncidenciaController::class);


// TAREAS
Route::get('tareas', [TareaCRUDController::class, 'index'])
->middleware('auth.admin')
->name('verTareas');

Route::resource('tareas', TareaCRUDController::class)
->middleware('auth.admin');



Route::get('tareas/borrar/{id}', [TareaCRUDController::class, 'destroy'])
->middleware('auth.admin');


//CLIENTES
Route::resource('clientes', ClienteCRUDController::class)
->middleware('auth.admin');

Route::get('clientes/borrar/{id}', [ClienteCRUDController::class, 'destroy'])
->middleware('auth.admin');


//EMPLEADOS
Route::resource('empleados', EmpleadoCRUDController::class)
->middleware('auth.admin');

Route::get('empleados/borrar/{id}', [EmpleadoCRUDController::class, 'destroy'])
->middleware('auth.admin');


//MAIL
Route::get('email', [MailController::class, 'index'])
->middleware('auth.admin');

//CUOTAS
Route::get('cuotas/generarPDF/{id}', [CuotaCRUDController::class, 'generarPDF'])
->middleware('auth.admin')
->name('generarPDF');

Route::get('cuotas/verificar', [CuotaCRUDController::class, 'verificarCuotasMensuales'])
->middleware('auth.admin')
->name('verificarCuotasMensuales');

Route::get('cuotas/insertarCuotasMensuales', [CuotaCRUDController::class, 'insertarCuotasMensuales'])
->middleware('auth.admin')
->name('insertarCuotasMensuales');

Route::resource('cuotas', CuotaCRUDController::class)
->middleware('auth.admin');

Route::get('cuotas/borrar/{id}', [CuotaCRUDController::class, 'destroy']);



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'index'])
->middleware('auth.admin')
->name('admin.index');

