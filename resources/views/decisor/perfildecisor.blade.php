@extends('decisor.basedecisor')

@section('main')
<div class="row">
    <div class="col-sm-12">
        <div>
            <div class="col-sm-6">
              <h2 class="">Perfil </h2>         
            </div>      
            <hr /> 
        </div>      
        <form  action="{{ route('home-d')}}">
            <div class="row">    
                <div class="form-group col-md-4">  
                    <label for="nome">Nome :</label>
                    <input type="text" class="form-control" id="nome" name="nome"  value="{{ $user->nome }}" readonly>  
                </div> 
                <div class="form-group col-md-4">  
                    <label for="cpf">CPF :</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $user->cpf }}" readonly>  
                </div> 
                <div class="form-group col-md-4">  
                    <label for="email">Email :</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>  
                </div> 
            </div> 
            <div class="row">    
                <div class="col-md-4">
                    <label for="comment"> Cidade :</label>
                    <br>
                    <!-- Conferir com roger como atualizar usando um dropdown!-->
                    <select name="cidade" class="form-control" readonly>
                      <option value="">...</option>
                      {{--  Pega os dados da tabela cidade como c--}}     
                      @foreach ($cidades as $c)
                        {{--O valor dos dados da opção é o id de cidades e a opções são os nomes q tao em c --}}
                        <option value="{{ $c->id }}" {{old('cidade',$user->cidade_id)==$c->id?'selected':''}} readonly> 
                          {{$c->nome}} </option>
                      @endforeach
                    </select>
                </div> 
                <div class="form-group col-md-4">  
                    <label for="tipo_perfil">Tipo de perfil :</label>
                    <input type="text" class="form-control" id="tipo_perfil" name="tipo_usuario" value="{{ $user->tipo_perfil }}" readonly>  
                </div>  
            </div> 
            <hr>
            <div>
                <button type="submit" class="btn btn-primary" >Voltar</button>
            </div>
        </form>
    </div>        
</div>
@endsection