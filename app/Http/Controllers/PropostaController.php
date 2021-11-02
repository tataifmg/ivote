<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Entidade;
use App\Proposta;
use App\User;
use App\Votacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
//-----------------------------------------Listagens das propostas ----------------------------------------
    public function view(){
        //Manda uma lista de todas as propostas para o decisor 
        $propostas = Proposta::all();
        return view('decisor.homedecisor', compact('propostas'));
    }
 
    public function standby(){
        //Manda uma lista das propostas em Stand-by para o decisor 
        try{
            $propostas = Proposta::where('status','like','Stand-by')->get();   
            return view('decisor.standbydecisor', compact('propostas'));
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        } 
    }

    public function emprocesso(){
        //Manda uma lista das propostas Em Processo para o decisor 
        try{
            //$proposta = Proposta::whereBetween();
            $propostas = Proposta::where('status','like','Em processo')->get();   
            return view('decisor.emprocessodecisor', compact('propostas'));
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        } 
    }

    public function finalizadas(){
        //Manda uma lista das propostas Finalizadas para o decisor 
        try{
            $propostas = Proposta::where('status','like','Finalizadas')->get();   
            return view('decisor.finalizadasdecisor', compact('propostas'));
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        } 
    }

    public function encerradas(){
        //Manda uma lista das propostas em Encerradas para o decisor 
        try{
            $propostas = Proposta::where('status','like','Encerradas')->get();   
            return view('decisor.encerradasdecisor', compact('propostas'));
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        } 
    }

    public function useradm(){
        try{
            $id = auth()->user()->id;
            $dados['cidades']= Cidade::all();
            $dados['user'] = User::findOrFail($id);
            return view('decisor.perfildecisor', $dados);
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
    }
//----------------------------------------- Pesquisa pelo nome da proposta -------------------------------    
    public function pesquisa(Request $request){
        try{
            $id = $request->get('nome');
            $propostas = Proposta::where('id','like',$id)->get();
            return view('decisor.pesquisa', ['propostas' => $propostas]);

        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        } 
    }
   
//-----------------------------------------Criação da proposta ----------------------------------------

 
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
                'chave_de_acesso' => $request->get('chave-acesso'),
                'entidade_id' => $request->get('entidade'),
                'acompanhamento_id' => (null),
            ]); 
            $proposta->save();
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
        return redirect('/nova-proposta')->with('success','Proposta Salva !');
    }

//-----------------------------------------Visualização da proposta ----------------------------------------
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        try{
            $dados['entidades']= Entidade::all();
            $dados['proposta'] = Proposta::findOrFail($id);
            
            return view('decisor.visualizarproposta', $dados);
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
    }
//-----------------------------------------Edição da proposta ----------------------------------------
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //dd($request->all()); debug 
        try{
            $dados['entidades']= Entidade::all();
            $dados['proposta'] = Proposta::findOrFail($id);
            return view('decisor.editarproposta', $dados);
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
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
        $request->validate([
            'nome'=>'required',
            'descricao'=>'required'
        ]);
        try{
            $proposta = Proposta::findOrFail($id);
            $proposta->nome = $request->get('nome');
            $proposta->descricao = $request->get('descricao');
            $proposta->data_inicio_votacao_comunidade = $request->get('data-in-com');
            $proposta->data_fim_votacao_comunidade = $request->get('data-fim-com');
            $proposta->status = $request->get('status');
            $proposta->entidade_id= $request->get('entidade');
            /* ver o que fazer com esses atributos 
                'chave_de_acesso' => $request->get('chave-acesso'),
                'votantes' => ('0'),
                'acompanhamento_id' => (1),
            */
            $proposta->save();
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
        return redirect('/home-d')->with('success','Proposta Editada com sucesso !');
    }

//-----------------------------------------Delete da proposta ----------------------------------------
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $proposta = Proposta::findOrFail($id);
            $proposta->delete();
        }catch(\Exception $e){
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
        return redirect('/home-d')->with('success', 'Proposta deletada!');
    }
}
