@extends('app')

@section('content')

    <h1>Edit {!! $admin->name !!}</h1>

    @include('errors.list')

    {!! Form::model($admin, ['method' => 'PATCH', 'action' => ['GamesController@update', $admin]]) !!}

    @include('admins._form', ['submitButtonText' => 'Update Game'])

    {!! Form::close() !!}

@stop