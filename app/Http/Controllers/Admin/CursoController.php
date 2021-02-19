<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Categoria;
use App\Http\Models\Curso;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
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

    public function postCursoAdd(Request $request){
        $rules=[
            'name'=>'required',
            //'img'=>'required|image',
            'price'=>'required',
            'content'=>'required'
        ];

        $messages=[
            'name.required'=>'El nombre del curso es requerido',
            'img.required'=>'Seleccione una imagen por favor',
            //'img.image'=>'No es una imagen',
            'price.required'=>'Ingrese el precio del producto',
            'content.required'=>'Ingrese una descripcion producto'
        ];

        $this->validate($request,$rules,$messages);

        $path='/'.date('Y-m-d');//2021-01-01
        $fileExt=trim($request->file('img')->getClientOriginalExtension());
        
        $upload_path=Config::get('filessystems.disk.uploads.root');

        $name= Str::slug(str_replace($fileExt,'',$request->file('img')->getClientOriginalName()));
        $filename=rand(1,999).'-'.$name.'.'.$fileExt;


        $curso= new Curso;

        $curso->status='0';
        $curso->name=e($request->input('name'));
        $curso->slug=Str::slug($request->input('slug'));
        $curso->categoria_id= $request->input('categorias');
        $curso->image="$filename";
        $curso->price=$request->input('price');
        $curso->in_discount=$request->input('indiscount');
        $curso->discount=$request->input('discount');        
        $curso->contenido=e($request->input('content'));
        
        $curso->save();

        if($curso->save()){
            if($request->hasFile('img')){
                $fl=$request->img->storeAs($path,$filename,'uploads');
            }
            //return $fileExt;
            return redirect('/admin/cursos');
        }else{
            return back()->withInput();
        }

    }


}
