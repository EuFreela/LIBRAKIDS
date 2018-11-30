@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cartões | <a href="{{route('home')}}">Voltar</a></div>

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
                            <th scope="col">Nome</th>
                            <th scope="col">Video</th>
                            <th scope="col">Imagem</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Edição</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cards as $card)
                        <tr>
                            <th scope="row">{{$card->id}}</th>
                            <td>{{$card->name}}</td>
                            <td>
                                @if(isset($card->video))
                                    <video width="150" height="100" controls>
                                        <source src="{{'/estudelibras/videos'.$card->video}}" type="video/mp4">
                                        Seu navegador não suporta html5
                                    </video>
                                @else
                                    Não há vídeo
                                @endif
                            </td>
                            <td>
                                @if(isset($card->name))
                                    <img src="{{'/estudelibras/images'.$card->image}}" width="150" height="100">
                                @else
                                    Não há imagem
                                @endif
                            </td>                            
                            <td>{{DB::table('category')->where('id','=',$card->category_id)->first()->name}}</td>
                            <td>
                                <a href="{{route('card.getedit',$card->id)}}" class="btn btn-primary">Editar</a>&nbsp;
                                <a href="{{route('card.delete',$card->id)}}" class="btn btn-danger">Excluir</a></td>
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