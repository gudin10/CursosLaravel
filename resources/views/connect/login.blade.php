@extends('connect.master')

@section('title','login')
    
@section('content')

<div class="box box_login shadow">
    <div class="inside">
        <div class="header">
            <a href="{{url('/')}}">
                <img src="{{url('/static/img/udenar.jpg')}}">
            </a>   
        </div>
        {!!Form::open(['url'=>'/login'])!!}
        <label for="email">Correo electrónico</label>
        <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                    <i class="far fa-envelope"></i>
                </span>
            {!!Form::email('email',null,['class'=>'form-control' ])!!}
        </div>
        <label for="email" class="mtop16">Contraseña</label>
        <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                    <i class="fas fa-key"></i>
                </span>
            {!!Form::password('password',['class'=>'form-control' ])!!}
        </div>
        {!!Form::submit('Ingresar',['class'=>'btn btn-success mtop16'])!!}
        {!!Form::close()!!}

        @if (Session::has('message'))
            <div class="container">
                <div class="mtop16 alert alert-{{Session::get('typealert')}}" style="display: none;">
                    {{Session::get('message')}}
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                    <script>
                        $('.alert').slideDown();
                        setTimeout(function(){$('.alert').slideUp();};1000);
                    </script>

                </div>
            </div>
            
        @endif

        <div class="footer mtop16">
            <a href="{{url('/register')}}">Registrarse</a>
            <a href="{{url('/recover')}}">Recuperar contraseña</a>
        </div>
    </div>
    
</div>
@stop