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
<div id="app" class="container-fluid">
    {{--    <v-toolbar fixed color="white">--}}
    {{--        <v-toolbar-side-icon></v-toolbar-side-icon>--}}
    {{--        <v-toolbar-title> LChat</v-toolbar-title>--}}
    {{--        <v-spacer></v-spacer>--}}
    {{--        <v-toolbar-items class="hidden-sm-and-down">--}}
    {{--@guest
        <v-btn flat href="{{ route('login') }}">Login</v-btn>
        <v-btn flat href="{{ route('register') }}">Register</v-btn>
    @else
        <v-btn flat> {{ Auth::user()->name }}</v-btn>
        <v-btn flat
               @click=" $refs.logoutForm.submit(); ">
            Logout
        </v-btn>
    @endguest
    <form ref="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>--}}

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    {{--        </v-toolbar-items>--}}
    {{--    </v-toolbar>--}}

    <main class="mt-5">
        <v-container fluid>
            @guest
                {{--                <Chat></Chat>--}}
                <div>
                    Please first Login then chat page show
                    @yield('content')
                </div>
            @else
                <Chat :user="{{auth()->user()}}"></Chat>
            @endguest
            {{--            @yield('content')--}}
        </v-container>
    </main>
</div>
</body>
</html>
