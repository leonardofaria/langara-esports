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
                    <th></th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td><img src="{{ $admin->user()->first()->avatar() }}" alt="{{ $admin->user()->first()->name }}" class="avatar" /></td>
                    <td>
                        {{ $admin->user()->first()->name }}
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