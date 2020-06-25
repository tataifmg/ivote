@extends('decisor.basedecisor')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="">Inserir Entidade</h2> 
                </div>
            </div>
            <hr />
        <form action="{{route('cadastro-e')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                      <label for="nome">Nome :</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{old('nome')}}">
                    </div>
                    
                    <div class="form-group col-md-4">
                      <label for="endereco">Endereço :</label>
                      <input type="text" class="form-control" id="endereco" name="endereco"  value="{{old('endereco')}}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="numero">Número :</label>
                        <input type="text" class="form-control" id="numero" name="numero" value="{{old('numero')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="cnpj">CNPJ :</label>
                        <input type="text" class="form-control" id="cnpj" name="cnpj"  value="{{old('cnpj')}}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="bairro">Bairro :</label>
                        <input type="text" class="form-control" id="bairro" name="bairro"  value="{{old('bairro')}}">
                    </div>

                    <div class="col-md-3">
                        <label for="comment">Cidade :</label>
                        <br>
                        <select name="cidade" class="form-control">
                            <option value="">...</option>
                            {{--  Pega os dados da tabela cidade como c--}}
                            @foreach ($cidades as $c)
                                {{--O valor dos dados da opção é o id de cidades e a opções são os nomes q tao em c --}}
                                <option value="{{ $c->id }}" {{old('cidade')==$c->id?'selected':''}}> {{$c->nome}} </option>
                            @endforeach
                        </select>
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