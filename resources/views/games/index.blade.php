@extends('app')

@section('content')
    <h1>All the games</h1>

    <a href="{{ URL::to('games/create') }}" class="btn btn-primary pull-right">New game</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($games as $game)
            <tr>
                <td>{{ $game->id }}</td>
                <td>{{ $game->name }}</td>

                <td>

                    <!-- delete the game (uses the destroy method DESTROY /games/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the game (uses the show method found at GET /games/{id} -->
                    <a class="btn btn-small btn-success" href="{{ url('games/' . $game->id) }}">Show this Game</a>

                    <!-- edit this game (uses the edit method found at GET /games/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ url('games/' . $game->id . '/edit') }}">Edit this Game</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop