@extends('user.layout.master')
@section('Title')
  <h1 align="center" class="mt-5 mb-5">Edit Profile</h1>
@endsection

@section('content')
  <form class="" action="{{ route('user.update', ['id' => $user->id])}}" method="post">
    {{--  --}}
    @csrf
    <div class="form-group">
      <input type="text" name="name" value="{{{ $user->name }}}" placeholder="Enter Your Name" class="form-control">
    </div>
    @error('name')
      <span class="text-danger">{{ $message }}</span>
    @enderror

    <div class="form-group">
      <input type="email" name="email" value="{{{ $user->email }}}" placeholder="Enter Your Email" class="form-control">
    </div>
    @error('email')
      <span class="text-danger">{{ $message }}</span>
    @enderror

    {{-- <div class="form-group">
      <input type="password" name="password" value="" placeholder="Enter Your Password" class="form-control">
    </div>
    @error('email')
      <span class="text-danger">{{ $message }}</span>
    @enderror

    <div class="form-group">
      <input type="password" name="password_confirmation" value="" placeholder="Confirm Your Password" class="form-control">
    </div>
    @error('email')
      <span class="text-danger">{{ $message }}</span>
    @enderror --}}
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Update Profile">
    </div>

  </form>

@endsection
