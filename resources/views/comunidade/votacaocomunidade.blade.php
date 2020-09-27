@extends('comunidade.basecomunidade')

@section('main')    
<form action="{{ route('nao', $proposta->id) }}"   >
    @csrf
    <div class="row">
      <div class="col-sm-1">
        <h2 value="{{ $proposta->id }}" name="proposta" id="proposta">{{$proposta->id}}</h2>         
      </div> 
      <div class="col-sm-9">  
        <h2 class="mx-auto d-block">{{$proposta->nome}}</h2>         
      </div> 
    </div>
    <br><br>
</form>
</form>
    <div class="row">
      <div class="form-group col-sm-8 mx-auto d-block "  >
        <textarea class="form-control"  rows="7" name="descricao" value="{{old('descricao')}}" readonly>{{$proposta->descricao}}</textarea>
      </div>
    </div>  
    <div class="row">
      <div class="form-group col-sm-4"></div>
      <div class="form-group col-sm-8 mx-auto d-block">
        <h4 class="font-italic ">Você concorda com essa proposta ?</h4>
      </div>
    </div> 
    <div class="row">
      <div class="form-group col-sm-5">
      </div>
      <div class="form-group col-sm-1">
        <a href="{{route('concordo', $proposta->id)}}" id="concordo" value="concordo" name="concordo" class="btn btn-success">Concordo</a>
      </div>
      <div class="form-group col-sm-1">
        <a href="{{route('nao', $proposta->id)}}" id="nao" value="não" name="nao" class="btn btn-danger">Discordo</a>
        <!--<button class="btn btn-danger"  type="submit" value="não" name="nao" >Discordo</button> -->
      </div>
    </div>
</form>
@endsection