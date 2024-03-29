<?php

use App\Http\Controllers\AcompanhamentoController;
use App\Http\Controllers\EntidadeController;
use App\Http\Controllers\PropostaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VotacaoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//Tela que mostra o resultado da pesquisa, tendo como base a pesquisa de nomes  
Route::post('/pesquisa', [PropostaController::class, 'pesquisa'])->name('pesquisa');

Auth::routes();

Route::post('/sair', function(){
    Auth::logout();
    return redirect()->route('login');
})->name('sair');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/register', 'Auth\RegisterController@index')->name('register');

Route::group( ['middleware' => ['auth','decisor']], function(){
//------------------------------------------------- Decisor ------------------------------------------------------

    // Home decisor
    Route::get('/home-d', [PropostaController::class, 'view'])->name('home-d');

    // Stand-by, em espera para a votação
    Route::get('/stand-by', [PropostaController::class, 'standby'])->name('standby-d');

    //Em Processo, a comunidade ta votando  
    Route::get('/emprocesso', [PropostaController::class, 'emprocesso'])->name('emprocesso-d');

    //Finalizadas, foram finalizadas a votação da comunidade
    Route::get('/finalizadas-d', [PropostaController::class, 'finalizadas'])->name('finalizadas-d');

    //Encerrada, já foi entregue os resultados da votação do decisor
    Route::get('/encerradas-d', [PropostaController::class, 'encerradas'])->name('encerradas-d');

    // Perfil adm, necessario revisão com o roger  
    Route::get('/perfil-adm', [UserController::class, 'show'])->name('perfil-d');

    //coloca a nomeção do barra e manda para o controle q retorna a função index
    Route::get('/nova-proposta', [PropostaController::class, 'index'])->name('inserir-p');

    // pega os dados do cadatro e manda para o controle  q retorna a função store
    Route::post('/nova-proposta', [PropostaController::class, 'store'])->name('cadastro-p');

    //FUNCIONA CORETAMENTE
    Route::get('/editar-proposta/{id}', [PropostaController::class, 'edit'])->name('edit-p');

    Route::post('/update-proposta/{id}', [PropostaController::class, 'update'])->name('update-p');

    //Deleta a proposta selecionada
    Route::get('/excluir-proposta/{id}', [PropostaController::class, 'destroy'])->name('destroy-p');

    //Mostra os dados da proposta selecionada
    Route::get('/visualizar-proposta/{id}', [PropostaController::class, 'show'])->name('visualizar-p');

    //coloca a nomeção do barra e manda para o controle q retorna a função index
    Route::get('/inserir-entidade', [EntidadeController::class, 'index'])->name('inserir-e');

    // pega os dados do cadatro e manda para o controle  q retorna a função store
    Route::post('/inserir-entidade', [EntidadeController::class, 'store'])->name('cadastro-e');

    Route::get('/perfil-adm', 'PropostaController@useradm')->name('perfil-d');

    Route::get('/a/{id}', [VotacaoController::class, 'a'])->name('a');

    Route::get('/des/{id}', [VotacaoController::class, 'aprovada'])->name('simd');

    Route::get('/den/{id}', [VotacaoController::class, 'reprovada'])->name('naod');
});

Route::group( ['middleware' => ['auth', 'comunidade']], function(){

//------------------------------------------------- COMUNIDADE ------------------------------------------------------
    // Rota responsavel por cadastrar o voto sim  
    Route::get('/teste/{id}', [VotacaoController::class, 'concordo'])->name('concordo');

    // Rota responsavel por cadastrar o voto não 
    Route::get('/votacao/{id}', [VotacaoController::class, 'discorda'])->name('nao');

    Route::get('/votar-proposta/{id}', [VotacaoController::class, 'index'])->name('votar-p');

    Route::get('/resultado-parcial/{id}',[VotacaoController::class, 'resultadoparcial'])->name('resultado-parcial');

    //Home da comunidade ps: precisa mostrar apenas em processo, encerradas ou finalizadas
    Route::get('/home-c', 'ComunidadeController@viewcomunidade')->name('home-c');

    //Tela que mostra o resultado da pesquisa, tendo como base a pesquisa de nomes  
    Route::post('/pesquisa-com','ComunidadeController@pesquisacom')->name('pesquisa-com');
    
    //Finalizadas, foram finalizadas a votação da comunidade
    Route::get('/finalizadas-c', 'ComunidadeController@finalizadascom')->name('finalizadas-c');

    //Encerrada, já foi entregue os resultados da votação do decisor
    Route::get('/encerradas-c', 'ComunidadeController@encerradascom')->name('encerradas-c');

    Route::get('/resultadofinal-c/{id}', 'ComunidadeController@reslutadofinal')->name('resultadofinal-c');

    Route::get('/perfil-com', 'ComunidadeController@usercom')->name('perfil-c');

    Route::get('/favoritar/{id}', [AcompanhamentoController::class, 'store'])->name('favoritar');

    Route::get('/favoritas-c', 'AcompanhamentoController@index')->name('favoritas-c');
});





