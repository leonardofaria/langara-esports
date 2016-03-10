<div class="event" style="background-image: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 1) ), url('{{ $event->game()->first()->cover }}');">
    <figure class="game-logo">
        <img src="{{ $event->game()->first()->avatar }}" alt="{{ $event->game()->first()->name }}">
        <figcaption>{{ $event->game()->first()->name }}</figcaption>
    </figure>
    <h2>30th Jan</h2>
    <h3>5:30pm - 6:30pm</h3>
    <div class="creator-picture">
        <figure>
            <img src="{{ $event->user()->first()->avatar() }}" alt="{{ $event->user()->first()->name }}">
        </figure>
        <p class="creator-name">{{ $event->user()->first()->name }}</p>
    </div>
    <div class="decision">
        <a>Join?</a>
        {!! Form::model($user, ['method' => 'post', 'action' => 'PagesController@participants']) !!}
            {!! Form::hidden('event_id', $event->id, ['class' => 'form-control']) !!}
            {!! Form::radio('participant', 1, true, ['class' => 'form-control']) !!}
            {!! Form::radio('participant', 0, false, ['class' => 'form-control']) !!}
            {!! Form::submit('Save preferences', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
        <a href="#" class="yes"><i class="ion-checkmark"></i></a>
        <a href="#" class="no"><i class="ion-close"></i></a>
    </div>
</div>
