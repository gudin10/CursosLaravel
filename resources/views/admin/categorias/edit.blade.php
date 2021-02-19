@extends('admin.master')

@section('title','Categorias')

@section('breadcrumb')<!--seccion adjuntar item-->
<li class="breadcrumb-item">
    <a href="{{url('/admin/categorias')}}">
        <i class="far fa-edit"></i>Editar Categoria
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
                        <h2 class="title"><i class="far fa-edit"></i>Editar Categoria</h2>
                    </div>
                        <div class="inside">
                            {!!Form::open(['url'=>'/admin/categorias/'.$cat->id.'/edit'])!!}
                            
                            <label for="name">Nombre Categoria:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="far fa-folder-open"></i>
                                </span>
                                {!!Form::text('name',$cat->name,['class'=>'form-control'])!!}
                            </div>

                            <label for="modulo" class="mtop16">Módulo:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fab fa-buromobelexperte"></i>
                                </span>
                                {!!Form::select('modulo',getModulosArray(),$cat->modulo,['class'=>'form-select'])!!}
                            </div>
                            <label for="icono" class="mtop16">Seleccionar ícono:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-shapes"></i>
                                </span>
                                {!!Form::text('icono',$cat->icono,['class'=>'form-control'])!!}
                            </div>
                            {!!Form::submit('Guardar',['class'=>'btn btn-success'])!!}
                            
                            {!!Form::close()!!}
                            
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
        
    </div>
@endsection
