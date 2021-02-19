@extends('admin.master')

@section('title','Categorias')

@section('breadcrumb')<!--seccion adjuntar item-->
<li class="breadcrumb-item">
    <a href="{{url('/admin/categorias')}}">
        <i class="far fa-folder-open"></i>Categorias
    </a>
</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!--Panel-->
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title"><i class="fas fa-plus-circle"></i>Agregar Categoria</h2>
                    </div>
                        <div class="inside">
                            {!!Form::open(['url'=>'/admin/categorias/add'])!!}
                            
                            <label for="name">Nombre Categoria:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="far fa-folder-open"></i>
                                </span>
                                {!!Form::text('name',null,['class'=>'form-control'])!!}
                            </div>

                            <label for="modulo" class="mtop16">Módulo:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fab fa-buromobelexperte"></i>
                                </span>
                                {!!Form::select('modulo',getModulosArray(),0,['class'=>'form-select'])!!}
                            </div>
                            <label for="icono" class="mtop16">Seleccionar ícono:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-shapes"></i>
                                </span>
                                {!!Form::text('icono',null,['class'=>'form-control'])!!}
                            </div>
                            {!!Form::submit('Guardar',['class'=>'btn btn-success'])!!}
                            
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <!--Panel-->
                    <div class="panel shadow">
                        <div class="header">
                            <h2 class="title"><i class="far fa-folder-open"></i>Categorias</h2>
                        </div>
                            <div class="inside">
                                <nav class="nav">
                                    @foreach (getModulosArray() as $n=>$key)
                                        <a href="{{url('/admin/categorias/'.$n)}}" class="nav-link"><i class="fas fa-graduation-cap"></i>{{$key}}</a>
                                    @endforeach
                                </nav>
                               <table class="table">
                                   <thead>
                                       <tr>
                                           <td width="32"></td>
                                           <td>Nombre</td>
                                           <td width="100"></td>
                                       </tr>
                                   </thead>
                                   <tbody>
                                        @foreach ($cat as $ca)
                                            <tr>
                                                <td>{!!htmlspecialchars_decode($ca->icono)!!}</td>
                                                <td>{{$ca->name}}</td>
                                                <td>
                                                    <div class="opts">
                                                        <a href="{{url('/admin/categorias/'.$ca->id.'/edit')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                                            <i class="fas fa-edit"></i></a>
                                                        <a href="{{url('/admin/categorias/'.$ca->id.'/delete')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                                            <i class="fas fa-trash-alt"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                   </tbody>
                               </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
        
    </div>
@endsection
