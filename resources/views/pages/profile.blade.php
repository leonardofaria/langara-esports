@extends('app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Select your favourite games</h3>
        </div>
        <div class="panel-body">
            @include('games._favourites', ['submitButtonText' => 'Submit'])
        </div>
    </div>

@stop
