@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="card shadow-sm">
    <div class="card-body">
      <h1 class="mb-4">Create Student</h1>
      <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="John Doe" value="{{ old('name') }}">
          @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="example@mail.com" value="{{ old('email') }}">
          @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="birthday" class="form-label">Birthday</label>
          <input type="date" name="birthday" id="birthday" class="form-control" value="{{ old('birthday') }}">
          @error('birthday') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
          <label for="city" class="form-label">City</label>
          <input type="text" name="city" id="city" class="form-control" placeholder="Guadalajara" value="{{ old('city') }}">
          @error('city') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-success me-2">Save</button>
          <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection