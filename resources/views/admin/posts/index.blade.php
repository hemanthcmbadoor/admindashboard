@extends('layouts.admin')


@section('content')
    <h1>Posts</h1>
    @if(session()->has('create-post'))
        <p class="alert alert-danger">{{session('create-post')}}</p>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Owner</th>
                <th scope="col">Photo</th>
                <th scope="col">Category</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Create At</th>
                <th scope="col">Updated At</th>
            </tr>
        </thead>
        <tbody>
            @if($posts)
                @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user->name}}</td>
                    <td><img height="40" src="{{$post->photo ? $post->photo->file :'http://placehold.it/400x400'}} " alt="photo"></td>
                    <td>{{$post->category ? $post->category->name : 'UnCategorized'}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
                @endforeach
            @endif           
        </tbody>
        </table>

@stop