@extends('master')
@section('title', 'Home')
@section('content')

<div class="mt-5 text-center">
    <h3>Home</h3>
</div>

<a href="{{ route('user.create.post') }}" class="btn btn-primary mt-3">New Post</a>

<table class="table table-bordered mt-5">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Post Title</th>
        <th scope="col">Created By</th>
        <th scope="col">Comments</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $no++ }}</td>
                <td><a href="{{ route('user.show.post', ['postId'=>$post->id]) }}">{{ $post->title }}</a></td>
                <td>{{ $post->user->username }}</td>
                <td>{{ $post->postComment->count() }}</td>
            </tr>
        @endforeach
    </tbody>
  </table>



@endsection