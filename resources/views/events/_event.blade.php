<div class="event" style="background-image: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 1) ), url('{{ $event->game()->first()->cover }}');">
    @if ($event->official)
    <div class="admin-post">
       <span class="ion-android-star"></span>
       <p>admin</p>
    </div>
    @endif
    <a href="" class="delete-button">
        <span class="ion-trash-a"></span>
    </a>
    <figure class="game-logo">
        <a href="/games/{{ $event->game()->first()->id }}">
            <img src="{{ $event->game()->first()->avatar }}" alt="{{ $event->game()->first()->name }}">
            <figcaption>{{ $event->game()->first()->name }}</figcaption>
        </a>
    </figure>
    <a href="/events/{{ $event->id }}">
        <h2>26th Mar</h2>
        <h3>4:30am - 3:30am</h3>
    </a>
    <a href="/users/{{ $event->user()->first()->id }}" class="creator-picture">
        <figure>
            <img src="{{ $event->user()->first()->avatar() }}" alt="{{ $event->user()->first()->name }}">
        </figure>
        <p class="creator-name">{{ $event->user()->first()->name }}</p>
    </a>
    <div class="title">
        <h2>
            @if ($event->title)
            {{ $event->title }}
            @else
            {{ $event->game()->first()->name }}
            @endif
        </h2>
    </div>
    {!! Form::model($user, ['method' => 'post', 'action' => 'PagesController@participants', 'class' => 'decision']) !!}
        {!! Form::hidden('event_id', $event->id, ['class' => 'form-control']) !!}
        <p>Join?</p>
        <a href="#" class="yes"><i class="ion-checkmark"></i></a>
        <a href="#" class="no"><i class="ion-close"></i></a>
    {!! Form::close() !!}
</div>
