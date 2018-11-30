@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quiz Edição</div>

                <div class="card-body">                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                <section>
                    
                <form action="{{route('quiz.putedit',$quiz->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Vídeo da pergunta</label>
                        <div class="col-10">
                        <input id="fileUpload" type="file" name="Video" accept=".mp4"><br />                        
                        <br>
                        <label for="">Video Gravado:</label>
                        @if(isset($quiz->ask))
                            <video width="150" height="100" controls>
                                <source src="{{'/estudelibras/videos'.$quiz->ask}}" type="video/mp4">
                                Seu navegador não suporta html5
                            </video>
                        @else
                            Não há vídeo
                        @endif
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Imagem da Primeira Resposta</label>
                        <div class="col-10">
                        <input id="fileUpload" type="file" name="Primeira_Imagem" accept=".jpg,.png"><br />                        
                        <br>
                        <label for="">Imagem Gravada:</label>
                        @if(isset($quiz->answer_1))
                            <img src="{{'/estudelibras/images'.$quiz->answer_1}}" width="150" height="100">
                        @else
                            Não há imagem
                        @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Imagem da Segunda Resposta</label>
                        <div class="col-10">
                        <input id="fileUpload" type="file" name="Segunda_Imagem" accept=".jpg,.png"><br />                        
                        <br>
                        <label for="">Imagem Gravada:</label>
                        @if(isset($quiz->answer_2))
                            <img src="{{'/estudelibras/images'.$quiz->answer_2}}" width="150" height="100">
                        @else
                            Não há imagem
                        @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Imagem da Terceira Resposta</label>
                        <div class="col-10">
                        <input id="fileUpload" type="file" name="Terceira_Imagem" accept=".jpg,.png"><br />                        
                        <br>
                        <label for="">Imagem Gravada:</label>
                        @if(isset($quiz->answer_3))
                            <img src="{{'/estudelibras/images'.$quiz->answer_3}}" width="150" height="100">
                        @else
                            Não há imagem
                        @endif
                        </div>
                    </div>

                    <hr>
                    <?php
                        $r;
                        if($quiz->answer_1==$quiz->correct_answer)
                            $r = 'Primeira Imagem';
                        if($quiz->answer_2==$quiz->correct_answer)
                            $r = 'Segunda Imagem';
                        if($quiz->answer_3==$quiz->correct_answer)
                            $r = 'Terceira Imagem';
                    ?>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Imagem da Resposta Correta</label>
                        <div class="col-10">                        
                        <p>Rsposta atual: <b>{{$r}}</b></p>
                        <SELECT name="Imagem_Correta">
                            <option value="1">Primeira Imagem</option>
                            <option value="2">Segunda Imagem</option>
                            <option value="3">Terceira Imagem</option>                       
                        </SELECT>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Categoria do Quiz</label>
                        <div class="col-10">
                        <select name="Categoria">
                            @isset($category)
                            @foreach($category as $category)
                                @if($category->id == $quiz->category_id)
                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                @else
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                            @endforeach
                            @endisset
                        </select>
                        </div>
                    </div>

                    

                    <div class="form-group row"><div class="col-10">
                        <input type="submit" value="Salvar" class="btn btn-success">
                        <a href="{{route('quiz.getlist')}}" class="btn btn-primary">Voltar</a>
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