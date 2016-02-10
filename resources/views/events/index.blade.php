@extends('app')

@section('content')
    <h1>All the events</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <td>{{ $event->id }}</td>
                <td>{{ $event->name }}</td>

                <td>

                    <!-- delete the event (uses the destroy method DESTROY /events/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the event (uses the show method found at GET /events/{id} -->
                    <a class="btn btn-small btn-success" href="{{ url('events/' . $event->id) }}">Show this Game</a>

                    <!-- edit this event (uses the edit method found at GET /events/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ url('events/' . $event->id . '/edit') }}">Edit this Game</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop