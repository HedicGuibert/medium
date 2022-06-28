<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <script src="{{ asset('theme/js/vendor.js') }}" defer></script>
    <script src="{{ asset('theme/js/app.js') }}" defer></script>
    <!-- Fonts -->
    <!-- Styles -->
    <link href="{{ asset('theme/css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <header class="header-sticky header-light bg-white headroom headroom--not-bottom headroom--pinned headroom--top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="../index.html">
                    <img class="navbar-logo navbar-logo-light" src="../assets/images/demo/logo/logo-light.svg"
                        alt="Logo">
                    <img class="navbar-logo navbar-logo-dark" src="../assets/images/demo/logo/logo-dark.svg"
                        alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="burger"><span></span></span></button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-center mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}" role="button">
                                Accueil
                            </a>
                        </li>
                    </ul>
                    @guest
                        <ul class="navbar-nav align-items-center mr-0">

                            @if (Route::has('login'))
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                                </li>
                            @endif
                        </ul>
                    @else
                        <ul class="navbar-nav align-items-center mr-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-2" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Username
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/">Profil</a>
                                    <a class="dropdown-item" href="/">Déconnexion</a>
                                </div>
                            </li>
                        </ul>
                    @endguest
                </div>
            </nav>
        </div>
    </header>
    <main class="py-4">
        @yield('content')
    </main>
    <footer class="bg-dark text-white bottom">
        <div class="container pb-5">
            <div class="row">
                <div class="col">
                    <h2 class="h3">Rue du Monte 47, 1000 <br>Brussels, Belgium</h2>
                </div>
                <div class="col text-right">
                    <ul class="list-group list-group-minimal">
                        <li class="list-group-item"><a href="">Facebook</a></li>
                        <li class="list-group-item"><a href="">Twitter</a></li>
                        <li class="list-group-item"><a href="">Instagram</a></li>
                        <li class="list-group-item"><a href="">Linkedin</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="separator-top">
            <div class="container py-5">
                <div class="row justify-content-between align-items-center">
                    <div class="col">
                        <img class="logo-sm" src="../assets/images/demo/logo/logo-light.svg" alt="Logo">
                    </div>
                    <div class="col text-right">
                        <span class="copyright-text">© Made with love.</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
