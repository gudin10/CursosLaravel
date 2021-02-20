<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sistema-@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <!-- STYLUS ETIQUETAS ESTETICAS DE css.styl-->
        <link rel="stylesheet" href="{{ url('static/css/connect.css?v='.time() ) }}">
         <!-- Iconos y fonts-->
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        

        
        <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}" defer></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!--Stylus
            https://stylus-lang.com/
            cd xamp\htdocs\laravel\Sistema\puclib\static\css\
            stylus connect.styl -c -w -Correr 
            //Laravel Collective
            https://laravelcollective.com/docs/5.4/html
        -->
    </head>
    <body>
        
        @section('content')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        @show
        @section('script')
            
        @endsection
    </body>
</html>