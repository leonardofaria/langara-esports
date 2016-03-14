@extends('app')

@section('content')
    <div class="admin">

        <h2>New game</h2>

        @include('errors.list')

        {!! Form::open(['url' => 'games']) !!}

            @include('games._form', ['submitButtonText' => 'Add Game'])

        {!! Form::close() !!}

    </div>
@stop