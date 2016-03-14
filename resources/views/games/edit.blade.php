@extends('app')

@section('content')
    <div class="admin">

        <h2>Edit {!! $game->name !!}</h2>

        @include('errors.list')

        {!! Form::model($game, ['method' => 'PATCH', 'action' => ['GamesController@update', $game]]) !!}

            @include('games._form', ['submitButtonText' => 'Update Game'])

        {!! Form::close() !!}

    </div>
@stop