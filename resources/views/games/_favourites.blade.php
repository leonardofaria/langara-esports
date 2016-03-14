<h3>Add the games you like to play</h3>

{!! Form::model($user, ['method' => 'post', 'action' => 'PagesController@favourites']) !!}

    <div class="choose-game">

        @foreach($games as $game)
            <?php $style = in_array($game->id, $liked_games) ? 'selected' : ''; ?>

            <label for="game_{{ $game->id }}" class="game {{ $style }}" style="background-image: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 1) ), url('{{ $game->cover }}');">
                {{ Form::checkbox('games[]', $game->id, null, ['id' => 'game_' . $game->id, 'class' => 'hide']) }}
                 <figure class="game-logo">
                    <img src="{{ $game->avatar }}" alt="{{ $game->name }}">
                 </figure>
                 <h2>{{ $game->name }}</h2>
            </label>
        @endforeach

    </div>

    <button type="submit" class="save-button">
        <span class="ion-archive"></span>
        Save
    </button>

{!! Form::close() !!}
