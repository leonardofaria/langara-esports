@extends('app')

@section('content')
    <h1>All the users</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>

                <td>

                    <!-- delete the user (uses the destroy method DESTROY /users/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the user (uses the show method found at GET /users/{id} -->
                    <a class="btn btn-small btn-success" href="{{ url('users/' . $user->id) }}">Show this User</a>

                    <!-- edit this user (uses the edit method found at GET /users/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ url('users/' . $user->id . '/edit') }}">Edit this User</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop