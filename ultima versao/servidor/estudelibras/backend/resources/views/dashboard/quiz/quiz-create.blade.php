@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quiz</div>

                <div class="card-body">                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                <section>
                    
                <form action="{{route('quiz.postcreate')}}" method="post" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Vídeo da pergunta</label>
                        <div class="col-10">
                        <input id="fileUpload" type="file" name="Video" accept=".mp4"><br />                        
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Imagem da Primeira Resposta</label>
                        <div class="col-10">
                        <input id="fileUpload" type="file" name="Primeira_Imagem" accept=".jpg,.png"><br />                        
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Imagem da Segunda Resposta</label>
                        <div class="col-10">
                        <input id="fileUpload" type="file" name="Segunda_Imagem" accept=".jpg,.png"><br />                        
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Imagem da Terceira Resposta</label>
                        <div class="col-10">
                        <input id="fileUpload" type="file" name="Terceira_Imagem" accept=".jpg,.png"><br />                        
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Imagem da Resposta Correta</label>
                        <div class="col-10">
                        <select name="Imagem_Correta">
                            <option value="1">Primeira Imagem</option>
                            <option value="2">Segunda Imagem</option>
                            <option value="3">Terceira Imagem</option>
                        </select>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Categoria do Quiz</label>
                        <div class="col-10">
                        <select name="Categoria">
                            @isset($category)
                            @foreach($category as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            @endisset
                        </select>
                        </div>
                    </div>

                    

                    <div class="form-group row"><div class="col-10">
                        <input type="submit" value="Salvar" class="btn btn-success">
                        <a href="{{route('home')}}" class="btn btn-primary">Voltar</a>
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