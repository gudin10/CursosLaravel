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
                
            </div>
        </div>
    </div>
</div>
@endsection