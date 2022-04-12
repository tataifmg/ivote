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
                        <td>ID</td>
                        <td>Nome</td>
                        <td>Status</td>
                        <td colspan = 4>Ações</td>
                    </tr>
                </thead>  
                <tbody>
                    @foreach($propostas as $proposta)        
                    <tr>
                        <td>{{$proposta->id}}</td>
                        <td>{{$proposta->nome}}</td>
                        <td>{{$proposta->status}}</td>
                        <td class="actions ">
                            <!-- Dar funcionalidade a esse botão   !-->
                            <a class="btn btn-primary " href="edit.html">Resultado final</a>
                        </td>                       
                    </tr>
                    @endforeach
                </tbody> 
            </table> 
        </div>
    </div>
@endsection