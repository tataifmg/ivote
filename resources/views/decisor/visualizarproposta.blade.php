@extends('decisor.basedecisor')

@section('main')    
<div class="row">
  <div class="col-sm-12">
    <div class="row">
      <div class="col-sm-6">
        <h2 class="">Vizualizar Proposta</h2> 
      </div>
    </div>
    <hr />
    <form method="post" action="{{ route('update-p', $proposta->id) }}">
      @csrf
      <div class="row">   
        <div class="form-group col-md-4">  
          <label for="nome">Nome :</label>
          <input type="text" class="form-control" id="nome" name="nome" value="{{ $proposta->nome }}" readonly>  
        </div> 

        <div class="form-group col-md-4">      
          <label for="data-in-com">Data de início da votação da comunidade :</label>  
          <input type="date" class="form-control" id="data-in-com" name="data-in-com" 
          value="{{$proposta->data_inicio_votacao_comunidade->format('Y-m-d')}}" readonly>  
        </div>

        <div class="form-group col-md-4">
          <label for="data-fim-com">Data do fim da votação da comunidade :</label>
          <input type="date" class="form-control" id="data-fim-com" name="data-fim-com" 
          value="{{$proposta->data_fim_votacao_comunidade->format('Y-m-d')}}" readonly>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label for="comment">Entidade Relacionada :</label>
          <br>
          <!-- Conferir com roger como atualizar usando um dropdown!-->
          <select name="entidade" class="form-control" readonly>
            <option value="">...</option>
            {{--  Pega os dados da tabela cidade como c--}}     
            @foreach ($entidades as $e)
              {{--O valor dos dados da opção é o id de cidades e a opções são os nomes q tao em c --}}
              <option value="{{ $e->id }}" {{old('entidade',$proposta->entidade_id)==$e->id?'selected':''}} readonly> 
                {{$e->nome}} </option>
            @endforeach
          </select>
        </div>
        
        <div class="form-group col-md-4">  
          <label for="data-in-adm">Data de início da votação do decisor :</label>
          <input type="date" class="form-control" id="data-in-adm" name="data-in-adm" 
          value="{{$proposta->data_inicio_votacao_decisor->format('Y-m-d')}}" readonly>
        </div>
          
        <div class="form-group col-md-4">
          <label for="data-fim-adm">Data do fim da votação do decisor :</label>
          <input type="date" class="form-control" id="data-fim-com" name="data-fim-adm" 
          value="{{$proposta->data_fim_votacao_decisor->format('Y-m-d')}}" readonly>
        </div>  
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="descricao">Descrição :</label>
          <textarea class="form-control" rows="5" id="descricao" name="descricao" readonly>{{$proposta->descricao}} </textarea>
        </div>
        <div class="col-md-4">
          <label for="status">Status :</label>
          <br>
          <!-- -->
          <select id="status" class="form-control" name="status" readonly>
              <option value="Stand-by" {{ $proposta->status=='Stand-by'?'selected':''}} readonly>Stand-by</option>        
              <option value="Em processo" {{ $proposta->status=='Em processo'?'selected':''}} readonly>Em processo</option>        
              <option value="Finalizadas" {{$proposta->status=='Finalizadas'?'selected':''}} readonly>Finalizadas</option>        
              <option value="Encerradas" {{$proposta->status=='Encerradas'?'selected':''}} readonly>Encerradas</option>       
          </select>        
        </div> 
      </div> 

      <hr />
      <div id="actions" class="row">
        <div class="col-md-12">
          <a href="{{ route('home-d') }}" class="btn btn-primary">Voltar</a>
        </div>
      </div>      
    </form>
  </div>  
</div>
@endsection