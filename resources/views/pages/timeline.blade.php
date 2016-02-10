@extends('app')

@section('content')

    <img src="{{ $user->avatar() }}" />

    <h1>Hello {{ $user->name }}</h1>

    @if (count($user->games) < 2000)

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Select your favourite games</h3>
            </div>
            <div class="panel-body">
                @include('games._favourites', ['submitButtonText' => 'Submit'])
            </div>
        </div>

    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Next Events</h3>
        </div>
        <div class="panel-body">
            @foreach($events as $event)
                {{ $event->game()->first()->name }} / {{ $event->name }} <br/>

                @if ($event->description)
                    <small>{{ $event->description }}</small><br/>
                @endif

                created by {{ $event->user()->first()->name }}
                <hr/>
            @endforeach
        </div>
    </div>

@stop