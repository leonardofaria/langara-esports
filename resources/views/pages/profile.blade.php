@extends('app')

@section('content')

    @include('users._user')

    <section class="main-content">

        <div class="wrapper-add-games max-width">

            @include('games._favourites')

        </div>

    </section>

@stop
