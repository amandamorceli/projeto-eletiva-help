<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Chamado;
use App\Http\Controllers\ChamadosController;
use App\Http\Controllers\UsersController;

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

Route::get('/', function () {
    return view('help');
});

Route::get('/help', function () {
    return view('help');
});

Route::resource('chamados', ChamadosController::class);

Route::resource('usuarios', UsersController::class);

Route::get('/chamados/show', function () {
    return view('menu.chamados.show');
});

Route::get('/chamados/status/{status}', [ChamadosController::class, 'filtrarPorStatus'])->name('chamados.filtrar');
