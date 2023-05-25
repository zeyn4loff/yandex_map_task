@extends('layouts.site')
@section('content')
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="card card-sign">
        <div class="card-header">
          <h3 class="card-title">Sign In</h3>
          <p class="card-text">Welcome back! Please signin to continue.</p>
        </div><!-- card-header -->
        <div class="card-body">
          <form action="{{ route('login.post') }}" method="post">
            @csrf
            @if ($message = Session::get('message'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {!! Session::get('message') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <div class="mb-4">
              <label class="form-label">Email address</label>
              <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                     placeholder="Enter your email address" value="{{ old('email') }}">
              @error('email')
              <small class="form-text text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="mb-4">
              <label class="form-label d-flex justify-content-between">Password</label>
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                     placeholder="Enter your password">
              @error('password')
              <small class="form-text text-danger">{{ $message }}</small>
              @enderror
            </div>
            <button class="btn btn-primary btn-sign">Sign In</button>
          </form>
        </div><!-- card-body -->
        <div class="card-footer">
          Don't have an account? <a href="{{ route('register.get') }}">Create an Account</a>
        </div><!-- card-footer -->
      </div><!-- card -->
    </div>
  </div>
@endsection