@extends('decisor.basedecisor')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="">Proposta </h2> 
                </div>
            </div>
            <hr />
            <form action="{{ route('standby-d') }}">
                <div class="row">
                    <div class="form-group col-md-4">
                      <label for="nome">Nome :</label>
                      <input type="text" class="form-control" id="nome">
                    </div>
                    
                    <div class="form-group col-md-4">
                      <label for="data-in-com">Data de início da votação da comunidade :</label>
                      <input type="text" class="form-control" id="data-in-com">
                    </div>
                    
                    <div class="form-group col-md-4">
                      <label for="data-fim-com">Data do fim da votação da comunidade :</label>
                      <input type="text" class="form-control" id="data-fim-com">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="entidade-rel">Entidade Relacionada :</label>
                        <input type="text" class="form-control" id="entidade-rel">
                    </div>
                    
                    <div class="form-group col-md-4">
                      <label for="data-in-adm">Data de início da votação do decisor :</label>
                      <input type="text" class="form-control" id="data-in-adm">
                    </div>
                    
                    <div class="form-group col-md-4">
                      <label for="data-fim-adm">Data do fim da votação do decisor :</label>
                      <input type="text" class="form-control" id="data-fim-com">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="comment">Descrição :</label>
                        <textarea class="form-control" rows="5" id="comment"></textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="comment">Status :</label>
                        <br>
                        <div class="dropdown">
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                odio
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Link 1</a>
                                <a class="dropdown-item" href="#">Link 2</a>
                                <a class="dropdown-item" href="#">Link 3</a>
                            </div>
                        </div>
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