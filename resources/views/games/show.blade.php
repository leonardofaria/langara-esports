@extends('app')

@section('content')

    <h1>Showing {{ $game->name }}</h1>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Next Events</h3>
        </div>
        <div class="panel-body">
            @foreach($events as $event)
                @include('events._event')
            @endforeach
        </div>
    </div>

@stop