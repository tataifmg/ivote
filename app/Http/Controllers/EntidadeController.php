<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entidade;
use App\Cidade;

class EntidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // os dados é um arry que contem todos os dados de cidades puchados do banco
        $dados['cidades']= Cidade::all();
        
        //retorna a view do cadasto da entidade com os dados da tabela cidade 
        return view('decisor.cadastroentidade', $dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all()); //-- pega todos os dados que eu  to mandando prometo post
        $request->validate([
            'nome'=>'required',
            'cnpj'=>'required'
        ]);
        try{
            $entidade = new Entidade ([
                'nome' => $request->get('nome'),
                'cnpj' => $request->get('cnpj'),
                'endereco' => $request->get('endereco'),
                'numero' => $request->get('numero'),
                'bairro' => $request->get('bairro'),
                'cidade_id' => $request->get('cidade')
            ]); 
            $entidade->save();
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
        return redirect('/inserir-entidade')->with('success','Entidade Salva !');
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
