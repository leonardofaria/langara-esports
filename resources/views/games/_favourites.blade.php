{!! Form::model($user, ['method' => 'post', 'action' => 'PagesController@favourites']) !!}

    <ul class="game_s">

    @foreach($games as $game)

        <li class="gam_e" title="{{ $game->name }}">
            {{ Form::checkbox('games[]', $game->id, null, ['id' => 'game_' . $game->id]) }}
            <label for="game_{{ $game->id }}">{{ $game->name }}</label>
        </li>

    @endforeach

    </ul>

    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
    </div>

{!! Form::close() !!}