@extends('app')

@section('content')
    <div class="admin">

        <h2>Edit {!! $event->name !!}</h2>

        @include('errors.list')

        {!! Form::model($event, ['method' => 'PATCH', 'action' => ['EventsController@update', $event]]) !!}

        @include('events._form', ['submitButtonText' => 'Update Game'])

        {!! Form::close() !!}

    </div>
@stop