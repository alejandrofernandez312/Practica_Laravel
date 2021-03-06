<?php

use Illuminate\Support\Facades\Route;
use App\Models\Empleado;
use App\Http\Controllers\TareaCRUDController;
use App\Http\Controllers\ClienteCRUDController;
use App\Http\Controllers\EmpleadoCRUDController;
use App\Http\Controllers\CuotaCRUDController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\OperarioController;
use App\Http\Controllers\MiPerfilController;
use App\Http\Controllers\TareasNoAsignadasController;
use App\Http\Controllers\EmpleadosJSController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;


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

// CAMBIAR DATOS PERFIL
Route::resource('perfil', MiPerfilController::class);

// OPERARIO
Route::resource('operario', OperarioController::class);

//PERMISO DENEGADO
Route::get('denegado', function(){
    return view('denegado');
});

// TAREAS
Route::get('tareas', [TareaCRUDController::class, 'index'])
->middleware('auth.admin')
->name('verTareas');


Route::resource('tareas', TareaCRUDController::class)
->middleware('auth.admin');



Route::get('tareas/borrar/{id}', [TareaCRUDController::class, 'destroy'])
->middleware('auth.admin');


//TAREAS NO ASIGNADAS
Route::resource('tareasNoAsignadas', TareasNoAsignadasController::class)
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

Route::get('cuotas/borrar/{id}', [CuotaCRUDController::class, 'destroy'])
->middleware('auth.admin');;

//GOOGLE

Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->user();

    $userExists = Empleado::where('external_id', $user->id)->where('external_auth', 'google')->first();

    if($userExists){
        Auth::login($userExists);
    }else{
        $userNew = Empleado::create([
            'nombre' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'tipo' => 'O',
            'f_alta' => date('Y-m-d'),
            'external_id' => $user->id,
            'external_auth' => 'google',
        ]);

        Auth::login($userNew);
    }

    return redirect()->route('operario.index');


    // $user->token
});

//LOGIN CON GITHUB

Route::get('/login-github', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/github-callback', function () {
    $user = Socialite::driver('github')->user();


    $userExists = Empleado::where('external_id', $user->id)->where('external_auth', 'github')->first();

    if($userExists){
        Auth::login($userExists);
    }else{
        $userNew = Empleado::create([
            'nombre' => $user->nickname,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'tipo' => 'O',
            'f_alta' => date('Y-m-d'),
            'external_id' => $user->id,
            'external_auth' => 'github',
            'remember_token' => $user->token
        ]);

        Auth::login($userNew);
    }

    return redirect()->route('operario.index');


    // $user->token
});


//CRUD EMPLEADOS CON JAVASCRIPT Y DATATABLE

Route::resource('empleadosJS', EmpleadosJSController::class)
->middleware('auth.admin');





Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'index'])
->middleware('auth.admin')
->name('admin.index');

