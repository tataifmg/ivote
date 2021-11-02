<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Proposta;
use App\User;
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
