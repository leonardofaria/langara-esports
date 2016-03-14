<section class="liked-games">
    <h2>Select a game</h2>

    @foreach($games as $game)
    <label for="event_game_{{ $game->id }}" class="game-logo">
        {{ Form::radio('game_id', $game->id, null, ['id' => 'event_game_' . $game->id, 'class' => 'hide']) }}

        <img src="{{ $game->avatar }}" alt="{{ $game->name }}">
        <figcaption>{{ $game->name }}</figcaption>

    </label>
    @endforeach

</section>

<div class="form-group">
    {!! Form::label('name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('started_at') !!}
    {!! Form::text('started_at', date('Y-m-d H:i')) !!}
</div>

<div class="form-group">
    {!! Form::label('ended_at') !!}
    {!! Form::text('ended_at', date('Y-m-d H:i')) !!}
</div>

@if (Auth::user()->admin()->first())
<div class="form-group">
    {!! Form::label('official') !!}
    {{ Form::checkbox('official', 1, true) }}
</div>
@endif

<button class="save-button add" type="submit">
    <span class="ion-archive"></span>
    Add Event
</button>

<script type="text/javascript" src="/js/flatpickr.min.js"></script>
<script type="text/javascript">
var started_at = flatpickr("#started_at", { dateFormat: 'Y-m-d', timeFormat: 'H:i', enableTime: true, minDate: new Date() });
var ended_at = flatpickr("#ended_at", { dateFormat: 'Y-m-d', timeFormat: 'H:i', enableTime: true, minDate: new Date() });

started_at.set("onChange", function(d){ var temp = new Date(d); temp.setDate(d.getDate()-1); ended_at.set( "minDate" , temp ); });
</script>
