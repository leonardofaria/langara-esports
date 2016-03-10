@extends('app')

@section('content')

    @include('users._user')

    <section class="main-content">

        {!! Form::model($user, ['method' => 'post', 'action' => 'PagesController@favourites']) !!}

        <h1>Add the games you like to play</h1>

        <div class="choose-game max-width">

            @foreach($games as $game)
                <label for="game_{{ $game->id }}">
                    {{ Form::checkbox('games[]', $game->id, null, ['id' => 'game_' . $game->id]) }}
                    <div class="game" style="background-image: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 1) ), url('{{ $game->cover }}');">
                        <figure class="game-logo">
                            <img src="{{ $game->avatar }}" alt="{{ $game->name }}">
                        </figure>
                        <h2>{{ $game->name }}</h2>
                    </div>
                </label>
            @endforeach

        </div>

        <div class="form-group">
            {!! Form::submit('Save preferences', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </section>

@stop
