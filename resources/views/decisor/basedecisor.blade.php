<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>iVote</title>
        <link href="/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
        
    </head>
    <body >
        <nav class="navbar navbar-expand-sm bg-success navbar-light fixed-top " >
            <a class="navbar-brand" href="{{ route('home-d') }}">iVote</a>
            <ul class="navbar-nav navbar-center" >
              <li class="nav-item">
                <a class="nav-link" href="{{ route('home-d') }}">Home</a>
              </li>
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
            <form class="form-inline " action="{{ route('perfil-d') }}">
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
      
        <script src="/plugins/jquery/jquery.min.js" type="text/js"></script>
        <script src="/plugins/popper/popper.min.js" type="text/js"></script>
        <script src="/plugins/bootstrap/js/bootstrap.min.js" type="text/js"></script>
        <script src="{{ asset('js/app.js') }}" type="text/js"></script>
    </body>
</html>