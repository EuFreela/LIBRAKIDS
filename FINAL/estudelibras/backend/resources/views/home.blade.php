@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <section>
                   
                   <div class="card-deck">
                        <div class="card">
                            <img class="card-img-top" src="https://www.ubertheme.com/wp-content/uploads/sites/3/edd/2014/06/jm-category.png" width="200" height="200">
                            <div class="card-body">
                            <h5 class="card-title">Categoria</h5>
                            <p class="card-text">{{DB::table('category')->count()}} categoria(s). <a href="{{route('category.getlist')}}">Lista</a></p>
                            </div>
                            <div class="card-footer">
                            <small class="text-muted"><a href="{{route('category.getcreate')}}" class="btn btn-primary">Cadastrar</a></small>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="https://http2.mlstatic.com/S_969903-MLB27036944347_032018-O.jpg" width="200" height="200">
                            <div class="card-body">
                            <h5 class="card-title">Cartão</h5>
                            <p class="card-text">{{DB::table('cards')->count()}} cartão(s). <a href="{{route('card.getlist')}}">Lista</a></p>
                            </div>
                            <div class="card-footer">
                            <small class="text-muted"><a href="{{route('card.getcreate')}}" class="btn btn-primary">Cadastrar</a></small>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="https://mk0blogacton3ngqa7ix.kinstacdn.com/wp-content/uploads/2015/04/Quiz.png" width="200" height="200">
                            <div class="card-body">
                            <h5 class="card-title">Quiz</h5>
                            <p class="card-text">{{DB::table('quiz')->count()}} questão(s). <a href="{{route('quiz.getlist')}}">Lista</a></p>
                            </div>
                            <div class="card-footer">
                            <small class="text-muted"><a href="{{route('quiz.getcreate')}}" class="btn btn-primary">Cadastrar</a></small>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmLW5us2uG221QhRphKcF1D93LDULuIMrZADOo2qmCaWjwJioV" width="200" height="200">
                            <div class="card-body">
                            <h5 class="card-title">Histórico</h5>
                            <p class="card-text">{{DB::table('history')->count()}} dados(s). <a href="{{route('quiz.getlist')}}">Lista</a></p>
                            </div>
                            <div class="card-footer">
                            <small class="text-muted"><a href="{{route('history.getview')}}" class="btn btn-primary">Visualizar</a> <a href="{{route('history.delete')}}" class="btn btn-danger">Apagar</a></small>
                            </div>
                        </div>
                    </div>           
                
                </section>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection


