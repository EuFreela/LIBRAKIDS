@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categoria Edição</div>

                <div class="card-body">                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                <section>
                    
                <form action="{{route('category.putedit',$category->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Nome da Categoria</label>
                        <div class="col-10">
                        <input class="form-control" type="text" value="{{$category->name}}" name="Nome">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Imagem</label>
                        <div class="col-10">
                        <input id="fileUpload" type="file" name="Imagem" accept=".jpg,.png"><br />                        
                        </div>
                    </div>

                    <div class="form-group row"><div class="col-10">
                        <input type="submit" value="Salvar" class="btn btn-success">
                        <a href="{{route('category.getlist')}}" class="btn btn-primary">Voltar</a>
                    </div></div>

                @csrf
                </form>

                </section>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection