@extends('app')

@section('content')

    <h1>Edit {!! $game->name !!}</h1>

    @include('errors.list')

    {!! Form::model($game, ['method' => 'PATCH', 'action' => ['GamesController@update', $game]]) !!}

    @include('games._form', ['submitButtonText' => 'Update Game'])

    {!! Form::close() !!}

@stop