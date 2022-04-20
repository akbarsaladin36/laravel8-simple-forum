@extends('master')
@section('title', 'Login')
@section('content')

<div class="mt-5 text-center">
    <h3>Login</h3>
</div>

<div class="mx-auto w-25 h-25 mt-5">
    <form action="{{ route('auth.login.store') }}" method="post" class="mx-auto">
        @csrf
        <div class="form-group mt-3">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group mt-3">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary form-control mt-4">Login</button>
    </form>
</div>

@endsection