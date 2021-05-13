@extends('comunidade.basecomunidade')

@section('main')    
<form action="{{ route('nao', $proposta->id) }}"   >
    @csrf
    <div class="row">
      <div class="col-sm-4"></div> 
      <div class="col-sm-8"> 
        <h2 class="mx-auto d-block font-italic">Resultado parcial da comunidade :</h2>         
      </div> 
    </div>
    <br><br>
    <div class="row">
      <div class="form-group col-sm-8 mx-auto d-block "  >
        <canvas id="myChart" width="50"></canvas>
      </div>
    </div>  
    
</form>
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
              data: [{{$nao}}, {{$sim}}],
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