<!DOCTYPE html>
<html>
<head>
    <title>Langara eSports @yield('page-title')</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta-description')" />
    <meta property="og:image" content="@yield('meta-image')">
    <meta property="og:description" content="@yield('meta-description')">
    <meta property="og:title" content="Langara eSports @yield('page-title')">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ Request::url() }}">
</head>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1701756510065217";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="wrapper-main">
    <header>
        <div class="wrapper-nav max-width">
            <a href="{{ route('home') }}"><img src="/images/logo.svg" class="logo"></a>
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

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>