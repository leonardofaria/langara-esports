@extends('app')

@section('content')

    <h1>New admin</h1>

    @include('errors.list')

    {!! Form::open(['url' => 'admins']) !!}

        @include('admins._form', ['submitButtonText' => 'Add Admin'])

    {!! Form::close() !!}

@stop