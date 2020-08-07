@extends('decisor.basedecisor')

@section('main')
<div class="row">
    <div class="col-sm-12">
        <div class="container">
            <div class="col-sm-6">
              <h2 class="">Perfil </h2>         
            </div>      
            <hr /> 
        </div>      
        <form class="container" action="/action_page.php">
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
            <br>
            <div class="col-sm-6">
                <h2 class="">Entidade </h2>         
            </div>      
            <hr /> 
            <div class="row">
                <div class="form-group col-md-4">
                  <label for="nome">Nome :</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $entidades->nome }}" readonly >
                </div>
                
                <div class="form-group col-md-4">
                  <label for="endereco">Endereço :</label>
                  <input type="text" class="form-control" id="endereco" name="endereco"  value="{{$entidades->endereco}}"readonly>
                </div>

                <div class="form-group col-md-4">
                    <label for="numero">Número :</label>
                    <input type="text" class="form-control" id="numero" name="numero" value="{{$entidades->numero}}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="cnpj">CNPJ :</label>
                    <input type="text" class="form-control" id="cnpj" name="cnpj"  value="{{$entidades->cnpj}}" readonly>
                </div>

                <div class="form-group col-md-4">
                    <label for="bairro">Bairro :</label>
                    <input type="text" class="form-control" id="bairro" name="bairro"  value="{{$entidades->bairro}}" readonly>
                </div>
                <div class="col-md-4">
                    <label for="comment"> Cidade :</label>
                    <br>
                    <!-- Conferir com roger como atualizar usando um dropdown!-->
                    <select name="cidade" class="form-control" readonly>
                      <option value="">...</option>
                      {{--  Pega os dados da tabela cidade como c--}}     
                      @foreach ($cidades as $c)
                        {{--O valor dos dados da opção é o id de cidades e a opções são os nomes q tao em c --}}
                        <option value="{{ $c->id }}" {{old('cidade',$entidades->cidade_id)==$c->id?'selected':''}} readonly> 
                          {{$c->nome}} </option>
                      @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>        
</div>
@endsection