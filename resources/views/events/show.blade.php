@extends('app')

@section('page-title', '- ' . $event->name . ' - ' . $event->started_at->format('m/d h:ia'))
@section('meta-image', $event->game->cover)
@section('meta-description', $event->full_description())

@section('content')

    <section class="cover-image" style="background-image: url('{{ $event->game->cover }}');">

       <a href="/events/{{ $event->id }}">
           <h1>{{ $event->name }}</h1>
       </a>

    </section>

    <section class="main-content max-width">

       <div class="event-details clearfix">
           <div class="column event-description">
                <span class="day">
                    {{ $event->started_at->format('dS M') }}
                </span>
                <span class="time">
                    {{ $event->started_at->format('h:ia') }} -
                    {{ $event->ended_at->format('h:ia') }}
                </span>

                <p>{{ $event->description }}</p>

                @if ($user)
                    {!! Form::model(null, ['method' => 'post', 'action' => 'PagesController@participants', 'class' => 'decision']) !!}
                    {!! Form::hidden('event_id', $event->id, ['class' => 'form-control']) !!}
                    {!! Form::radio('participant', 1, null, ['id' => 'event_yes_' . $event->id, 'class' => 'hide yes_radio']) !!}
                    {!! Form::radio('participant', 0, null, ['id' => 'event_no_' . $event->id, 'class' => 'hide no_radio']) !!}
                    <p>Join event?</p>
                    @if (in_array($user->id, $event->going_users()))
                    <a href="#" class="btn no"><span class="ion-close"></span><span>Leave event</span></a>
                    @elseif (in_array($user->id, $event->not_going_users()))
                    <a href="#" class="btn yes"><span class="ion-checkmark"></span><span>Join event</span></a>
                    @else
                    <a href="#" class="btn yes"><span class="ion-checkmark"></span></a>
                    <a href="#" class="btn no"><span class="ion-close"></span></a>
                    @endif
                    {!! Form::close() !!}
                @endif
            </div>

             <div class="column event-participants">
                <h2>Event Owner</h2>

                <a href="/users/{{ $event->user->id }}">
                    <img src="{{ $event->user->avatar() }}" alt="{{ $event->user->name }}" class="avatar author">
                </a>

                <h2>Who is coming</h2>
                @foreach($event->participants as $participant)
                    @if ($participant->participant == 1 && $participant->user->id != $event->user->id)
                        <a href="/users/{{ $participant->user->id }}">
                            <img src="{{ $participant->user->avatar() }}" alt="{{ $participant->user->name }}" class="avatar">
                        </a>
                    @endif
                @endforeach
            </div>
       </div>

       <div class="event-comments">
            <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="10" data-colorscheme="dark" data-width="100%"></div>
       </div>

    </section>

@stop