@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quiz | <a href="{{route('home')}}">Voltar</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 
                <section>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pergunta</th>
                            <th scope="col">Resposta 1</th>
                            <th scope="col">Resposta 2</th>
                            <th scope="col">Resposta 3</th>
                            <th scope="col">Resposta Correta</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Edição</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($quiz as $quiz)
                        <tr>
                            <th scope="row">{{$quiz->id}}</th>                            
                            <td>
                                @if(isset($quiz->ask))
                                    <video width="150" height="100" controls>
                                        <source src="{{'/estudelibras/videos'.$quiz->ask}}" type="video/mp4">
                                        Seu navegador não suporta html5
                                    </video>
                                @else
                                    Não há vídeo
                                @endif
                            </td>
                            <td>
                                @if(isset($quiz->answer_1))
                                    <img src="{{'/estudelibras/images'.$quiz->answer_1}}" width="150" height="100">
                                @else
                                    Não há imagem
                                @endif
                            </td>                            
                            <td>
                                @if(isset($quiz->answer_2))
                                    <img src="{{'/estudelibras/images'.$quiz->answer_2}}" width="150" height="100">
                                @else
                                    Não há imagem
                                @endif
                            </td>
                            <td>
                                @if(isset($quiz->answer_3))
                                    <img src="{{'/estudelibras/images'.$quiz->answer_3}}" width="150" height="100">
                                @else
                                    Não há imagem
                                @endif
                            </td>
                            <td>
                                @if(isset($quiz->correct_answer))
                                    <img src="{{'/estudelibras/images'.$quiz->correct_answer}}" width="150" height="100">
                                @else
                                    Não há imagem
                                @endif
                            </td>
                            <td>{{DB::table('category')->where('id','=',$quiz->category_id)->first()->name}}</td>
                            <td>
                                <p><a href="{{route('quiz.getedit',$quiz->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a></p>
                                <p><a href="{{route('quiz.delete',$quiz->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt">&nbsp;</i></p></a>
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
@endsection