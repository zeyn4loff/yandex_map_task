@extends('layouts.site')
@section('content')
  <div class="container py-5">
    @if (Session::get('success') || Session::get('error'))
      <div class="alert alert-{{ Session::get('success') ? 'success' : 'danger' }} alert-dismissible fade show" role="alert">
        {!! Session::get('success') ?? Session::get('error') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="row g-3">
      <div class="col-6">
        <div class="col mb-3">
          <div class="card card-one">
            <form action="{{ route('location.store') }}" method="post">
              @csrf
              <div class="card-header">
                <h6 class="card-title">Add location</h6>
                <nav class="nav nav-icon nav-icon-sm ms-auto">
                  <button type="submit" class="btn btn-primary btn-sm">Add</button>
                </nav>
              </div><!-- card-header -->
              <div class="card-body p-3">
                <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                         placeholder="Enter name" value="{{ old('name') }}">
                  @error('name')
                  <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label">Longitude</label>
                  <input type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror"
                         placeholder="Enter longitude" value="{{ old('longitude') }}">
                  @error('longitude')
                  <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label">Latitude</label>
                  <input type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror"
                         placeholder="Enter latitude" value="{{ old('latitude') }}">
                  @error('latitude')
                  <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </form>
          </div><!-- card -->
        </div><!-- col -->
        <div class="col">
          <div class="card card-one">
            <div class="card-header">
              <h6 class="card-title">Locations list</h6>
            </div><!-- card-header -->
            <div class="card-body p-3">
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Longitude</th>
                  <th scope="col">Latitude</th>
                  <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($locations as $location)
                  <tr id="{{ $location->id }}">
                    <td class="text-primary" role='button'>{{ $location->name }}</td>
                    <td>{{ $location->longitude }}</td>
                    <td>{{ $location->latitude }}</td>
                    <td>
                      <div class="d-inline-flex">
                        <a href="{{ route('location.edit', $location->id) }}" type="button"
                           class="btn btn-primary btn-sm">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                               class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                          </svg>
                        </a>
                        <form action="{{ route('location.destroy', $location) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm ms-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-trash" viewBox="0 0 16 16">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                            </svg>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div><!-- card -->
        </div><!-- col -->
      </div>
      <div class="col-6">
        <div class="col-xl-12">
          <div class="card card-one">
            <div class="card-header">
              <h6 class="card-title">Map</h6>
            </div><!-- card-header -->
            <div class="card-body p-3">
              <div id="map" class="map"></div>
            </div>
          </div><!-- card -->
        </div>
      </div>
    </div>
  </div>
@endsection