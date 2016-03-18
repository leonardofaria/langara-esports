<?php

$participant_class = '';

if (in_array($user->id, $event->going_users())) {
    $participant_class = 'going';
}

if (in_array($user->id, $event->not_going_users())) {
    $participant_class = 'not-going';
}

?>
<div class="event {{ $participant_class }}" style="background-image: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 1) ), url('{{ $event->game->cover }}');">

    @if ($event->official)
        <div class="admin-post">
           <span class="ion-android-star"></span>
           <p>admin</p>
        </div>
    @endif

    @if ($event->user->id === $user->id || $user->isAdmin())
        {!! Form::open(['action' => ['EventsController@destroy', $event->id], 'method' => 'delete', 'class' => 'delete-form']) !!}
            {!! Form::button('<span class="ion-trash-a"></span>', ['class'=> 'delete-button', 'type' => 'submit']) !!}
        {!! Form::close() !!}
    @endif

    <a href="/games/{{ $event->game->id }}" class="game-logo">
        <img src="{{ $event->game->avatar }}" alt="{{ $event->name }}">
        {{ $event->game()->first()->name }}
    </a>

    <a href="/events/{{ $event->id }}">
        <span class="day">
            {{ $event->started_at->format('dS M') }}
        </span>
        <span class="time">
            {{ $event->started_at->format('h:ia') }} -
            {{ $event->ended_at->format('h:ia') }}
        </span>
    </a>

    <a href="/users/{{ $event->user->id }}" class="author">
        <img src="{{ $event->user->avatar() }}" alt="{{ $event->user->name }}">
        <span>{{ $event->user()->first()->name }}</span>
    </a>

    <div class="title">
        <h2>{{ $event->name ? $event->name : $event->game->name }}</h2>
    </div>

    {!! Form::model(null, ['method' => 'post', 'action' => 'PagesController@participants', 'class' => 'decision']) !!}
        {!! Form::hidden('event_id', $event->id, ['class' => 'form-control']) !!}
        {!! Form::radio('participant', 1, null, ['id' => 'event_yes_' . $event->id, 'class' => 'hide yes_radio']) !!}
        {!! Form::radio('participant', 0, null, ['id' => 'event_no_' . $event->id, 'class' => 'hide no_radio']) !!}
        <p>Join?</p>
        @if (in_array($user->id, $event->going_users()))
            <a href="#" class="no"><i class="ion-close"></i></a>
        @elseif (in_array($user->id, $event->not_going_users()))
            <a href="#" class="yes"><i class="ion-checkmark"></i></a>
        @else
            <a href="#" class="yes"><i class="ion-checkmark"></i></a>
            <a href="#" class="no"><i class="ion-close"></i></a>
        @endif
    {!! Form::close() !!}
</div>
