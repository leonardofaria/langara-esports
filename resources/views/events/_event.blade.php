<div class="event" style="background-image: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 1) ), url('{{ $event->game()->first()->cover }}');">

    @if ($event->official)
        <div class="admin-post">
           <span class="ion-android-star"></span>
           <p>admin</p>
        </div>
    @endif

    @if ($event->user()->first()->id === $user->id || $user->isAdmin())
        {!! Form::open(['action' => ['EventsController@destroy', $event->id], 'method' => 'delete', 'class' => 'delete-form']) !!}
            {!! Form::button('<span class="ion-trash-a"></span>', ['class'=> 'delete-button', 'type' => 'submit']) !!}
        {!! Form::close() !!}
    @endif

    <a href="/games/{{ $event->game()->first()->id }}" class="game-logo">
        <img src="{{ $event->game()->first()->avatar }}" alt="{{ $event->game()->first()->name }}">
        {{ $event->game()->first()->name }}
    </a>

    <a href="/events/{{ $event->id }}">
        <span class="day">26th Mar</span>
        <span class="time">4:30am - 3:30am</span>
    </a>

    <a href="/users/{{ $event->user()->first()->id }}" class="author">
        <img src="{{ $event->user()->first()->avatar() }}" alt="{{ $event->user()->first()->name }}">
        <span>{{ $event->user()->first()->name }}</span>
    </a>

    <div class="title">
        <h2>{{ $event->name ? $event->name : $event->game()->first()->name }}</h2>
    </div>

    {!! Form::model(null, ['method' => 'post', 'action' => 'PagesController@participants', 'class' => 'decision']) !!}
        {!! Form::hidden('event_id', $event->id, ['class' => 'form-control']) !!}
        {!! Form::radio('participant', 1, null, ['id' => 'event_yes_' . $event->id, 'class' => 'hide']) !!}
        {!! Form::radio('participant', 0, null, ['id' => 'event_no_' . $event->id, 'class' => 'hide']) !!}
        <p>Join?</p>
        <a href="#" class="yes"><i class="ion-checkmark"></i></a>
        <a href="#" class="no"><i class="ion-close"></i></a>
    {!! Form::close() !!}
</div>
