@extends('layouts.default')

@section('title', 'Neuen Mitarbeiter anlegen')

@section('content')
    <div class="container mt-5 p-5">
        <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">Zurück</a>
        <h1 class="text-center mb-5">Mitarbeiter Daten ändern</h1>
        <form method="POST" class="form-control p-5">
            @csrf
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" required>
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" required>
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
            <label for="Birthdate" class="form-label">Birthdate</label>
            <input type="date" class="form-control" name="birthdate" value="{{$user->birthdate}}" id="birthdate" required>
            <label for="role" class="form-label">Role</label>
            <select class="form-control" name="role_id" id="role"> 
                @foreach ($roles as $role)
                @if($role->id == $user->role_id)
                <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                @else
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endif
                @endforeach
            </select>
            <label for="department" class="form-label">Department</label>
            <select class="form-control" name="department_id" id="department">
                @foreach ($departments as $department)
                @if($department->id == $user->department_id)
                <option value="{{ $department->id }}" selected>{{ $department->name }}</option>
                @else 
                <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endif
                @endforeach
            </select>
            <input type="submit" class="btn btn-primary mt-3" value="Save">
        </form>
@endsection