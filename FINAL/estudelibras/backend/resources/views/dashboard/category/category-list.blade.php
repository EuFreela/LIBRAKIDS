@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categoria | <a href="{{route('home')}}">Voltar</a> | <a href="{{route('category.getcreate')}}">Adicionar</a></div>

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
                            <th scope="col">Imagem</th>
                            <th scope="col">Edição</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($category as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->name}}</td>
                            <td>
                                @if(isset($category->name))
                                    <img src="{{'/estudelibras/images'.$category->image}}" width="100" height="96">
                                @else
                                    Não há imagem
                                @endif
                            </td>
                            <td>
                                <a href="{{route('category.getedit',$category->id)}}" class="btn btn-primary">Editar</a>&nbsp;
                                <a href="{{route('category.delete',$category->id)}}" class="btn btn-danger">Excluir</a></td>
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