<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChamadosController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\TecnicoMiddleware;
use App\Http\Middleware\UsuarioMiddleware;
use Illuminate\Support\Facades\Auth;

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

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

//acesso autenticado
Route::middleware('auth')->group(function () {

    Route::get('/help', function () {
        return view('help');
    });

    Route::post('/logout', [AuthController::class, 'logout']);

    //acessos para usuário técnico
    Route::middleware([TecnicoMiddleware::class])->group(function () {

        Route::get('/chamados/status/{status}', [ChamadosController::class, 'filtrarPorStatus'])->name('chamados.filtrar');

        Route::resource('usuarios', UsersController::class);

        Route::get('/chamados/show', function () {
            return view('menu.chamados.show');
        });
    });

    //acesso para usuário comum
    Route::middleware([UsuarioMiddleware::class])->group(function () {});

    Route::get('/', function () {
        return view('help');
    });

    Route::resource('chamados', ChamadosController::class);
});
