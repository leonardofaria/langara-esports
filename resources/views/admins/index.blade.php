@extends('app')

@section('content')
    <div class="admin">
        <a href="{{ URL::to('admins/create') }}" class="btn btn-primary pull-right new">
            <span class="ion-ios-plus-empty"></span>
            <span>New admin</span>
        </a>

        <h2>All the admins</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="image"></th>
                    <th>Name</th>
                    <th class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td>
                        <a href="/users/{{ $admin->user->id }}">
                            <img src="{{ $admin->user->avatar() }}" alt="{{ $admin->user->name }}" class="avatar" />
                        </a>
                    </td>
                    <td>
                        <a href="/users/{{ $admin->user->id }}">
                            {{ $admin->user()->first()->name }}
                        </a>
                    </td>
                    <td>
                        {!! Form::open(['action' => ['AdminsController@destroy', $admin->id], 'method' => 'delete']) !!}
                            {!! Form::button('<span class="ion-trash-a"></span>', ['class'=> 'btn btn-danger', 'type' => 'submit', 'onclick' => 'return confirm("Are you sure?");']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@stop