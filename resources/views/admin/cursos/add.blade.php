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
                    <div class="col-md-5">
                        <label for="title">Nombre del curso:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-file-signature"></i>
                            </span>
                            {!!Form::text('name',null,['class'=>'form-control'])!!}
                          </div>
                            
                    </div>
                    <div class="col-md-5">
                        <label for="title">Categoría:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-book"></i>
                            </span>
                            {!!Form::text('name',null,['class'=>'form-control'])!!}
                          </div>
                            <!--CONTENIDO Y DESCRIPCION -->
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection