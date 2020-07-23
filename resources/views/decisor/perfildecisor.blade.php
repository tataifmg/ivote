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
                    <input type="text" class="form-control" id="nome" name="nome"  readonly>  
                </div> 
                <div class="form-group col-md-4">  
                    <label for="cpf">CPF :</label>
                    <input type="text" class="form-control" id="cpf" name="cpf"  readonly>  
                </div> 
                <div class="form-group col-md-4">  
                    <label for="email">Email :</label>
                    <input type="text" class="form-control" id="email" name="email"  readonly>  
                </div> 
            </div> 
            <div class="row">    
                <div class="form-group col-md-4">  
                    <label for="cidade">Cidade :</label>
                    <input type="text" class="form-control" id="cidade" name="cidade"  readonly>  
                </div> 
                <div class="form-group col-md-4">  
                    <label for="tipo_usuario">Tipo de perfil :</label>
                    <input type="text" class="form-control" id="tipo_usuario" name="tipo_usuario"  readonly>  
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
                <input type="text" class="form-control" id="nome" name="nome" readonly>
                </div>
                
                <div class="form-group col-md-4">
                  <label for="endereco">Endereço :</label>
                  <input type="text" class="form-control" id="endereco" name="endereco"  value="{{old('endereco')}}"readonly>
                </div>

                <div class="form-group col-md-4">
                    <label for="numero">Número :</label>
                    <input type="text" class="form-control" id="numero" name="numero" value="{{old('numero')}}"readonly>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="cnpj">CNPJ :</label>
                    <input type="text" class="form-control" id="cnpj" name="cnpj"  value="{{old('cnpj')}}" readonly>
                </div>

                <div class="form-group col-md-4">
                    <label for="bairro">Bairro :</label>
                    <input type="text" class="form-control" id="bairro" name="bairro"  value="{{old('bairro')}}" readonly>
                </div>
            </div>
        </form>
    </div>        
</div>
@endsection