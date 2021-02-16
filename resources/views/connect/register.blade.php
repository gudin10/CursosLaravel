@extends('connect.master')

@section('title','Registrarse')
    
@section('content')
@if (!$errors->isEmpty())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>  
    @endforeach
@endif
<div class="box box_register shadow">
    <div class="inside">

        {!!Form::open(['url'=>'/register'])!!}
        <div class="header">
            <a href="{{url('/')}}">
                <img src="{{url('/static/img/userrg.png')}}">
            </a>   
        </div>
        <label for="name">Nombre:</label>
        <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                    <i class="far fa-user"></i>
                </span>
            {!!Form::text('name',null,['class'=>'form-control','required' ])!!}
        </div>

        <label for="lastname" class="mtop16">Apellido:</label>
        <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                    <i class="far fa-smile"></i>
                </span>
            {!!Form::text('lastname',null,['class'=>'form-control','required' ])!!}
        </div>

        <label for="email" class="mtop16">Correo Electróinco</label>
        <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                    <i class="far fa-envelope"></i>
                </span>
            
            {!!Form::email('email',null,['class'=>'form-control','required' ])!!}
        </div>

        <label for="password" class="mtop16">Contraseña</label>
        <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                    <i class="fas fa-key"></i>
                </span>
            {!!Form::password('password',['class'=>'form-control','required' ])!!}
        </div>

        <label for="cpassword" class="mtop16">Confirmar Contraseña</label>
        <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                    <i class="far fa-eye-slash"></i>
                </span>
            {!!Form::password('cpassword',['class'=>'form-control','required' ])!!}
        </div>

        
        {!!Form::submit('Registrarse',['class'=>'btn btn-success mtop16'])!!}

        
        {!!Form::close()!!}

        
    </div>
@section('script')
<script>
    
</script>
@endsection
    
</div>
@stop