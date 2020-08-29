@extends('comunidade.basecomunidade')

@section('main')
<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-4">
                <h2 class="">Favoritas</h2> 
            </div>
            <div class="col-sm-4">
                <form class="form-inline" action="{{route('pesquisa-com')}}" method="POST">
                    @csrf 
                    <input type="search" class="form-control" id="nome" name="nome" placeholder="Pesquisar">
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
                    <td colspan = 1 >Ações</td>
                </tr>
            </thead>
            <tbody>
                @foreach($dados as $d)        
                <tr>
                    <td>{{$dados->proposta_id}}</td>
                    <td value="{{ $d->id }}" {{old('entidade',$proposta->entidade_id)==$e->id?'selected':''}}>
                    <td class="actions ">
                        <a href="{{ '/votar-proposta/'.$dados->proposta_id}}" class="btn btn-info">Votar</a>
                    </td>                       
                </tr>
                @endforeach
            </tbody> 
        </table>
    </div>
</div>
@endsection