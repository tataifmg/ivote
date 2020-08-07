@extends('decisor.basedecisor')

@section('main')
<div class="row">
  <div class="col-sm-12">
    <div class="row">
      <div class="col-sm-6">
        <h2 class="">Nova Proposta</h2>         
      </div>      
    </div>      
    <hr />      
    <form action="{{ route('cadastro-p') }}" method="POST">      
      @csrf      
      <div class="row">   
        <div class="form-group col-md-4">  
          <label for="nome">Nome :</label>
          <input type="text" class="form-control" id="nome" name="nome" value="{{old('nome')}}">  
        </div> 
        
        <div class="form-group col-md-4">      
          <label for="data-in-com">Data de início da votação da comunidade :</label>  
          <input type="date" class="form-control" id="data-in-com" name="data-in-com" value="{{old('data-in-com')}}">  
        </div>

        <div class="form-group col-md-4">
          <label for="data-fim-com">Data do fim da votação da comunidade :</label>
          <input type="date" class="form-control" id="data-fim-com" name="data-fim-com" value="{{old('data-fim-com')}}">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label for="comment">Entidade Relacionada :</label>
          <br>
          <select name="entidade" class="form-control">
            <option value="">...</option>
            {{--  Pega os dados da tabela cidade como c--}}     
            @foreach ($entidades as $e)
            {{--O valor dos dados da opção é o id de cidades e a opções são os nomes q tao em c --}}
            <option value="{{ $e->id }}" {{old('entidade')==$e->id?'selected':''}}> {{$e->nome}} </option>
            @endforeach
          </select>
        </div>
        
        <div class="form-group col-md-4">  
          <label for="data-in-adm">Data de início da votação do decisor :</label>
          <input type="date" class="form-control" id="data-in-adm" name="data-in-adm" value="{{old('data-in-adm')}}">
        </div>
          
        <div class="form-group col-md-4">
          <label for="data-fim-adm">Data do fim da votação do decisor :</label>
          <input type="date" class="form-control" id="data-fim-com" name="data-fim-adm" value="{{old('data-fim-adm')}}">
        </div>  
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="descricao">Descrição :</label>
          <textarea class="form-control" rows="5" id="descricao" name="descricao" value="{{old('descricao')}}" ></textarea>
        </div>
        {{-- Conferir se esse tipo de cadastro ta certo  --}}
        <div class="col-md-4">
          <label for="status">Status :</label>
          <br>
          <select id="status" class="form-control" name="status" value="{{old('status')}}">
            <option value="Stand-by">Stand-by</option>        
            <option value="Em processo">Em processo</option>        
            <option value="Finalizadas">Finalizadas</option>        
            <option value="Encerradas">Encerradas</option>        
          </select>        
        </div>      
        {{-- Conferir se esse tipo de cadastro ta certo, ou seria tipo codigo altomatico   --}}
        <div class="form-group col-md-4">        
          <label for="chave-acesso">Chave de acesso :</label>        
          <input type="text" class="form-control" id="chave-acesso" name="chave-acesso" value="{{old('chave-acesso')}}">        
        </div>      
        
      </div>    
      <hr />      
      <div id="actions" class="row">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Salvar</button>
          <a href="{{ route('home-d') }}" class="btn btn-default">Cancelar</a>
        </div>
      </div>
    </form>    
  </div>
</div>
@endsection