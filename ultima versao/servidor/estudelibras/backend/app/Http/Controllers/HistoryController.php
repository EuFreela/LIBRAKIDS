<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HistoryModel;
use DB;

class HistoryController extends Controller
{
    public function getView()
    {
        return view('dashboard.history.history-view')
        ->with([
            'history' =>HistoryModel::all()
        ]);
    }

    public function Delete()
    {
        //all()->delete()
        if(HistoryModel::truncate())
            return redirect()->route('home')
                ->with('success','Histórico apagado com sucesso!');
    
        return redirect()->back()
            ->with('error','Não foi possível apagar o histórico');
    }
}
