@extends('app')

@section('content')

    <section class="cover-image" style="background-image: url('{{ $game->cover }}');">

        <a href="/games/{{ $game->id }}">
            <h1>{{ $game->name }}</h1>
        </a>
        <a href="/games/{{ $game->id }}" class="profile-image">
            <img src="{{ $game->avatar }}" alt="{{ $game->name }}" class="avatar" />
        </a>

    </section>

    <section class="main-content">

        <div class="event-buttons">
            <a class="all-events"><i class="ion-earth"></i>All Events</a>
            @if ($user)
            <a class="add-event"><i class="ion-android-add-circle"></i>Add Event</a>
            @endif
        </div>

        <div class="content">
            <div class="all-events">
                @if ($events->count() > 0)
                    @foreach($events as $event)
                        @include('events._event')
                    @endforeach
                @else
                    <div class="no-events">No new events coming.</div>
                @endif
            </div>

            @if ($user)
                <div class="add-event">
                    {!! Form::open(['url' => 'events', 'novalidate' => 'novalidate', 'class' => 'event-form']) !!}
                        @include('events._form', ['submitButtonText' => 'Add Event'])
                    {!! Form::close() !!}
                </div>
            @endif
        </div>

    </section>

@stop