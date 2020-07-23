@extends('decisor.basedecisor')

@section('main')    
<div class="row">
    <div class="col-sm-12">    
        <div class="row">
            <div class="col-sm-4">
                <h2 class="">Propostas</h2> 
            </div>
            <div class="col-sm-4">
                <form class="form-inline" action="/action_page.php">
                    <input class="form-control mr-sm-2" type="text" placeholder="Pesquisar">
                    <button class="btn btn-success" type="submit">Pesquisar</button>    
                </form> 
            </div>
            <div class="col-sm-4">
                <form class="form-inline float-right" action="{{ route('cadastro-p') }}">
                    <button class="btn btn-primary" type="submit">Nova Proposta</button>
                </form> 
            </div>    
        </div>   
        <table class="table table-striped">  
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Status</td>
                    <td colspan = 4 >Ações</td>
                </tr>
            </thead>
            <tbody>
                @foreach($propostas as $proposta)        
                <tr>
                    <td>{{$proposta->id}}</td>
                    <td>{{$proposta->nome}}</td>
                    <td>{{$proposta->status}}</td>
                    <td class="actions ">
                        <a class="btn btn-light " href="edit.html">Votar</a>
                        <a class="btn btn-info " href="{{ '/visualizar-proposta/'.$proposta->id}}">Visualizar</a>
                        <a href="{{ '/editar-proposta/'.$proposta->id}}" class="btn btn-warning">Editar</a>
                        <a class="btn btn-danger "  href="#" onclick="confirma_exclusao();" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                    </td>                       
                </tr>
                @endforeach
            </tbody> 
        </table> 
        <nav aria-label="Navegação de página exemplo">
            <ul class="pagination justify-content-center fixed-bottom">       
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Anterior">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Anterior</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>      
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Próximo">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Próximo</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!--
            <ul class="pagination justify-content-center fixed-bottom" style="margin:20px 0 ">
                <li class="page-item"><a class="page-link" href="#"><</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">></a></li>
            </ul>                  
        -->
    </div>
</div>
<script type="text/javascript"> 
    function confirma_exclusao(){
        if(window.confirm("Deseja deletar a proposta?")){
            window.location.href="{{ '/excluir-proposta/'.$proposta->id}}";
        }
    }
</script>
@endsection