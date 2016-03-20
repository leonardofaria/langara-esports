@include('errors.list')

@if (isset($games))
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
@else
    {!! Form::hidden('game_id', $game->id) !!}
@endif

<div class="form-group">
    {!! Form::label('name') !!}
    {!! Form::text('name') !!}
</div>

<div class="form-group">
    {!! Form::label('description') !!}
    {!! Form::textarea('description') !!}
</div>

<div class="form-group">
    {!! Form::label('started_at') !!}
    {!! Form::text('started_at') !!}
</div>

<div class="form-group">
    {!! Form::label('ended_at') !!}
    {!! Form::text('ended_at') !!}
</div>

@if (Auth::user()->admin()->first())
<div class="form-group">
    {!! Form::label('official') !!}
    {{ Form::checkbox('official', 1, true) }}
</div>
@endif

<button class="btn" type="submit">
    <span class="ion-android-calendar"></span>
    <span>{{ $submitButtonText }}</span>
</button>
