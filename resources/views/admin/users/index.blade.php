@extends('layouts.admin')


@section('content')
    <h1>Users</h1>
    
    @if(session()->has('delete-user'))
        <p class="alert alert-danger">{{session('delete-user')}}</p>

    @elseif(session()->has('create-user'))
        <p class="alert alert-success">{{session('create-user')}}</p>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
               
            </tr>
        </thead>
        <tbody>
            @if($users)
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>

                    <td><img src="{{$user->photo ? $user->photo->file: 'http://placehold.it/400x400'}}" alt="photo" height="50"></td>
                    <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active == 1 ? 'Active': 'Disable'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>
                @endforeach
            @endif           
        </tbody>
        </table>
@stop