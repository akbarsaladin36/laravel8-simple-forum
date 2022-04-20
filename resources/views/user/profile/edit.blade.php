@extends('master')
@section('title', 'Edit Profile')
@section('content')
    <div class="mt-5 text-center">
        <h3>Edit Profile</h3>
    </div>

    <form action="{{ route('user.update.profile', ['username'=>$user->username]) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="mt-3 text-center">
            <button type="submit" class="btn btn-success">Update Profile</button>
        </div>
        
        <div class="row mt-3 text-center">
            <div class="col">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $user->first_name }}">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $user->last_name }}">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}">
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $user->phone_number }}">
                </div>
            </div>
        </div>
    </form>

@endsection