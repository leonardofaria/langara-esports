@extends('app')

@section('content')

    <h1>New event</h1>

    {!! Form::open(['url' => 'events', 'novalidate' => 'novalidate', 'class' => 'event-form']) !!}

        @include('events._form', ['submitButtonText' => 'Add Event'])

    {!! Form::close() !!}

@stop