@extends('decisor.basedecisor')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="">Propostas</h2> 
                </div>
                <div class="col-sm-6">
                    <form class="form-inline float-right " action="/action_page.php">
                        <input class="form-control mr-sm-2" type="text" placeholder="Pesquisar">
                        <button class="btn btn-success" type="submit">Pesquisar</button>
                    </form> 
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nome</td>
                        <td>Status</td>
                        <td colspan = 3>Ações</td>
                    </tr>
                </thead>  
            </table> 
        </div>
    </div>
@endsection