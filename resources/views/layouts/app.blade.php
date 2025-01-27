<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <title>CornellNotes</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://bootswatch.com/4/litera/bootstrap.min.css">
</head>
<body class="min-vh-100">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand mr-4 font-weight-bold">
                    CornellNotes
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        @guest
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Вход</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Регистрация</a>
                        </li>
                        @else
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{ route('note.create') }}" class="nav-link">
                                <i class="fas fa-plus"></i>
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{ route('user', ['id' => Auth::user()->id]) }}" class="nav-link">
                                <i class="far fa-user"></i>
                            </a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container mt-3 mb-4">
        @yield('content')
    </div>
    <footer class="bg-primary">
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <div class="footer-copyright text-center py-3">
                        <span class="text-white">© 2019 Copyright:</span>
                        <a href="{{ url('/') }}" class="link_white">Cornell Notes</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/scripts.js')}}"></script>
    {{-- Flash --}}
    <script>
        $('#flash-overlay-modal').modal();
    </script>
</body>
</html>
