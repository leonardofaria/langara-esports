<!DOCTYPE html>
<html>
<head>
    <title>Langara eSports</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('/') }}">Langara eSports</a>
        </div>
        <ul class="nav navbar-nav">
            <!-- <li><a href="{{ URL::to('nerds') }}">View All Nerds</a></li> -->
            <li><a href="{{ URL::to('games/create') }}">New game</a></li>
        </ul>
    </nav>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    @yield('content')

</div>
</body>
</html>