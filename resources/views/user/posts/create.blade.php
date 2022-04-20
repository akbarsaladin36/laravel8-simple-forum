@extends('master')
@section('title', 'Create A Post')
@section('content')
    <div class="mt-5 text-center">
        <h3>Create A Post</h3>
    </div>

    <div class="mt-5">
        <form action="{{ route('user.store.post') }}" method="post">
            @csrf
            <div class="form-group mt-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="body">Body</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
@endsection