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
        <th scope="col">Likes</th>
      </tr>
    </thead>
    <tbody>
        @if (!$posts->count())
          <tr>
            <td colspan="4"><p class="text-center mt-3">There is no posts in your home page. Please become a first user to create a new post!</p></td>
          </tr>
        @else
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td><a href="{{ route('user.show.post', ['postId'=>$post->id]) }}">{{ $post->title }}</a></td>
                    <td><a href="{{ route('user.show.profile',['username'=>$post->user->username]) }}">{{ $post->user->username }}</a></td>
                    <td>{{ $post->postComment->count() }}</td>
                    <td>{{ $post->likes->count() }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
  </table>



@endsection