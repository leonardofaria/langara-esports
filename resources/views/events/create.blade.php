@extends('app')

@section('content')

    <div class="admin">

        <h2>New event</h2>

        {!! Form::open(['url' => 'events', 'novalidate' => 'novalidate', 'class' => 'event-form']) !!}

            @include('events._form', ['submitButtonText' => 'Add Event'])

        {!! Form::close() !!}

    </div>

@stop