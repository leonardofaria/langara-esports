<!DOCTYPE html>
<html>
<head>
    <title>Langara eSports</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">Langara eSports</a>
        </div>
        <ul class="nav navbar-nav">
            @unless (Auth::check())
                <li><a href="{{ route('social.login', ['facebook']) }}">Login via Facebook</a></li>
            @else
                <li><a href="{{ URL::to('games/create') }}">New game</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            @endunless
        </ul>
    </nav>

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    @yield('content')

</div>
</body>
</html>