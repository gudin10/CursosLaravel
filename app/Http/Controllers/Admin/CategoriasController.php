<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Categoria;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;




use Illuminate\Support\Facades\Auth;

class CategoriasController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function getHome($modulo){
        $cat = Categoria::where('modulo',$modulo)->OrderBy('name','asc')->get();
        $data= ['cat'=>$cat];
        return view('admin.categorias.home',$data);
    }

    public function postCategoriaAdd(Request $request){
        $rules= [
            'name'=>'required',
            'icono'=>'required'
        ];

        $messages= [
            'name.required'=>'Debe poner nombre a la categoria',
            'icono.required'=>'Debe poner icono para la categoria'
        ];

        $this->validate($request,$rules,$messages);

        $cat= new Categoria;
        $cat->name=$request->input('name');
        $cat->modulo=$request->input('modulo');
        $cat->slug = Str::slug('slug');
        $cat->icono= e($request->input('icono'));

        //$exito='Se guardó con éxito';

        $cat->save();
        if($cat->save()){
            return redirect('/admin/categorias/home');
        }

        
    }

    public function getCategoriaEdit($id){
        $cat = Categoria::find($id);
        $data = ['cat'=>$cat];
        return view('admin.categorias.edit',$data);
    }

    public function postCategoriaEdit(Request $request, $id){
        $rules= [
            'name'=>'required',
            'icono'=>'required'
        ];

        $messages= [
            'name.required'=>'Debe poner nombre a la categoria',
            'icono.required'=>'Debe poner icono para la categoria'
        ];

        $this->validate($request,$rules,$messages);

        $cat=Categoria::find($id);
        $cat->name=$request->input('name');
        $cat->modulo=$request->input('modulo');
        //$cat->slug = Str::slug('slug');
        $cat->icono= e($request->input('icono'));

        //$exito='Se guardó con éxito';
        $exito= '<div class="alert alert-success" role="alert">
        A simple success alert—check it out!
      </div>';
        $cat->save();
        if($cat->save()){
            return redirect('/admin/categorias/home');
        }
    }

    public function getCategoriaDelete($id){
        $cat=Categoria::find($id);
        $cat->delete();

        if($cat->delete()){
            return redirect('/admin/categorias/home');
        }
    }
}
