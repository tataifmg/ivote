<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>iVote</title>
        <link href="/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/Chart.min.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body >
        <nav class="navbar navbar-expand-sm  navbar-light fixed-top " style="background-color: #24BD73;">
            <a class="navbar-brand" href="{{ route('home-c') }}">iVote</a>
            <ul class="navbar-nav navbar-center" >
              <li class="nav-item">
                <a class="nav-link" href="{{ route('home-c') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('finalizadas-c') }}">Finalizadas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('encerradas-c') }}">Encerradas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('favoritas-c') }}">Favoritas</a>
              </li>
            </ul>
            <form class="form-inline " action="{{ route('perfil-c') }}">
                <button class="btn btn-light" type="submit">Perfil</button>
            </form>
            <div style="position:absolute; right:10px;">
              <form action="{{ route('sair') }}" method="POST">
                @csrf
                <button class="btn btn-light" type="submit">Sair</button>
              </form>
            </div>
        </nav>
        <div class="container-fluid" style="margin-top:80px">
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
        
        <script src="/plugins/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="/plugins/popper/popper.min.js" type="text/javascript"></script>
        <script src="/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/js/app.js" type="text/javascript"></script>
        <script src="/js/Chart.min.js" type="text/javascript"></script>
        @stack('afterscripts')
    </body>
</html>