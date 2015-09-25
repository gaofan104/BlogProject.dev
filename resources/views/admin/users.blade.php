@extends('app')

@section('content')

    <h2>
        User Management
    </h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
            <tr>
                <th>Username</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Date/Time Added</th>
                <th>Date/Time deleted</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->username}}</td>
                    <td>{{ $user->firstname }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>
                        @if ($user->deleted_at != null)
                        {{ $user->deleted_at->format('F d, Y h:ia') }}
                        @endif
                    </td>
                    <td>
{{--
                        <a href="/user/{{ $user->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
--}}
                        {!! Form::model($user, ['method' => 'POST', 'action' => ['Admin\UsersController@deleteUser', $user->id]]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>

    <a href="/user/create" class="btn btn-success">Add User</a>

@stop