<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Categoria;
use App\Http\Models\Curso;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Config;
use Faker\Provider\Image;


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
        $cursos=Curso::with(['cat'])->orderBy('id','Desc')->paginate(25);
        $data=['cursos'=>$cursos];
        
        return view('admin.cursos.home',$data);

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
        
        $upload_path=Config::get('filessystems.disks.uploads.root');

        $name= Str::slug(str_replace($fileExt,'',$request->file('img')->getClientOriginalName()));
        $filename=rand(1,999).'-'.$name.'.'.$fileExt;
        $file_file=$upload_path.'/'.$path.'/'.$filename;

        $curso= new Curso;

        $curso->status='0';
        $curso->name=e($request->input('name'));
        $curso->slug=Str::slug($request->input('slug'));
        $curso->categoria_id= $request->input('categorias');
        $curso->file_path= date('Y-m-d');//composer require intervetion/image
        $curso->image= $filename; //en comillas "filename"
        $curso->price=$request->input('price');
        $curso->in_discount=$request->input('indiscount');
        $curso->discount=$request->input('discount');        
        $curso->contenido=e($request->input('content'));
        
        $curso->save();

        if($curso->save()){
            
                
                $fl=$request->img->storeAs($path,$filename,'uploads');
                $img=$filename;
                

                //$img->save($upload_path.'/'.$path.'/t_'.$filename);
            
            //return $fileExt;
            return redirect('/admin/cursos');
        }else{
            return back()->withInput();
        }
        /*
        if($curso->save()){
            if($request->hash_file('img')){
                
                $fl=$request->img->storeAs($path,$filename,'uploads');
                $img=Image::make($filename);
                $img->fit(256,256,function($constrain){
                    $constrain->upsize();
                });

                $img->save($upload_path.'/'.$path.'/t_'.$filename);
            }
            //return $fileExt;
            return redirect('/admin/cursos');
        }else{
            return back()->withInput();
        }*/ 

    }

    public function getCursoEdit($id){
        $c=Curso::find($id);
        $cat= Categoria::where('modulo','0')->pluck('name','id');
        $data = ['cat'=>$cat,'c'=>$c];
        return view('admin.cursos.edit',$data);
    }

    public function postCursoEdit(Request $request, $id){

        $rules=[
            'name'=>'required',
            //'img'=>'required|image',
            'price'=>'required',
            //'content'=>'required'
        ];

        $messages=[
            'name.required'=>'El nombre del curso es requerido',
            //'img.image'=>'No es una imagen',
            'price.required'=>'Ingrese el precio del producto',
            //'content.required'=>'Ingrese una descripcion producto'
        ];

        $this->validate($request,$rules,$messages);

       
        

        $curso= Curso::find($id);

        $curso->status='0';
        $curso->name=e($request->input('name'));
        $curso->slug=Str::slug($request->input('slug'));
        $curso->categoria_id= $request->input('categorias');
       

        if($request->hasFile('img')){
            $path='/'.date('Y-m-d');//2021-01-01
            $fileExt=trim($request->file('img')->getClientOriginalExtension());
            
            $upload_path=Config::get('filessystems.disks.uploads.root');
    
            $name= Str::slug(str_replace($fileExt,'',$request->file('img')->getClientOriginalName()));
            $filename=rand(1,999).'-'.$name.'.'.$fileExt;
            $file_file=$upload_path.'/'.$path.'/'.$filename;

            $curso->file_path= date('Y-m-d');//composer require intervetion/image
            $curso->image= $filename; //en comillas "filename"
        }

        $curso->price=$request->input('price');
        $curso->in_discount=$request->input('indiscount');
        $curso->discount=$request->input('discount');        
        $curso->contenido=$request->input('content');
        
        $curso->save();
        
        if($curso->save()){
            
                
                $fl=$request->img->storeAs($path,$filename,'uploads');
                $img=$filename;
                

                //$img->save($upload_path.'/'.$path.'/t_'.$filename);
            
            //return $fileExt;
            return redirect('/admin/cursos');
        }else{
            return back()->withInput();
        }
    }

    public function getCursoDelete($id){
        
        $cat=Curso::find($id);
        $cat->delete();

        if($cat->delete()){
            return redirect('/admin/cursos');
        }
    }


}
