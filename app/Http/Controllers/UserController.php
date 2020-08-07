<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cidade;
use App\Entidade;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $dados['cidades']= Cidade::all();

         return view('cadastrousuario', $dados);*/
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
       /* $request->validate([
            'cpf'=>'required',
            'email'=>'required',
            'password'=>'required'
         ]);
         try{
            $user = new User([
                'nome' => $request->get('nome'),
                'cpf'=> $request->get('cpf'),
                'email'=> $request->get('email'),
                'password'=>$request->get('senha'),
                'cidade_id' => $request->get('cidade'),
                'tipo_perfil' => $request->get('tipo_perfil'),

            ]);
            $user->save();
         }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
         }
         return redirect('/home-d')->with('success','Cadastro feito com sucesso !');
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       /* try{
            $dados['cidades']= Cidade::all();
             //definir corretamente a entidade que esta sendo utilizado
            $dados['entidades'] = Entidade::findOrFail(2);
            //definir corretamente o perfil que esta sendo utilizado
            $dados['user'] = User::findOrFail(1);
            return view('decisor.perfildecisor', $dados);
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
        */
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
