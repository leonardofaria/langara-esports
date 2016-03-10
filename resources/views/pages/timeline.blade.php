@extends('app')

@section('content')

    @include('users._user')

    <section class="main-content">

        <div class="event-buttons">
            <a href="{{ URL::to('events/create') }}"><i class="ion-ios-monitor"></i>Add Event</a>
            <a href="{{ route('profile') }}"><i class="ion-ios-game-controller-b"></i>My Games</a>
            <a class="personal-events event-buttons-hover" href="#"><i class="ion-person"></i>My Events</a>
            <a class="all-events" href="#"><i class="ion-earth"></i>All Events</a>
        </div>

        <div class="my-events max-width">

            @foreach($my_events as $event)
                @include('events._event')
            @endforeach

        </div>

        <div class="global-events max-width">

            @foreach($all_events as $event)
                @include('events._event')
            @endforeach

        </div>

    </section>

@stop