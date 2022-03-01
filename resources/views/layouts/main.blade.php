<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonte do Google -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- CSS da aplicação -->
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body class="antialiased">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                    <img src="/img/durian.png" alt="Events">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Inicio</a>
                    </li>
                 
                    <li class="nav-item">
                    
                    </li>
                    @auth
                    <li class="nav-item">
                        <a href="/registers/create" class="nav-link">Cadastrar pessoa</a>
                    </li>
                    <!--li class="nav-item">
                        <a href="/editar" class="nav-link">Editar</a>
                    </li-->
                    <form action="/logout" method="POST">
                        @csrf
                        <a href="/logout" class="nav-link"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        Sair</a>
                    </form>
                    @endauth
                    @guest
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Cadastrar</a>
                    </li>
                    @endguest
                    
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-fluid">
        <div class="row">
            @if(session('msg'))
                <p class="msg">{{ session('msg') }}</p>
            @endif
            @yield('content')
        </div>
        </div>   
    </main>
    <footer>
        <p> Cadastro &copy; 2022 </p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        function displayFormChild(event){
            if(event == 'yes') {
                document.getElementsByClassName('input_child')[0].style.display = "block";
                setRequired(true);
            }else {
                document.getElementsByClassName('input_child')[0].style.display = "none";
                setRequired(false);
            }
        }
        function setRequired(val){
            input = document.getElementsByClassName("input_child")[0].getElementsByTagName('input');
            for(i = 0; i < input.length; i++){
                input[i].required = val;
            }
        }       
    </script>
</body>

</html>