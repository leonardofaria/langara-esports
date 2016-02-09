@extends('app')

@section('content')

    <h1>Hello {{ Auth::user()->name }}</h1>

@stop