@extends('app')

@section('content')

    <h1 class="title"><img src="{{ $user->avatar() }}" /> Hello {{ $user->name }}</h1>

    @if (count($user->games) == 0)

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
                Date: {{ $event->played_at->format('d/m/Y H:i') }} - {{ $event->played_at->diffForHumans() }}<br/>
                Game: {{ $event->game()->first()->name }} / Title: {{ $event->name }} <br/>

                @if ($event->description)
                    Description: {{ $event->description }}<br/>
                @endif

                Created by {{ $event->user()->first()->name }}
                <hr/>
            @endforeach
        </div>
    </div>

@stop