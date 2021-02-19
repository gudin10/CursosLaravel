<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Categoria;

class CursoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function getHome(){
        return view('admin.cursos.home');
    }

    public function getCursoAdd(){
        $cat= Categoria::where('modulo','0')->pluck('name','id');
        $data = ['cat'=>$cat];
        return view('admin.cursos.add',$data);
    }


}
