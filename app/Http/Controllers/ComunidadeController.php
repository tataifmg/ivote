<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Proposta;
use App\User;
use App\Votacao;
use Illuminate\Http\Request;

class ComunidadeController extends Controller
{
    //-----------------------------------------Listagens das propostas comunidade ----------------------------------------
    public function viewcomunidade(){
        //Manda uma lista de todas as propostas para a comunidade 
        try{
            $propostas = Proposta::where('status','not like','Stand-by')->get();   
            return view('comunidade.homecomunidade', compact('propostas'));
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        } 
    }

    public function finalizadascom(){
        //Manda uma lista das propostas Finalizadas para a comunidade
        try{
            $propostas = Proposta::where('status','like','Finalizadas')->get();   
            return view('comunidade.finalizadascomunidade', compact('propostas'));
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        } 
    }

    public function encerradascom(){
        //Manda uma lista das propostas em Encerradas para a comunidade 
        try{
            $propostas = Proposta::where('status','like','Encerradas')->get();   
            return view('comunidade.encerradascomunidade', compact('propostas'));
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        } 
    }

    public function reslutadofinal(Request $request, $id){
        //Manda uma lista das propostas em Encerradas para a comunidade 
        try{
            $dados['proposta'] = Proposta::findOrFail($id);
            //Tenho que pegar as resposta==sim da comunidade que tenha o id prosposta
            // igual a prosposta selecionada 
            $dados['sim'] =Votacao::join('users','votacaos.user_id','=','users.id')
                    ->where('proposta_id',$id)
                    ->where('users.tipo_perfil','comunidade')
                    ->where('resposta','sim')
                    ->count();
            $dados['nao'] =Votacao::join('users','votacaos.user_id','=','users.id')
                    ->where('proposta_id',$id)
                    ->where('users.tipo_perfil','comunidade')
                    ->where('resposta','não')
                    ->count();
            return view('comunidade.votacaode', $dados);
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
    }
    //----------------------------------------- Pesquisa pelo nome da proposta -------------------------------    
    public function pesquisacom(Request $request){ 
        try{
            $id = $request->get('nome');
            $propostas = Proposta::where('id','like',$id)->get();
            return view('comunidade.pesquisacom', ['propostas' => $propostas]);

        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        } 
    }
    public function usercom(){
        try{
            $id = auth()->user()->id;
            $dados['cidades']= Cidade::all();
            $dados['user'] = User::findOrFail($id);
            return view('comunidade.perfilcomunidade', $dados);
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
    }
}
