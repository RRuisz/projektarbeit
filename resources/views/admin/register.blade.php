@extends('layouts.default')

@section('title', 'Neuen Mitarbeiter anlegen')

@section('content')
    <div class="container mt-5 p-5">
        <h1 class="text-center mb-5">Neuen Mitarbeiter anlegen</h1>
        <form action="{{ route('admin.save') }}" method="POST" class="form-control p-5">
            @csrf
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            <label for="Birthdate" class="form-label">Birthdate</label>
            <input type="date" class="form-control" name="birthdate" id="birthdate" required>
            <label for="role" class="form-label">Role</label>
            <select class="form-control" name="role_id" id="role"> 
                @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <label for="department" class="form-label">Department</label>
            <select class="form-control" name="department_id" id="department">
                @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
            <input type="submit" class="btn btn-primary mt-3" value="Save">
        </form>
@endsection