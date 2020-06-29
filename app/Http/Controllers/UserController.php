<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidade;
use App\Estado;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $dados['cidades']= Cidade::all();
         $dados['estados']= Estado::all();

         return view('cadastrousuario', $dados);
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
        $request->validate([
            'cpf'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);
        try{
            $user = new User([
                'nome' => $request->get('nome'),
                'cpf'=> $request->get('cpf'),
                'email'=> $request->get('email'),
                'password'=>$request->get('password'),

            ]);
            $user->save();
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
        /*$request->validate([
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
        return redirect('/inserir-entidade')->with('success','Entidade Salva !');*/
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
