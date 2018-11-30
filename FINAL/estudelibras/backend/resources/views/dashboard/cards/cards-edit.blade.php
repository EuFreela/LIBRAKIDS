@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cartões Edição</div>

                <div class="card-body">                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                <section>
                    
                <form action="{{route('card.putedit',$card->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Nome do cartão</label>
                        <div class="col-10">
                        <input class="form-control" type="text" value="{{$card->name}}" name="Nome">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Categoria</label>
                        <div class="col-10">
                        <select name="Categoria">
                            @isset($category)
                            @foreach($category as $category)
                                @if($category->id == $card->category_id)
                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                @else
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                            @endforeach
                            @endisset
                        </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Vídeo</label>
                        <div class="col-10">
                        <input id="fileUpload" type="file" name="Video" accept=".mp4"><br />                        
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Imagem que corresponde ao vídeo</label>
                        <div class="col-10">
                        <input id="fileUpload" type="file" name="Imagem" accept=".jpg,.png"><br />                        
                        </div>
                    </div>                    

                    <div class="form-group row"><div class="col-10">
                        <input type="submit" value="Salvar" class="btn btn-success">
                        <a href="{{route('card.getlist')}}" class="btn btn-primary">Voltar</a>
                    </div></div>

                @csrf
                </form>

                </section>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Imagem e vídeos atuais</div>

                            <div class="card-body">  

                                 <table>
                                    <tr>
                                        <td>
                                            <label for="">Vídeo</label><br>
                                            <video width="320" height="240" controls>
                                                <source src="{{'/estudelibras/videos'.$card->video}}" type="video/mp4">
                                                Seu navegador não suporta html5
                                            </video>
                                        </td>
                                        <th ROWSPAN=1000>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <td>
                                            <label for="">Imagem</label><br>
                                            @if(isset($card->name))
                                                <img src="{{'/estudelibras/images'.$card->image}}" width="150" height="100">
                                            @else
                                                Não há imagem
                                            @endif
                                        </td>
                                        
                                    </tr>
                                 </table>




                            </div>

                        </div>
                    </div>
                </div>


                </div>
            </div>
        </div>
    </div>
</div>

       
  
@endsection