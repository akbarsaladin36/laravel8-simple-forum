@extends('master')
@section('title', 'Profile Information')
@section('content')
    <div class="mt-5 text-center">
        <h3>Profile Information</h3>
    </div>

    <div class="mt-3 text-center">
        <a href="{{ route('user.edit.profile',['username'=>$user->username]) }}" class="btn btn-primary">Edit Profile</a>
    </div>
    
    <div class="row mt-3 text-center">
        <div class="col">
            <b>First Name</b>
            <p>{{ $user->first_name }}</p>
            <b>Address</b>
            <p>{{ $user->address }}</p>
        </div>
        <div class="col">
            <b>Last Name</b>
            <p>{{ $user->last_name }}</p>
            <b>Phone Number</b>
            <p>{{ $user->phone_number }}</p>
        </div>
    </div>

@endsection