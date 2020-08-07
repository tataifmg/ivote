@extends('comunidade.basecomunidade')

@section('main')    
<div class="row">
  <div class="col-sm-12">
    <div class="row">
      <div class="col-sm-6">
           
        <h2 id="proposta" name="proposta">{{ $proposta->id }} {{ $proposta->nome }}</h2> 
      </div>
    </div>
    <hr />
    <form method="post" action="{{ route('update-p', $proposta->id) }}">
      @csrf
      <div class="row">
        <div class="form-group col-md-6">
          <label for="descricao">Descrição :</label>
          <textarea class="form-control" rows="5" id="descricao" name="descricao" readonly>{{$proposta->descricao}} </textarea>
        </div>
      </div> 
      <div class="row">
          <div class="form-group col-md-6">
              <label> Você aprova essa decisão ?</label>
              <br>
              <a onclick="confirma_votacao();" name="resposta" id="resposta" value="sim" class="btn btn-success">Sim</a>
              <a onclick="confirma_votacao();" name="resposta" id="resposta" value="nao" class="btn btn-danger">Não</a>
          </div>
      </div>
      <hr />
      <div id="actions" class="row">
        <div class="col-md-12">
          <a href="{{ route('home-c') }}" class="btn btn-primary">Voltar</a>
        </div>
      </div>      
    </form>
  </div>  
</div>
<script type="text/javascript"> 
    function confirma_votacao(){
        if(window.confirm("Esse é o seu voto final?")){
            window.location.href="{{'votacao'}}";
        }
    }
    
</script>
@endsection