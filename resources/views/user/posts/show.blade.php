@extends('master')
@section('title', 'Post Detail')
@section('content')
    <div class="mt-5">
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->body }}</p>
    </div>

    <ul class="list-group list-group-horizontal">
        <li class="list-group-item">
            <a href='{{ route('user.like.post',['postId'=>$post->id]) }}' class="btn btn-primary">{{ $post->is_liked() ? 'unlike' : 'like' }}</a>
        </li>
    </ul>

    <div class="mt-5">
        <h3>Comments</h3>
        <div class="mt-3">
            <form action="{{ route('user.store.comment', ['postId'=>$post->id]) }}" method="post">
                @csrf
                <textarea name="comment_body" id="comment_body" cols="5" rows="5" class="form-control"></textarea>
                <button type="submit" class="btn btn-primary mt-3">Comment</button>
            </form>
        </div>

        @foreach ($comment as $comments)
            <div class="mt-3">
                <b>{{ $comments->user->username }}</b>
                <p>{{ $comments->comment_body }}</p>
            </div>
        @endforeach
    </div>
@endsection