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
                            <td width="45px">{{$cur->id}}</td>
                            <td width="80px">
                                <a data-fancybox="gallery" href="{{url('/uploads/'.$cur->file_path.'/'.$cur->image)}}">
                                    <img src="{{url('/uploads/'.$cur->file_path.'/'.$cur->image)}}" alt="" width="90px" height="70px">
                                </a>
                            </td>
                            <td>{{$cur->name}}</td>
                            <td>{{$cur->cat->name}}</td>
                            <td>{{$cur->price}}</td>
                            <td>
                                <div class="opts">
                                    <a href="{{url('/admin/cursos/'.$cur->id.'/edit')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                        <i class="fas fa-edit"></i></a>
                                    <a onclick="del(event,'{{$cur->id}}','{{$cur->name}}')" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">

                                        <i class="fas fa-trash-alt"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="6">{!!$cursos->render()!!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function del(event,id,name) {
        event.preventDefault();
        //confirm('Esta seguro de eliminar:'+name);
        if(confirm('Esta seguro de eliminar el curso: '+name)){
            window.location.href="/admin/cursos/"+id+"/delete";
        }

    }
</script>
@endsection
