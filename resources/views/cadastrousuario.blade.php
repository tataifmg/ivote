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
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="">Cadastro Usuario</h4> 
                        </div>
                    </div>
                    <hr />
                    <form action="{{ route('standby-d') }}">
                        <div class="row">
                            <div class="form-group col-md-9">
                              <label for="nome" >Nome :</label>
                              <input type="text" class="form-control" id="nome">
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label for="cpf">CPF :</label>
                                <input type="text" class="form-control" id="cpf">
                              </div> 
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                              <label for="nome" >Email :</label>
                              <input type="text" class="form-control" id="nome">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="cpf">Confirmar Email :</label>
                                <input type="text" class="form-control" id="cpf">
                              </div> 
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                              <label for="nome" >Senha :</label>
                              <input type="text" class="form-control" id="nome">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="cpf">Confirmar Senha :</label>
                                <input type="text" class="form-control" id="cpf">
                              </div> 
                        </div>

                        <div class="row">
                        
                            <div class="col-md-4">
                                <label for="comment">Estado :</label>
                                <br>
                                <select name="estado" class="form-control">
                                    <option><a class="dropdown-item" href="#">Link 1</a></option>
                                    <option><a class="dropdown-item" href="#">Link 1</a></option>
                                    <option><a class="dropdown-item" href="#">Link 1</a></option>
                                </select>
                            </div>
        
                            <div class="col-md-4">
                                <label for="comment">Cidade :</label>
                                <br>
                                <select name="cidade" class="form-control">
                                    <option><a class="dropdown-item" href="#">Link 1</a></option>
                                    <option><a class="dropdown-item" href="#">Link 1</a></option>
                                    <option><a class="dropdown-item" href="#">Link 1</a></option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="comment">Tipo de Usuario :</label>
                                <br>
                                <select name="tipo_usuario" class="form-control">
                                    <option><a class="dropdown-item" href="#" value="1">Decisor</a></option>
                                    <option><a class="dropdown-item" href="#" value="2">Comunidade</a></option>
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
        </div>
        
        <script src="{{ asset('js/app.js') }}" type="text/js"></script>
        <script src="plugins/jquery/jquery.min.js" type="text/js"></script>
        <script src="plugins/popper/popper.min.js" type="text/js"></script>
        <script src="plugins/bootstrap/js/bootstrap.min.js" type="text/js"></script>
    </body>
</html>
