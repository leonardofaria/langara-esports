Date: <a href="{{ url('events/' . $event->id) }}">{{ $event->played_at->format('d/m/Y H:i') }}</a> - {{ $event->played_at->diffForHumans() }}<br/>
Game: <a href="{{ url('games/' . $event->game()->first()->id) }}">{{ $event->game()->first()->name }}</a> / Title: {{ $event->name }} <br/>

@if ($event->description)
    Description: {{ $event->description }}<br/>
@endif

@if ($event->official)
    This is an official event <br/>
@endif

Created by <a href="{{ url('users/' . $event->user()->first()->id) }}">{{ $event->user()->first()->name }}</a>
<hr/>