@extends('app')

@section('content')

    <h1>New event</h1>

    @include('errors.list')

    {!! Form::open(['url' => 'events', 'novalidate' => 'novalidate']) !!}

        @include('events._form', ['submitButtonText' => 'Add Event'])

    {!! Form::close() !!}

@stop