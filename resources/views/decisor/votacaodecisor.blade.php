@extends('decisor.basedecisor')

@section('main')    
<form action="{{ route('naod', $proposta->id) }}" >
    @csrf
    <div class="row">
      <div class="col-sm-1">
        <h3 value="{{ $proposta->id }}" name="proposta" id="proposta">{{$proposta->id}}</h3>         
      </div> 
      <div class="col-sm-6">  
        <h4 class="" name="nome" id="nome">{{$proposta->nome}}</h4>         
      </div> 
    </div>
    <br><br>
    <div class="row">
      <div class="form-group col-sm-8">
        <h4> Descrição :</h4>
      </div>
      <div class="form-group col-sm-4" >
        <h4 >Resultado final da comunidade :</h4>
      </div>
    </div> 
    <div class="row">
      <div class="form-group col-sm-8">
        <textarea class="form-control"  rows="7" name="descricao" value="{{old('descricao')}}" readonly>{{$proposta->descricao}}</textarea>
      </div>
      <div class="col-sm-4">
        <canvas id="myChart" width="50"></canvas>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="form-group col-sm-4"></div>
      <div class="form-group col-sm-8 mx-auto d-block">
        <h4 class="font-italic ">Qual o resultado final da proposta ?</h4>
      </div>
    </div> 
    <div class="row">
      <div class="form-group col-sm-5">
      </div>
      <div class="form-group col-sm-1">
        <a href="{{route('simd', $proposta->id)}}" id="aprovada" value="aprovada" name="aprovada" class="btn btn-success">Aprovada</a>
      </div>
      <div class="form-group col-sm-1">
        <a href="{{route('naod', $proposta->id)}}" id="nao" value="não" name="nao" class="btn btn-danger">Reprovada</a>
        <!--<button class="btn btn-danger"  type="submit" value="não" name="nao" >Discordo</button> -->
      </div>
    </div> 
    <br> 
</form>
<div class="row">
  
</div>

@endsection
@prepend('afterscripts')
<script type="text/javascript">
  $(document).ready(function(){
  var ctx = document.getElementById('myChart');
  var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
          labels: ['Não','Sim'],
          datasets: [{
              label: '# de votos',
              data: [{{$nao}},{{$sim}} ],
              backgroundColor: [
                  'rgba(205, 13, 35, 0.2)',
                  'rgba(58, 242, 101, 0.2)',
              ],
              borderColor: [
                  'rgba(205, 13, 35, 1)',
                  'rgba(58, 242, 101, 1)',
              ],
              borderWidth: 1
          }]
      },
      options: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
      }
  }); 
}); 
  </script>
@endprepend