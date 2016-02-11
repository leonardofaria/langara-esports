<!DOCTYPE html>
<html>
<head>
    <title>Langara eSports</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css" />
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">Langara eSports</a>
        </div>
        <ul class="nav navbar-nav">
            @unless (Auth::check())
                <li><a href="{{ route('social.login', ['facebook']) }}">Login via Facebook</a></li>
            @else
                @if (Auth::user()->admin()->first())
                    <li><a href="{{ URL::to('games/') }}">Manage games</a></li>
                    <li><a href="{{ URL::to('events/') }}">Manage events</a></li>
                @endif

                <li><a href="{{ URL::to('events/create') }}">New event</a></li>
                <li><a href="{{ route('profile') }}">Your profile</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            @endunless
        </ul>
    </div>
</nav>

<div class="container">

    @include('flash::message')

    @yield('content')

</div>

<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>