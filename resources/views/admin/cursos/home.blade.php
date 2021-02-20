@extends('admin.master')

@section('title','Cursos')

@section('breadcrumb')<!--seccion adjuntar item-->
<li class="breadcrumb-item">
    <a href="{{url('/admin/cursos')}}">
        <i class="fas fa-chalkboard"></i>Cursos
    </a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-chalkboard"></i>Cursos</h2>
        </div>
        <div class="inside">
            <div class="btns">
                <a href="{{url('/admin/cursos/add')}}" class="btn btn-primary" style="text-decoration: none">
                    <i class="fas fa-plus-circle"></i>Agregar Curso
                </a>
            </div>
            <table class="table table-striped mtop16">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td></td>
                        <td>NOMBRE DEL CURSO</td>
                        <td>CATEGORIA</td>
                        <td>PRECIO</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cursos as $cur)
                        <tr>
                            <td>{{$cur->id}}</td>
                            <td></td>
                            <td>{{$cur->name}}</td>
                            <td>{{$cur->cat->name}}</td>
                            <td>{{$cur->price}}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection