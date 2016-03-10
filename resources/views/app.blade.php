<!DOCTYPE html>
<html>
<head>
    <title>Langara eSports</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="wrapper-main profile-page">
    <header>
        <div class="wrapper-nav max-width">
            <figure>
                <a href="{{ route('home') }}"><img src="/images/logo.svg" alt=""></a>
            </figure>
            <nav>
                <ul>
                    @unless (Auth::check())
                        <li><a href="{{ route('social.login', ['facebook']) }}">Login via Facebook</a></li>
                    @else
                        @if (Auth::user()->admin()->first())
                            <li><a href="{{ URL::to('admins/') }}" title="Manage administrator">Administrators</a></li>
                            <li><a href="{{ URL::to('games/') }}" title="Manage games">Games</a></li>
                            <li><a href="{{ URL::to('events/') }}" title="Manage events">Events</a></li>
                        @endif
                    @endunless
                    <li><a href="{{ route('logout') }}"><i class="ion-log-out"></i></a></li>
                </ul>
            </nav>
        </div>
    </header>

    @include('flash::message')

    @yield('content')

</div>

<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>