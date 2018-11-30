<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CardModel;
use App\CategoryModel;
use App\AppClass\ClassDirectory;

class CardController extends Controller
{
    public function getCreate()
    {
        return view('dashboard.cards.cards-create')
        ->with([
            'category' => CategoryModel::all()
        ]);
    }
    
    public function getList()
    {
        return view('dashboard.cards.cards-list')
        ->with([
            'cards' => CardModel::all()
        ]);
    }

    public function getEdit($id)
    {
        return view('dashboard.cards.cards-edit')
        ->with([
            'card' => CardModel::findOrFail($id),
            'category' => CategoryModel::all()
        ]);
    }

    public function postCreate(Request $request)
    {
        $request->validate([            
            'Nome' => 'required',
            'Categoria' => 'required',
            'Video' => 'required',
            'Imagem' => 'required|image|mimes:jpeg,png,gif'            
        ]);

        $card = CardModel::create([
            'name' => $request->Nome,
            'category_id' => $request->Categoria,
            'video' => $this->setNameVideoDirectory("card",$request->Video),
            'image' => $this->setNameImageDirectory("card",$request->Imagem)
        ]);

        if($card)
            return redirect()->route('card.getlist')
            ->with('success',"Cartão criado com sucesso!");

        return redirect()->back()
            ->with('error','Não foi possível criar o cartão!');
    }

    public function putEdit(Request $request, $id)
    {
        $request->validate([            
            'Nome' => 'required',
            'Categoria' => 'required',
            'Video' => '',
            'Imagem' => 'image|mimes:jpeg,png,gif'            
        ]);

        $card = CardModel::findOrFail($id);

        $card->name = $request->Nome;
        $card->category_id = $request->Categoria;

        if($request->Video)
            $card->video = $this->setNameVideoDirectory("card",$request->Video);
        if($request->Imagem)
            $card->image = $this->setNameImageDirectory("card",$request->Imagem);
     
        if($card->save())
            return redirect()->route('card.getlist')
            ->with('success',"Cartão editado com sucesso!");

        return redirect()->back()
            ->with('error','Não foi possível editar o cartão!');
    }

    public function Delete($id)
    {
        if(CardModel::where('id','=',$id)->delete())
        return redirect()->route('card.getlist')
            ->with('success','Cartão deletado com sucesso');

        return redirect()->back()
            ->with('error','Não foi possível deletar o cartão');
    }



    /**PRIVATE */
    private function setNameImageDirectory($value,$imagem)
    {
        $img = new ClassDirectory();
        return $img->setNameImageDirectory($value,$imagem);
    }

    private function setNameVideoDirectory($value,$archive)
    {
        $img = new ClassDirectory();
        return $img->setNameVideoDirectory($value,$archive);
    }
}
