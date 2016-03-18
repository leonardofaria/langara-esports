@extends('app')

@section('content')
    <div class="admin">
        <a href="{{ URL::to('events/create') }}" class="btn btn-primary pull-right new">
            <span class="ion-ios-plus-empty"></span>
            <span>New event</span>
        </a>

        <h2>All the events</h2>

        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Started at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td><img src="{{ $event->game()->first()->avatar }}" alt="{{ $event->game()->first()->name }}" class="avatar"></td>
                    <td><a href="/events/{{ $event->id }}">{{ $event->name }}</a></td>
                    <td>{{ $event->started_at }}</td>

                    <td>
                        {!! Form::open(['action' => ['EventsController@destroy', $event->id], 'method' => 'delete']) !!}
                            <a class="btn btn-primary" href="{{ url('events/' . $event->id . '/edit') }}"><span class="ion-edit"></span></a>{!! Form::button('<span class="ion-trash-a"></span>', ['class'=> 'btn btn-danger', 'type' => 'submit', 'onclick' => 'return confirm("Are you sure?");']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop