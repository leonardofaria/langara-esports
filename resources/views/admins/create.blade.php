@extends('app')

@section('content')

    <div class="admin">
        <h2>New admin</h2>

        @include('errors.list')

        {!! Form::open(['url' => 'admins']) !!}

            @include('admins._form', ['submitButtonText' => 'Add Admin'])

        {!! Form::close() !!}
    </div>

@stop