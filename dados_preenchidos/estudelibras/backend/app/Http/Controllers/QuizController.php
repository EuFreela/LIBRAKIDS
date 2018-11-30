<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryModel;
use App\QuizModel;
use App\AppClass\ClassDirectory;
use DB;

class QuizController extends Controller
{
    public function getCreate()
    {
        return view('dashboard.quiz.quiz-create')
        ->with([
            'category' => CategoryModel::all()
        ]);
    }

    public function getList()
    {
        return view('dashboard.quiz.quiz-list')
        ->with([
            'quiz' => QuizModel::all(),
        ]);
    }

    public function getEdit($id)
    {
        return view('dashboard.quiz.quiz-edit')
        ->with([
            'quiz' => QuizModel::where('id','=',$id)->first(),
            'category' => CategoryModel::all()
        ]);
    }

    public function postCreate(Request $request)
    {        
        $request->validate([
            'Video' => 'required',
            'Primeira_Imagem' => 'required|image|mimes:jpeg,png,gif',
            'Segunda_Imagem' => 'required|image|mimes:jpeg,png,gif',
            'Terceira_Imagem' => 'required|image|mimes:jpeg,png,gif',
            'Imagem_Correta' => 'required',
            'Categoria'=> 'required'
        ]);

        $arr = [];
        $arr = $this->correctImage(
                $request->Primeira_Imagem,
                $request->Segunda_Imagem,
                $request->Terceira_Imagem);

        $quiz = QuizModel::create([
            'ask' => $this->setNameVideoDirectory("quiz",$request->Video),
            'answer_1' => $arr[1],
            'answer_2' => $arr[2],
            'answer_3' => $arr[3],
            'correct_answer' => $arr[$request->Imagem_Correta],
            'category_id' => $request->Categoria
        ]);

        if($quiz)
            return redirect()->route('quiz.getlist')
                ->with('success','Quiz criado com sucesso');
    
        return redirect()->back()
            ->with('error','Não foi possível criar o Quiz');                                  
    }

    public function putEdit(Request $request, $id)
    {
        $request->validate([
            'Video' => '',
            'Primeira_Imagem' => 'image|mimes:jpeg,png,gif',
            'Segunda_Imagem' => 'image|mimes:jpeg,png,gif',
            'Terceira_Imagem' => 'image|mimes:jpeg,png,gif',
            'Imagem_Correta' => '',
            'Categoria'=> ''
        ]);

        $quiz = QuizModel::findOrFail($id);

        $quiz->category_id = $request->Categoria;
        
        if($request->Video)
            $quiz->video = $this->setNameVideoDirectory("quiz",$request->Video);

        if($request->Primeira_Imagem)
            $quiz->answer_1 = $this->setNameImageDirectory("quiz",$request->Primeira_Imagem);            
        if($request->Segunda_Imagem)
            $quiz->answer_2 = $this->setNameImageDirectory("quiz",$request->Segunda_Imagem);            
        if($request->Terceira_Imagem)
            $quiz->answer_3 = $this->setNameImageDirectory("quiz",$request->Terceira_Imagem);
            
        if($quiz->save()):
            $quiz = QuizModel::findOrFail($id);
            switch ($request->Imagem_Correta) {
                case 1:
                    $quiz->correct_answer = QuizModel::where('id','=',$id)->first()->answer_1;
                    break;                
                case 2:
                    $quiz->correct_answer = QuizModel::where('id','=',$id)->first()->answer_2;                
                    break;  
                case 3:
                    $quiz->correct_answer = QuizModel::where('id','=',$id)->first()->answer_3;                
                    break; 
            } 
            $quiz->save();

            return redirect()->route('quiz.getlist')
                ->with('success','Quiz atualizado com sucesso');        
        endif;

        return redirect()->back()
            ->with('error','Não foi possível atualizar o Quiz'); 
    }

    public function Delete($id)
    {
        if(QuizModel::where('id','=',$id)->delete())
        return redirect()->route('quiz.getlist')
            ->with('success','Quiz excluído com sucesso');

        return redirect()->back()
            ->with('error','Não foi possível excluir o Quiz');
    }


    /**PRIVATE */
    private function setNameImageDirectory($value,$imagem)
    {         
        $img = new ClassDirectory();
        $id = (QuizMOdel::count()>0) ? DB::select('select id from quiz where id = (select max(id) from quiz)')[0]->id : 0;         
        return $img->setNameImageDirectory_2v($id++,$value,$imagem);
    }
 
    private function setNameVideoDirectory($value,$archive)
    {         
        $img = new ClassDirectory();
        $id = (QuizMOdel::count()>0) ? DB::select('select id from quiz where id = (select max(id) from quiz)')[0]->id : 0;         
        return $img->setNameVideoDirectory_2v($id++,$value,$archive);
    }

    private function correctImage($img1,$img2,$img3)
    {        
        $arr = [];        
        $arr[1] = $this->setNameImageDirectory("quiz",$img1);
        $arr[2] = $this->setNameImageDirectory("quiz",$img2);
        $arr[3] = $this->setNameImageDirectory("quiz",$img3);
        return $arr;
    }
}                                          
