@extends('layouts.auth')
@section('title', 'Login')
@section('content')
<h3 class="text-center mb-4">Login</h3>
<form method="POST" action="{{ route('login') }}">
  @csrf
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input type="password" name="password" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-primary w-100">Login</button>
  <div class="text-center mt-3">
    <a href="#">Forgot Password?</a>
  </div>
</form>
@endsection
