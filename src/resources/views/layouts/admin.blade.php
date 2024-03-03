<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @if(!Auth::check() && (!isset($authgroup) || !Auth::guard($authgroup)->check()))
                    <li class="nav-item">
                        @isset($authgroup)
                        <a class="nav-link" href="{{ url("login/$authgroup") }}">{{ __('Login') }}</a>
                        @else
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endisset
                    </li>
                    @isset($authgroup)
                    @if (Route::has("$authgroup-register"))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("$authgroup-register") }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @else
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @endisset
                @else
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @endguest
            </ul>
    </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>