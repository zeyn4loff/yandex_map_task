@extends('layouts.site')
@section('content')
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="card card-sign">
        <div class="card-header">
          <h3 class="card-title">Sign Up</h3>
          <p class="card-text">It's free to signup and only takes a minute.</p>
        </div><!-- card-header -->
        <div class="card-body">
          <form action="{{ route('register.post') }}" method="post">
            @csrf
            <div class="mb-4">
              <label class="form-label">Name</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                     placeholder="Enter your name" value="{{ old('name') }}">
              @error('name')
              <small class="form-text text-danger">{{ $message }}</small>
              @enderror
            </div>
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
            <div class="mb-4">
              <label class="form-label d-flex justify-content-between">Confirm password</label>
              <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"
                     placeholder="Confirm password">
              @error('password_confirmation')
              <small class="form-text text-danger">{{ $message }}</small>
              @enderror
            </div>
            <button class="btn btn-primary btn-sign">Create Account</button>
          </form>
        </div><!-- card-body -->
      </div><!-- card -->
    </div>
  </div>




@endsection