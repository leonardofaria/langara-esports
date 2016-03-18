@extends('app')

@section('content')

    @include('users._user')

    <section class="main-content">

        <div class="event-buttons">
            <a class="all-events"><i class="ion-earth"></i>All Events</a>
            <a class="my-events"><i class="ion-person"></i>My Events</a>
            <a class="my-games"><i class="ion-ios-game-controller-b"></i>My Games</a>
            <a class="add-event"><i class="ion-android-add-circle"></i>Add Event</a>
        </div>

        <div class="content">
            <div class="all-events">
                @if ($all_events)
                    @foreach($all_events as $event)
                        @include('events._event')
                    @endforeach
                @else
                    <div class="no-events">No new events coming.</div>
                @endif
            </div>


            <div class="my-events">
                @if ($my_events)
                    @foreach($my_events as $event)
                        @include('events._event')
                    @endforeach
                @else
                    <div class="no-events">No new events coming.</div>
                @endif
            </div>


            <div class="my-games">
                @include('games._favourites')
            </div>


            <div class="add-event">
                {!! Form::open(['url' => 'events', 'novalidate' => 'novalidate', 'class' => 'event-form']) !!}
                    @include('events._form', ['submitButtonText' => 'Add Event'])
                {!! Form::close() !!}
            </div>
        </div>

    </section>

@stop