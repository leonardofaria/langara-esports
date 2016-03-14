@extends('app')

@section('content')

    @include('users._user')

    <section class="main-content">

        <div class="event-buttons">
            <a class="all-events" href="#"><i class="ion-earth"></i>All Events</a>
            <a class="personal-events event-buttons-hover" href="#"><i class="ion-person"></i>My Events</a>
            <a class="my-games-button" href="#"><i class="ion-ios-game-controller-b"></i>My Games</a>
            <a id="add-event" href="#"><i class="ion-android-add-circle"></i>Add Event</a>
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


        <div class="wrapper-add-games max-width">

            @include('games._favourites')

        </div>


        <div class="add_event max-width">

            @include('errors.list')

            {!! Form::open(['url' => 'events', 'novalidate' => 'novalidate']) !!}
                @include('events._form', ['submitButtonText' => 'Add Event'])
            {!! Form::close() !!}

        </div>

    </section>

@stop