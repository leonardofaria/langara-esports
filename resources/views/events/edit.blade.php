@extends('app')

@section('content')

    <h1>Edit {!! $event->name !!}</h1>

    @include('errors.list')

    {!! Form::model($event, ['method' => 'PATCH', 'action' => ['EventsController@update', $event]]) !!}

    @include('events._form', ['submitButtonText' => 'Update Game'])

    {!! Form::close() !!}

@stop