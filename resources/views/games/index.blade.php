@extends('app')

@section('content')
    <div class="admin">
        <a href="{{ URL::to('games/create') }}" class="btn btn-primary pull-right"><span class="ion-ios-plus-empty"></span></a>

        <h2>All the games</h2>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($games as $game)
                <tr>
                    <td>{{ $game->name }}</td>
                    <td>
                        {!! Form::open(['action' => ['GamesController@destroy', $game->id], 'method' => 'delete']) !!}
                            <a class="btn btn-primary" href="{{ url('games/' . $game->id . '/edit') }}"><span class="ion-edit"></span></a>{!! Form::button('<span class="ion-trash-a"></span>', ['class'=> 'btn btn-danger', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop