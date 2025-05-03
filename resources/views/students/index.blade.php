@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="mb-0">Students</h1>
                <a href="{{ route('students.create') }}" class="btn btn-primary">+ Add Student</a>
            </div>
            @if($students->count())
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Birthday</th>
                            <th>City</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->birthday }}</td>
                            <td>{{ $student->city }}</td>
                            <td>
                                <a href="{{ route('students.show', $student) }}"
                                   class="btn-icon btn-info me-1">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('students.edit', $student) }}"
                                   class="btn-icon btn-warning me-1">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('students.destroy', $student) }}"
                                      method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')"
                                            class="btn-icon btn-danger">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p>No students found.</p>
            @endif
        </div>
    </div>
</div>
@endsection