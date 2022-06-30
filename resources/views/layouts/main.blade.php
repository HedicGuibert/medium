<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <script src="{{ asset('theme/js/vendor.js') }}" defer></script>
    <script src="{{ asset('theme/js/app.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="{{ asset('theme/css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body data-aos-easing="ease" data-aos-duration="800" data-aos-delay="0">
    <header class="header-sticky header-light bg-white headroom headroom--not-bottom headroom--pinned headroom--top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="/">
                    <img class="navbar-logo navbar-logo-light" src="../assets/images/demo/logo/logo-light.svg"
                        alt="Logo">
                    <img class="navbar-logo navbar-logo-dark" src="../assets/images/demo/logo/logo-dark.svg" alt="Logo">
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
                        @guest
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('article-groups.index') }}">Tous les groupes
                                d'articles</a>
                        </li>
                        @endguest
                        @auth
                        @can('isEditor')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories.index') }}" role="button">
                                Catégories
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/favourite') }}" role="button">
                                Favoris
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" dusk="article-group-dropdown">
                                Groupes d'articles
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('article-groups.index') }}" dusk="article-group-list">
                                    <span>Tous les groupes d'articles</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" dusk="user-article-group-dropdown"
                                    href="{{ route('article-groups.index', ['userId' => Auth::id()]) }}">
                                    <span>Mes groupes d'articles</span>
                                </a>
                                {{-- <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../app-pages.html">
                                    <span>App Pages</span>
                                    <p>Add functionality to your website.</p> --}}
                                    {{--
                                </a> --}}
                            </div>
                        </li>
                        @endauth
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
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">Profil</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Déconnexion</a>
                            </div>
                        </li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endguest
                </div>
            </nav>
        </div>
    </header>
    <main class="my-auto">
        @yield('content')
    </main>
    <footer class="bg-dark text-white w-100 mt-auto">
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
    <script src="{{ asset('js/categories.js') }}"></script>
</body>
@if (session()->has('error'))
<script>
    $(function() {
            warning('{{ session()->get('error') }}')
        })
</script>
@endif
@if ($errors->any())
@foreach ($errors->all() as $error)
<script>
    $(function() {
                warning('{{ $error }}')
            })
</script>
@endforeach
@endif
@if (session()->has('success'))
<script>
    $(function() {
            success('{{ session()->get('success') }}')
        })
</script>
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function warning(message) {
        toastr.warning(message, '', {
            "positionClass": "toast-bottom-right"
        }, {
            timeOut: 50000
        });
    }

    function success(message) {
        toastr.success(message, '', {
            "positionClass": "toast-bottom-right"
        });
    }
</script>

</html>
