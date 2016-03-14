@extends('app')

@section('content')
    <div class="admin">
        <a href="{{ URL::to('admins/create') }}" class="btn btn-primary pull-right"><span class="ion-ios-plus-empty"></span></a>

        <h2>All the admins</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td>
                        {{ $admin->user()->first()->name }}
                    </td>
                    <td>
                        {!! Form::open(['action' => ['AdminsController@destroy', $admin->id], 'method' => 'delete']) !!}
                            {!! Form::button('<span class="ion-trash-a"></span>', ['class'=> 'btn btn-danger', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@stop