<?php

namespace App\Http\Controllers;

use App\Entidade;
use App\Proposta;
use Illuminate\Http\Request;

class PropostaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // os dados é um arry que contem todos os dados de cidades puchados do banco
        $dados['entidades']= Entidade::all();
         //retorna a view do cadasto da entidade com os dados da tabela cidade 
        return view('decisor.cadastroproposta',$dados);
    }

    public function view(){
        $propostas = Proposta::all();

        return view('decisor.homedecisor', compact('propostas'));
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
    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'nome'=>'required',
            'descricao'=>'required'
        ]);
        try{
            $proposta = new Proposta ([
                'nome' => $request->get('nome'),
                'descricao' => $request->get('descricao'),
                'data_inicio_votacao_comunidade' => $request->get('data-in-com'),
                'data_fim_votacao_comunidade' => $request->get('data-fim-com'),
                'data_inicio_votacao_decisor' => $request->get('data-in-adm'),
                'data_fim_votacao_decisor' => $request->get('data-fim-adm'),
                'status' => $request->get('status'),
                'votantes' => ('0'),
                'chave_de_acesso' => $request->get('chave-acesso'),
                'entidade_id' => $request->get('entidade'),
                'acompanhamento_id' => (1),
            ]); 
            $proposta->save();
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
        return redirect('/nova-proposta')->with('success','Proposta Salva !');
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
        $proposta = Proposta::find($id);
        return view('decisor.editarproposta', compact('proposta'));
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
