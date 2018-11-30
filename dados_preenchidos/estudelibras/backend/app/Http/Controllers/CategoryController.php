<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryModel;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use App\AppClass\ClassDirectory;

class CategoryController extends Controller
{
    public function getCreate()
    {
        return view('dashboard.category.category-create');
    }

    public function getList()
    {
        return view('dashboard.category.category-list')
        ->with([
            'category' => CategoryModel::all()
        ]);
    }

    public function getEdit($id)
    {
        return view('dashboard.category.category-edit')
        ->with([
            'category' => CategoryModel::where('id','=',$id)->first()
        ]);
    }

    public function postCreate(Request $request)
    {
        $request->validate([
            'Nome' => 'required',
            'Imagem' => 'required|image|mimes:jpeg,png,gif'
        ]);

        $category = CategoryModel::create([
            'name' => $request->Nome,
            'image' => $this->setNameImageDirectory("category",$request->Imagem)
        ]);

        if($category)
        return redirect()->route('category.getlist')
            ->with('success','Categoria criada com sucesso');
        
        return redirect()->back()
            ->with('error','Não foi possível criar a categoria');
    }


    public function putEdit(Request $request, $id)
    {
        $request->validate([
            'Nome' => 'required',
            'Imagem' => 'required|image|mimes:jpeg,png,gif'
        ]);

        $category = CategoryModel::where('id','=',$id)
        ->update([
            'name' => $request->Nome,
            'image' => $this->setNameImageDirectory("category",$request->Imagem)
        ]);

        if($category)
        return redirect()->route('category.getlist')
            ->with('success','Categoria editada com sucesso');
        
        return redirect()->back()
            ->with('error','Não foi possível editar a categoria');
    }

    public function Delete($id)
    {
        if(CategoryModel::where('id','=',$id)->delete())
            return redirect()->route('category.getlist')
                ->with('success','Categoria deletada com sucesso');
    
        return redirect()->back()
            ->with('error','Não foi possível deletar a categoria');
    }

    /**PRIVATE */
    private function setNameImageDirectory($value,$imagem)
    {
        $img = new ClassDirectory();
        return $img->setNameImageDirectory($value,$imagem);
    }
   

}
