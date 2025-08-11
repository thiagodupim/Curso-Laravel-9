<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>   
<body>
    <!-- Dropdown Structure -->
    <ul id='dropdown1' class='dropdown-content'>
        @foreach ($categoriasMenu as $categoriaM)
            <li><a href="{{ route('site.categoria', $categoriaM->id) }}">{{ $categoriaM->nome }}</a></li>
        @endforeach
    </ul>

    <!-- Dropdown Structure 2 -->
    <ul id='dropdown2' class='dropdown-content'>
        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    </ul>

    <nav class="red">
        <div class="nav-wrapper container">
        <a href="#" class="brand-logo center">Cursolaravel</a>
        <ul id="nav-mobile" class="left">
            <li><a href="{{ route('site.index') }}">Home</a></li>
            <li><a href="" class="dropdown-trigger" data-target='dropdown1'>Categorias <i class="material-icons right">expand_more</i></a></li>
            <li><a href="{{ route('site.carrinho') }}">Carrinho <span class="new badge blue" data-badge-caption=""> {{ \Cart::getContent()->count() }} </span></a></li>
        </ul>
        <ul id="nav-mobile" class="right">
            <li><a href="" class="dropdown-trigger" data-target='dropdown2'>Olá {{ auth()->user()->firstName }}<i class="material-icons right">expand_more</i></a></li>
        </ul>
        </div>
    </nav>

    @yield('conteudo')

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>    
    
    <script> 
        var elemDrop = document.querySelectorAll('.dropdown-trigger');
        var instanceDrop = M.Dropdown.init(elemDrop, {
            coverTrigger: false,
            constrainWidth: false
        });
    </script>
</body>
</html>