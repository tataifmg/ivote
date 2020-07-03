<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>iVote</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
        <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body >
        <nav class="navbar navbar-expand-sm navbar-dark fixed-top " style="background-color: #03A65A">
            <a class="navbar-brand " href="{{ route('home-d') }}">iVote</a>
        </nav>
        <div class="container-fluid " style="margin-top:80px">
            @if(session()->has('danger'))
                <div class="alert alert-danger">
                    {{ session()->get('danger') }}
                </div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="">Cadastro Usuario</h4> 
                        </div>
                    </div>
                    <hr />
                    <form action="{{route('cad-u')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-9">
                              <label for="nome" >Nome :</label>
                              <input type="text" class="form-control" id="nome" name="nome" value="{{old('nome')}}">
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label for="cpf">CPF :</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" value="{{old('cpf')}}">
                              </div> 
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                              <label for="email" >Email :</label>
                              <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="confirmar_email">Confirmar Email :</label>
                                <input type="text" class="form-control" id="confirmar_email" name="confirmar_email" value="{{old('confirmar_email')}}">
                              </div> 
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                              <label for="senha" >Senha :</label>
                              <input type="text" class="form-control" id="senha" name="senha" value="{{old('senha')}}">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="confirmar_senha">Confirmar Senha :</label>
                                <input type="text" class="form-control" id="confirmar_senha" name="confirmar_senha" value="{{old('confirmar_senha')}}">
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-md-4">
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

                            <div class="col-md-3">
                                <label for="comment">Tipo de Usuario :</label>
                                <br>
                                <select name="tipo_usuario" class="form-control">
                                    <option value="">...</option>
                                    <option><a class="dropdown-item" href="#" value="1">Decisor</a></option>
                                    <option><a class="dropdown-item" href="#" value="2">Comunidade</a></option>
                                </select>
                            </div>
                        </div>
                        <hr />
                        <div id="actions" class="row">
                          <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <a href="{{ route('home') }}" class="btn btn-default">Cancelar</a>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}" type="text/js"></script>
        <script src="plugins/jquery/jquery.min.js" type="text/js"></script>
        <script src="plugins/popper/popper.min.js" type="text/js"></script>
        <script src="plugins/bootstrap/js/bootstrap.min.js" type="text/js"></script>
    </body>
</html>
