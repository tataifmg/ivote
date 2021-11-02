@extends('comunidade.basecomunidade')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4">
                    <h2 class="">Propostas</h2> 
                </div>
                <div class="col-sm-6">
                    <form class="form-inline" action="{{route('pesquisa-com')}}" method="POST">
                        @csrf 
                        <input type="search" class="form-control" id="nome" name="nome" placeholder="Pesquise pelo nº da proposta">
                        <button class="btn btn-success" type="submit">Pesquisar</button>    
                    </form> 
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
                            <a href="{{ '/favoritar/'.$proposta->id}}" class="btn text-white" style="background-color: #D92344;">Favoritar</a>
                        </td>                       
                    </tr>
                    @endforeach
                </tbody> 
            </table>
        </div>
    </div>
@endsection