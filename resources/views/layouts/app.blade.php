<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'YoBenny') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTFC_t-kFiDR_eh5tLboLxVR5z9hr9Uk8&libraries=places"></script>
    <script async defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
</head>
<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ url('/') }}">
                <h1 class="title">{{ config('app.name', 'YoBenny') }}</h1>
            </a>

            <button class="button navbar-burger">
            <span></span>
            <span></span>
            <span></span>
            </button>
        </div>
        <div class="navbar-menu">
            <!-- Authentication Links -->
            <div class="navbar-end">
                @role('admin')
                <a class="navbar-item" href="{{ route('admin') }}">Admin</a>
                @endrole
                <a class="navbar-item" href="{{ route('things.add.form') }}">Submit a new event!</a>
                @guest
                    <a class="navbar-item" href="{{ route('login') }}">Login</a>
                    <a class="navbar-item" href="{{ route('register') }}">Register</a>
                @else
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">{{ Auth::user()->name }}</a>
                    <div class="navbar-dropdown">
                        <!-- Other navbar items -->
                        <a class="navbar-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                    </div>
                </div>
                @endguest
            </div>
        </div>
    </nav>

    @if (session('message'))
    <section class="section">
        <div class="container">
            <article class="message is-primary">
                <div class="message-header">
                    <p>Important!</p>
                    <button class="delete" aria-label="delete"></button>
                </div>
                <div class="message-body">
                    {{ session('message') }}
                </div>
            </article>
        </div>
    </section>
    @endif
    
    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="content has-text-centered">
            <p>
                <strong>YoBenny</strong> by <a href="https://artaten.com" target="_BLANK">artaten</a>. Copyright 2018.<br />
                <a href="/terms">Terms</a> | <a href="/privacy">Privacy</a> | <a href="/about">About</a>
            </p>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
