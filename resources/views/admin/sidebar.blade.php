<div class="sidebar shadow">
    <div class="section-top">
        <div class="logo">
            <img src="{{url('static/img/admin.jpg')}}" class="img-fluid">
        </div>
        <div class="user">
         <span class="subtitle">Hola:</span>   
         <div class="name">
             {{Auth::user()->name}} {{Auth::user()->lastname}}
             <a href="{{url('/logout')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Salir"><i class="fas fa-sign-out-alt"></i></a>
         </div>
        <div class="email">
            {{Auth::user()->email}}
        </div>
        </div>
    </div>
    <!--fin la section top-->
    <div class="main">
        <ul>
            <li>
                <a href="{{url('/admin')}}" style="text-decoration:none"><i class="fas fa-home"></i>Inicio</a>
            </li>
            <li>
                <a href="{{url('/admin/cursos')}}" style="text-decoration:none"><i class="fas fa-chalkboard"></i>Cursos</a>
            </li>
            <li>
                <a href="{{url('/admin/categorias/home')}}" style="text-decoration:none"><i class="far fa-folder-open"></i>Categorias</a>
            </li>
            <li>
                <a href="{{url('/admin/users')}}" style="text-decoration:none"><i class="fas fa-users"></i>Usuarios</a>
            </li>
        </ul>
    </div>
</div>