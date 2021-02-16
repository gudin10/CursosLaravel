@extends('admin.master')

@section('title','Usuarios')

@section('breadcrumb')<!--seccion adjuntar item-->
<li class="breadcrumb-item">
    <a href="{{url('/admin/users')}}">
        <i class="fas fa-users"></i>Usuarios
    </a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-users"></i>Usuarios</h2>
        </div>
        <div class="inside">
            <table class="table">
                <thead>
                    <tr class="table-primary">
                        <td>ID</td>
                        <td>NOMBRE</td>
                        <td>PELLIDO</td>
                        <td>EMAIL</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <div class="opts">

                                <a href="{{url('/admin/user/'.$user->id.'/edit')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                    <i class="fas fa-edit"></i></a>
                                <a href="{{url('/admin/user/'.$user->id.'/delete')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
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
@endsection