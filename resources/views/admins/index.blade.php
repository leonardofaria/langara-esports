@extends('app')

@section('content')
    <h1>All the admins</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($admins as $admin)
            <tr>
                <td>{{ $admin->id }}</td>
                <td>{{ $admin->user()->first()->name }}</td>

                <td>

                    <!-- delete the admin (uses the destroy method DESTROY /admins/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the admin (uses the show method found at GET /admins/{id} -->
                    <a class="btn btn-small btn-success" href="{{ url('admins/' . $admin->id) }}">Show this Admin</a>

                    <!-- edit this admin (uses the edit method found at GET /admins/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ url('admins/' . $admin->id . '/edit') }}">Edit this Admin</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop