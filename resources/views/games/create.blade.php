@extends('app')

@section('content')

    <h1>New game</h1>

    @include('errors.list')

    {!! Form::open(['url' => 'games']) !!}

        @include('games._form', ['submitButtonText' => 'Add Game'])

    {!! Form::close() !!}

@stop