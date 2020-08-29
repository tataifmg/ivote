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
            $proposta = Proposta::findOrFail($id);
            $votacao = new Votacao;
            $votacao->proposta_id = $proposta->id;
            $votacao->user_id = auth()->user()->id;
            $votacao->resposta ='sim';
            $votacao->save();
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
        return redirect('/home-c')->with('success','Voto salvo !');
    }

    public function discorda(Request $request, $id)
    {
        //dd($request->all());
        try{
            $proposta = Proposta::findOrFail($id);
            $votacao = new Votacao;
            $votacao->proposta_id = $proposta->id;
            $votacao->user_id = auth()->user()->id;
            $votacao->resposta = $request->get('nao');
            $votacao->save();
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
        return redirect('/home-c')->with('success','Voto salvo !');
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
