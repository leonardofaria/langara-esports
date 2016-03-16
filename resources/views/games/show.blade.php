@extends('app')

@section('content')

    <section class="cover-image" style="background-image: url('{{ $game->cover }}');">

        <a href="/games/{{ $game->id }}">
            <h1>{{ $game->name }}</h1>
        </a>
        <a href="/games/{{ $game->id }}">
            <figure class="profile-image">
                <img src="{{ $game->avatar }}" alt="{{ $game->name }}" />
            </figure>
        </a>

    </section>

    <section class="main-content">

        <div class="event-buttons">
            <a class="all-events"><i class="ion-earth"></i>All Events</a>
            <a class="add-event"><i class="ion-android-add-circle"></i>Add Event</a>
        </div>

        <div class="content">
            <div class="all-events">
                @foreach($events as $event)
                    @include('events._event')
                @endforeach
            </div>


            <div class="add-event">
                {!! Form::open(['url' => 'events', 'novalidate' => 'novalidate', 'class' => 'event-form']) !!}
                    @include('events._form', ['submitButtonText' => 'Add Event'])
                {!! Form::close() !!}
            </div>
        </div>

    </section>

@stop