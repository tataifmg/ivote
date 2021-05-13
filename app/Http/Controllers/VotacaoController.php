<?php

namespace App\Http\Controllers;

use App\Entidade;
use App\Proposta;
use App\User;
use App\Votacao;
use Illuminate\Http\Request;

class VotacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        try{
            $dados['entidades']= Entidade::all();
            $dados['proposta'] = Proposta::findOrFail($id);
            
            return view('comunidade.votacaocomunidade', $dados);
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }

    }
    /* Tenho que registrar os votos do decisor 
        1. Registrar como um usuario votando se concorda ou não 
        2. Registrar como um adm em que registra de uma vez todas respostas dos 
        decisores votantes. 
    */
    public function a(Request $request, $id)
    {
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
            return view('decisor.votacaodecisor', $dados);
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function concordo(Request $request, $id)
    {
        //dd($request->all());
        try{
            $dados['proposta'] = Proposta::findOrFail($id);
            $proposta = Proposta::findOrFail($id);
            $votacao = new Votacao;
            $votacao->proposta_id = $proposta->id;
            $votacao->user_id = auth()->user()->id;
            $votacao->resposta ='sim';
            $votacao->save();
            return view('comunidade.resultadoparcial',$dados)->with('success','Voto salvo !');
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
        
    }

    public function discorda(Request $request, $id)
    {
        //dd($request->all());
        try{
            $dados['proposta'] = Proposta::findOrFail($id);
            $proposta = Proposta::findOrFail($id);
            $votacao = new Votacao;
            $votacao->proposta_id = $proposta->id;
            $votacao->user_id = auth()->user()->id;
            $votacao->resposta = 'não';
            $votacao->save();
            return view('comunidade.resultadoparcial',$dados)->with('success','Voto salvo !');
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
    }

    public function resultadoparcial($id)
    {
        try{
            //$dados['proposta'] = Proposta::findOrFail($id);
            
            $dados['sim'] =Votacao::join('users','votacaos.user_id','=','users.id')
                    ->where('proposta_id',$id)
                    ->where('users.tipo_perfil','comunidade')
                    ->where('resposta','sim')
                    ->count();
            $dados['nao'] = Votacao::join('users','votacaos.user_id','=','users.id')
                    ->where('proposta_id',$id)
                    ->where('users.tipo_perfil','comunidade')
                    ->where('resposta','não')
                    ->count();
            //dd($dados->all());
            return view('comunidade.resultadoparcial',$dados);
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
       
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
