@extends('decisor.basedecisor')

@section('main')    
<div class="row">
    <div class="col-sm-12">    
        <div class="row">
            <div class="col-sm-8">
                <h2 class="">Propostas</h2> 
            </div>
            <div class="col-sm-4">
                <form class="form-inline float-right" action="{{ route('cadastro-p') }}">
                    <button class="btn btn-primary" type="submit">Nova Proposta</button>
                </form> 
            </div>    
        </div>   
        <table class="table table-striped">  
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Status</td>
                    <td colspan = 4 >Ações</td>
                </tr>
            </thead>
            <tbody>
                @foreach($propostas as $proposta)        
                <tr>
                    <td>{{$proposta->id}}</td>
                    <td>{{$proposta->nome}}</td>
                    <td>{{$proposta->status}}</td>
                    <td class="actions ">
                        <a class="btn btn-light " href="edit.html">Registrar resultado</a>
                        <a class="btn btn-info " href="{{ '/visualizar-proposta/'.$proposta->id}}">Visualizar</a>
                        <a href="{{ '/editar-proposta/'.$proposta->id}}" class="btn btn-warning">Editar</a>
                        <a class="btn btn-danger "  href="#" onclick="confirma_exclusao();" >Excluir</a>
                    </td>                       
                </tr>
                @endforeach
            </tbody> 
        </table> 
        <hr />
        <div id="actions" class="row">
            <div class="col-md-12">
            <a href="{{ route('home-d') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>   
    </div>
</div>
<script type="text/javascript"> 
    function confirma_exclusao(){
        if(window.confirm("Deseja deletar a proposta?")){
            window.location.href="{{ '/excluir-proposta/'.$proposta->id}}";
        }
    }
    
</script>
@endsection