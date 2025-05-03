@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <h1 class="mb-4">Edit Student</h1>

      <form action="{{ route('students.update', $student) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-floating mb-3">
          <input type="text"
                 class="form-control"
                 id="name"
                 name="name"
                 placeholder="Name"
                 value="{{ old('name', $student->name) }}">
          <label for="name">Name</label>
          @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>

        <div class="form-floating mb-3">
          <input type="email"
                 class="form-control"
                 id="email"
                 name="email"
                 placeholder="Email"
                 value="{{ old('email', $student->email) }}">
          <label for="email">Email</label>
          @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>

        <div class="form-floating mb-3">
          <input type="date"
                 class="form-control"
                 id="birthday"
                 name="birthday"
                 placeholder="Birthday"
                 value="{{ old('birthday', $student->birthday) }}">
          <label for="birthday">Birthday</label>
          @error('birthday')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>

        <div class="form-floating mb-4">
          <input type="text"
                 class="form-control"
                 id="city"
                 name="city"
                 placeholder="City"
                 value="{{ old('city', $student->city) }}">
          <label for="city">City</label>
          @error('city')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>

        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary me-2">Update</button>
          <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </form>

    </div>
  </div>
</div>
@endsection