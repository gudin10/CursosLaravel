@extends('admin.master')

@section('title','Editar Cursos')

@section('breadcrumb')<!--seccion adjuntar item-->
<li class="breadcrumb-item">
    <a href="{{url('/admin/cursos')}}">
        <i class="fas fa-chalkboard"></i>Cursos
    </a>
</li>

@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="far fa-edit"></i>Editar Cursos</h2>
                </div>
                    <div class="inside">
                        {!!Form::open(['url'=>'/admin/cursos/add','files'=>true])!!}
                        <div class="row">
                            <div class="col-md-4">
                                <label for="name">Nombre del curso:</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-file-signature"></i>
                                    </span>
                                    {!!Form::text('name',$c->name,['class'=>'form-control'])!!}
                                  </div>
                                    
                            </div>
                            <div class="col-md-3">
                                <label for="categorias">Categoría:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fab fa-buromobelexperte"></i>
                                        </span>
                                        {!!Form::select('categorias',$cat,$c->categoria_id,['class'=>'form-select'])!!}
                                    </div>
                                </div>
                                    <!--CONTENIDO Y DESCRIPCION -->
                            </div>
                            <div class="col-md-3">
                                <label for="img">Imagen:</label>
                                    <div class="custom-file">
                                        <label for="formFileSm" class="form-label"></label>
                                        {!!Form::file('img',['class'=>'form-label','id'=>'formFileSm', 'accept'=>'image/*'])!!}
                                    </div>
                                    <!--CONTENIDO Y DESCRIPCION -->
                            </div>
                        </div>
        
                        <div class="row mtop16">
                            <div class="col-md-4">
                                <label for="price">Precio:</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-dollar-sign"></i>
                                    </span>
                                    {!!Form::number('price',$c->price,['class'=>'form-control','min'=>'0.00','step'=>'any'])!!}
        
                                  </div> 
                            </div>
        
                            <div class="col-md-3">
                                <label for="indiscount">Habilitar Descuento:</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-comments-dollar"></i>
                                    </span>
                                    {!!Form::select('indiscount',['0'=>'No','1'=>'Si'],$c->in_discount,['class'=>'form-select'])!!}
        
                                  </div>
                            </div>
        
                            <div class="col-md-3">
                                <label for="discount">Descuento:</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-percent"></i>
                                    </span>
                                    {!!Form::number('discount',$c->discount,['class'=>'form-control','min'=>'0.00','step'=>'any'])!!}
        
                                  </div>
                            </div>
        
                        </div>
        
                        <div class="row mtop16">
                            <div class="col-md-12">
                                <label for="content">Descripción</label>
                                {!!Form::textarea('content',$c->contenido,['class'=>'form-control','id'=>'editor1'])!!}
                                <script>
                                    CKEDITOR.replace( 'editor1' );
                                </script>
                            </div>
                        </div>
                        
                        <div class="row mtop16">
                            <div class="col-md-12">
                                    {!!Form::submit('Guardar',['class'=>'btn btn-success'])!!}
                            </div>
                        </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            
            
            </div>
            <div class="col-md-3">
                <div class="header">
                    <h2 class="title" style="text-align: center"><i class="far fa-image"></i>Portada</h2>
                    <div class="inside">
                        <img src="{{url('/uploads/'.$c->file_path.'/'.$c->image)}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    
</div>
@endsection