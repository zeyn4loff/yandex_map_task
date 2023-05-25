@extends('layouts.site')
@section('content')
  <div class="container py-5">
    <div class="row g-3">
      <div class="col-xl-6">
        <div class="card card-one">
          <form action="{{ route('location.update', $location) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-header">
              <h6 class="card-title">Add location</h6>
              <nav class="nav nav-icon nav-icon-sm ms-auto">
                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
              </nav>
            </div><!-- card-header -->
            <div class="card-body p-3">
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                       placeholder="Enter name" value="{{ $location->name }}">
                @error('name')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Longitude</label>
                <input type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror"
                       placeholder="Enter longitude" value="{{ $location->longitude }}">
                @error('longitude')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Latitude</label>
                <input type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror"
                       placeholder="Enter latitude" value="{{ $location->latitude }}">
                @error('latitude')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>
          </form>
        </div><!-- card -->
      </div><!-- col -->
    </div>
  </div>
@endsection