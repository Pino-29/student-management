@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <h1 class="mb-4">Student Details</h1>

      <ul class="list-group list-group-flush mb-4">
        <li class="list-group-item">
          <strong>Name:</strong> {{ $student->name }}
        </li>
        <li class="list-group-item">
          <strong>Email:</strong> {{ $student->email }}
        </li>
        <li class="list-group-item">
          <strong>Birthday:</strong> {{ \Carbon\Carbon::parse($student->birthday)->format('F j, Y') }}
        </li>
        <li class="list-group-item">
          <strong>City:</strong> {{ $student->city }}
        </li>
      </ul>

      <div class="d-flex">
        <a href="{{ route('students.edit', $student) }}"
           class="btn btn-warning me-2">
          <i class="bi bi-pencil-fill"></i> Edit
        </a>
        <form action="{{ route('students.destroy', $student) }}"
              method="POST"
              onsubmit="return confirm('Delete this student?')">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">
            <i class="bi bi-trash-fill"></i> Delete
          </button>
        </form>
        <a href="{{ route('students.index') }}"
           class="btn btn-secondary ms-auto">
          <i class="bi bi-arrow-left"></i> Back to List
        </a>
      </div>
    </div>
  </div>
</div>
@endsection