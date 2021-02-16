@extends('admin.master')

@section('title','Agregar Curso')

@section('breadcrumb')<!--seccion adjuntar item-->
<li class="breadcrumb-item">
    <a href="{{url('/admin/cursos')}}">
        <i class="fas fa-chalkboard"></i>Cursos
    </a>
</li>
<li class="breadcrumb-item">
    <a href="{{url('/admin/cursos/add')}}">
        <i class="fas fa-plus-circle"></i>Agregar Cursos
    </a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-plus-circle"></i>Agregar Cursos</h2>
        </div>
            <div class="inside">
                {!!Form::open(['url'=>'/admin/cursos/add'])!!}
                <div class="row">
                    <div class="col-md-4">
                        <label for="name">Nombre del curso:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-file-signature"></i>
                            </span>
                            {!!Form::text('name',null,['class'=>'form-control'])!!}
                          </div>
                            
                    </div>
                    <div class="col-md-4">
                        <label for="name">Categoría:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-book"></i>
                            </span>
                            {!!Form::text('name',null,['class'=>'form-control'])!!}
                          </div>
                            <!--CONTENIDO Y DESCRIPCION -->
                    </div>
                    <div class="col-md-4">
                        <label for="title">Imagen:</label>
                            <div class="custom-file">
                                <label for="formFileSm" class="form-label"></label>
                                {!!Form::file('img',['class'=>'form-label','id'=>'formFileSm'])!!}
                            </div>
                            <!--CONTENIDO Y DESCRIPCION -->
                    </div>
                </div>

                <div class="row mtop16">
                    <div class="col-md-3">
                        <label for="price">Precio:</label>
                        {!!Form::number('price',null,['class'=>'form-control','min'=>'0.00','step'=>'any'])!!}
                    </div>
                </div>

                <div class="row mtop16">
                    <div class="col-md-12">
                        <label for="content">Descripción</label>
                        {!!Form::textarea('content',null,['class'=>'form-control'])!!}
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection