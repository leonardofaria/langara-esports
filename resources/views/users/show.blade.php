@extends('app')

@section('content')

    @include('users._user')

    <section class="main-content">

        <div class="event-buttons">
            <a class="my-events"><i class="ion-person"></i>User Events</a>
        </div>

        <div class="content">
            <div class="my-events">
                @if ($participations->count() > 0)
                    @foreach($participations as $participation)
                        @include('events._event', ['event' => $participation->event])
                    @endforeach
                @else
                    <div class="no-events">No events to show.</div>
                @endif
            </div>
        </div>

    </section>

@stop