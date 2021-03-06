@extends('decisor.basedecisor')

@section('main')    
<form action="{{ route('naod', $proposta->id) }}" >
    @csrf
    <div class="row">
      <div class="col-sm-1">
        <h2 value="{{ $proposta->id }}" name="proposta" id="proposta">{{$proposta->id}}</h2>         
      </div> 
      <div class="col-sm-6">  
        <h2 class="">{{$proposta->nome}}</h2>         
      </div> 
    </div>
    <br><br>
    <div class="row">
      <div class="form-group col-sm-8">
        <h4 class="font-italic">Descrição :</h4>
      </div>
      <div class="form-group col-sm-4" >
        <h4 class="font-italic">Resultado final da comunidade :</h4>
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