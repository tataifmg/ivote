<?php

use App\Http\Controllers\EntidadeController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

//------------------------------------------------- Telas em Comum ------------------------------------------------------

/*Route::get('/cad-u', function () {
    return view('cadastrousuario');
})->name('cad-u');*/

//coloca a nomeção do barra e manda para o controle q retorna a função index
Route::get('/cad-u', [UserController::class, 'index'])->name('inserir-u');
// pega os dados do cadatro e manda para o controle  q retorna a função store
Route::post('/cad-u', [UserController::class, 'store'])->name('cad-u');

Route::get('/', function () {
    return view('home');
})->name('home');

//------------------------------------------------- Decisor ------------------------------------------------------

Route::get('/home-d', function () {
    return view('decisor.homedecisor');
})->name('home-d');

Route::get('/stand-by', function () {
    return view('decisor.standbydecisor');
})->name('standby-d');

Route::get('/emprocesso', function () {
    return view('decisor..emprocessodecisor');
})->name('emprocesso-d');

Route::get('/finalizadas-d', function () {
    return view('decisor.finalizadasdecisor');
})->name('finalizadas-d');

Route::get('/encerradas-d', function () {
    return view('decisor.encerradasdecisor');
})->name('encerradas-d');

Route::get('/perfil-adm', function () {
    return view('decisor.perfildecisor');
})->name('perfil-d');

Route::get('/nova-proposta', function () {
    return view('decisor.cadastroproposta');
})->name('cadastro-p');

Route::get('/editar-proposta', function () {
    return view('decisor.editarproposta');
})->name('editar-p');

Route::get('/visualizar-proposta', function () {
    return view('decisor.visualizarproposta');
})->name('visualizar-p');

//coloca a nomeção do barra e manda para o controle q retorna a função index
Route::get('/inserir-entidade', [EntidadeController::class, 'index'])->name('inserir-e');
// pega os dados do cadatro e manda para o controle  q retorna a função store
Route::post('/inserir-entidade', [EntidadeController::class, 'store'])->name('cadastro-e');

/*Route::get('/inserir-entidade', function () {
    return view('decisor.cadastroentidade');
})->name('inserir-e');*/

//------------------------------------------------- COMUNIDADE ------------------------------------------------------

Route::get('/home-c', function () {
    return view('comunidade.homecomunidade');
})->name('home-c');

Route::get('/finalizadas-c', function () {
    return view(' comunidade.finalizadascomunidade');
})->name('finalizadas-c');

Route::get('/encerradas-c', function () {
    return view('comunidade.encerradascomunidade');
})->name('encerradas-c');

Route::get('/favoritas-c', function () {
    return view('comunidade.favoritascomunidade');
})->name('favoritas-c');

Route::get('/perfil-com', function () {
    return view('comunidade.perfilcomunidade');
})->name('perfil-c');
