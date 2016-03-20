@extends('app')

@section('content')
    <div class="admin">
        <a href="{{ URL::to('games/create') }}" class="btn btn-primary pull-right new">
            <span class="ion-ios-plus-empty"></span>
            <span>New</span>
        </a>

        <h2>Games</h2>

        <table class="table table-striped">
            <thead>
            <tr>
                <th class="image"></th>
                <th>Name</th>
                <th class="actions">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($games as $game)
                <tr>
                    <td>
                        <a href="/games/{{ $game->id }}">
                            <img src="{{ $game->avatar }}" alt="{{ $game->name }}" class="avatar" />
                        </a>
                    </td>
                    <td>
                        <a href="/games/{{ $game->id }}">
                            {{ $game->name }}
                        </a>
                    </td>
                    <td>
                        {!! Form::open(['action' => ['GamesController@destroy', $game->id], 'method' => 'delete']) !!}
                            <a class="btn btn-primary" href="{{ url('games/' . $game->id . '/edit') }}"><span class="ion-edit"></span></a>{!! Form::button('<span class="ion-trash-a"></span>', ['class'=> 'btn btn-danger', 'type' => 'submit', 'onclick' => 'return confirm("Are you sure?");']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop