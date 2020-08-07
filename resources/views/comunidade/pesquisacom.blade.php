@extends('comunidade.basecomunidade')

@section('main')    
<div class="row">
    <div class="col-sm-12">    
        <div class="row">
            <div class="col-sm-4">
                <h2 class="">Propostas</h2> 
            </div>   
        </div>   
        <table class="table table-striped">  
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Descrição</td>
                    <td>Status</td>
                    <td colspan = 2 >Ações</td>
                </tr>
            </thead>
            <tbody>
                @foreach($propostas as $proposta)        
                <tr>
                    <td>{{$proposta->id}}</td>
                    <td>{{$proposta->nome}}</td>
                    <td>{{$proposta->descricao}}</td>
                    <td>{{$proposta->status}}</td>
                    <td class="actions ">
                        <a href="{{ '/votar-proposta/'.$proposta->id}}" class="btn btn-info">Votar</a>
                        <a href="#" class="btn text-white" style="background-color: #D92344;">Favoritar</a>
                    </td>                        
                </tr>
                @endforeach
            </tbody> 
        </table> 
        <hr />
        <div id="actions" class="row">
            <div class="col-md-12">
            <a href="{{ route('home-c') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>   
    </div>
</div>
@endsection