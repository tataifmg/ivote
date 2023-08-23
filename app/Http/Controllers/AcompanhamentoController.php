<?php

namespace App\Http\Controllers;

use App\Acompanhamento;
use App\Proposta;
use Illuminate\Http\Request;

class AcompanhamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $user = auth()->user()->id;
            $dados = Acompanhamento::where('user_id', '=', $user)->get();
            $dados['acompanhamento']= Acompanhamento::all();   
            return view('comunidade.favoritascomunidade', $dados);
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
        return redirect('/home-c');
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
    public function store($id)
    {
        //dd($request->all());
        try{
            $proposta = Proposta::findOrFail($id);
            $favoritar = new Acompanhamento();
            $favoritar->proposta_id = $proposta->id;
            $favoritar->user_id = auth()->user()->id;
            $favoritar->save();
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
        return redirect('/home-c')->with('success','Proposta favoritada!');
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
