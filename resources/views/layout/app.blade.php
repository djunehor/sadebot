<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title ?? 'App'}} - {{env('APP_NAME')}}</title>
    <meta name="description" content="">
    <!-- Optional theme -->
    <link rel="stylesheet" href="{{asset('public/bootstrap.min.css')}}" >

    <!-- Latest compiled and minified JavaScript -->
    <script src="{{asset('public/jquery-1.9.1.min.js')}}"></script>
    <script src="{{asset('public/custom.js')}}"></script>
    <script src="{{asset('public/bootstrap.min.js')}}"></script>

</head>
<body>
<div class="loader"></div>
<!--
*******************
    HEADER
******************
-->
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                    @else
                        <li class="nav-item"> <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ Auth::user()->name }} ({{ __('Logout') }})
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                        </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('transport-routes') }}">Routes</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/transport-routes/new') }}">New Route</a></li>
                        @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>

<!--
*******************
    NAV MENU MOBILE
******************
-->
<footer class="footer">
    Sadebot
</footer>

@yield('scripts')
</body>
</html>