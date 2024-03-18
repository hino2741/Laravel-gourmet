<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('css/navbar-fixed-left.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/clock.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @if(!Auth::check() && (!isset($authgroup) || !Auth::guard($authgroup)->check()))
                    <li class="nav-item">
                        @isset($authgroup)
                            <a class="nav-link" href="{{ url("$authgroup/login") }}">{{ __('Login') }}</a>
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
                        <a class="dropdown-item" href="{{ route('admin.logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                @endguest
            </ul>
            <nav class="navbar navbar-fixed-left">
                <div class="container">
                    <div class="navbar-header navbar-left-header">MENU</div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav-left-list">
                            <li>
                                <a href="{{ route('admin.home') }}">管理ホーム</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.information.index') }}">ブログ</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.information.create') }}">ブログ作成</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
