@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                Historico | 
                <a href="{{route('home')}}">Voltar</a> |
                Número de acertos: 
                <span class="badge badge-pill badge-success" style="color:white;">{{ DB::table('history')->where('status_choice','=','ACERTOU')->Count()+1 }}</span>
                Número de erros: 
                <span class="badge badge-pill badge-danger" style="color:white;">{{ DB::table('history')->where('status_choice','=','ERROU')->Count()+1 }}</span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 
                    <div id="piechart" style="width: 900px; height: 500px;"></div>
                
                <section>

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pergunta</th>
                            <th scope="col">Resposta Correta</th>
                            <th scope="col">Escolha</th>
                            <th scope="col">Status</th>
                            <th scope="col">Pontos</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($history as $history)
                        <tr>
                            <th scope="row">{{$history->id}}</th>                            
                            <td>
                                @if(isset($history->id))
                                    <video width="150" height="100" controls>
                                        <source src="{{'/estudelibras/videos'.DB::table('quiz')->where('id','=',$history->quiz_id)->first()->ask}}" type="video/mp4">
                                        Seu navegador não suporta html5
                                    </video>
                                @else
                                    Não há vídeo
                                @endif
                            </td>
                            <td>
                                @if(isset($history->id))
                                    <img src="{{'/estudelibras/images'.DB::table('quiz')->where('id','=',$history->quiz_id)->first()->correct_answer}}" width="150" height="100">
                                @else
                                    Não há imagem
                                @endif
                            </td>                            
                            <td>
                                @if(isset($history))
                                    <img src="{{'/estudelibras/images'.$history->choice}}" width="150" height="100">
                                @else
                                    Não há imagem
                                @endif
                            </td>
                            <td>
                                {{$history->status_choice}}
                            </td>
                            <td>
                                {{$history->status_choice == 'ACERTOU' ? '+1 pt' : '+0 pt'}}
                            </td>
                        </tr>
                        @endforeach
                        </thead>
                    </table>
                
                </section>

                

                </div>
            </div>
        </div>
    </div>
</div>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Acertos',     {{DB::select('select count(*) as count from history where status_choice="ACERTOU"')[0]->count}}],
          ['Erros',      {{DB::select('select count(*) as count from history where status_choice="ERROU"')[0]->count}}],
        ]);

        var options = {
          title: 'Rendimento'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
@endsection