<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>iVote</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!-- Our Custom CSS -->

        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/Chart.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body>
      <div class="wrapper">
        <nav id="sidebar">
          <div class="sidebar-header">
            <h2>iVote</h2>
          </div>

          <ul class="list-unstyled components">
            <li>
              <a href="{{ route('home-d') }}">Home</a>
            </li>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse"
                 aria-expanded="false" class="dropdown-toggle">
                 Cadastros</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                      <a href="{{route('cadastro-p')}}">Cadastrar proposta</a>
                    </li>
                    <li>
                      <a href="{{route('inserir-e')}}">Cadastrar entidade</a>
                    </li>
                </ul>
            </li>
            <li>
              <a href="#pageSubmenu" data-toggle="collapse" 
              aria-expanded="false" class="dropdown-toggle">
              Status da proposta</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('standby-d') }}">Stand-by</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('emprocesso-d') }}">Em processo</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('finalizadas-d') }}">Finalizadas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('encerradas-d') }}">Encerradas</a>
                </li>
              </ul>
          </li>
          </ul>
        </nav>
        <div id="content" class="container-fluid">
          <nav class="navbar navbar-expand-lg bg-success navbar-light fixed-top ">
              <a class="navbar-brand" href="{{ route('home-d') }}">iVote</a>
              <ul class="navbar-nav navbar-center" >
                <li class="nav-item">
                  <button type="button" id="sidebarCollapse" class="btn" style="background-color: #5cb85c;">
                    <i class="fas fa-align-left"></i>
                  </button>
                </li>
              </ul>
              <form class="form-inline" style="position:absolute; right:70px;" action="{{ route('perfil-d') }}">
                  <button class="btn" type="submit" style="background-color: #5cb85c;">Perfil</button>
              </form>
              <div style="position:absolute; right:10px;">
                <form action="{{ route('sair') }}" method="POST">
                  @csrf
                  <button class="btn"  type="submit" style="background-color: #5DCF7D;">Sair</button>
                </form>
              </div>
          </nav>
          <div style="margin-top:80px">
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
            @yield('main')
          </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="/js/app.js" type="text/javascript"></script>
        <script src="/js/Chart.min.js" type="text/javascript"></script>
        <script src="/js/sidebar.js" type="text/javascript"></script>
        @stack('afterscripts')
    </body>
</html>