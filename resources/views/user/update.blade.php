@extends('layouts.default')

@section('title', 'Daten ändern')

@section('content')
<div class="container mt-5 p-5">
    <a href="{{route('admin.all')}}" class="btn btn-primary">Zurück zur Übersicht</a>
    
    <h1 class="text-center mb-5">Mitarbeiter Daten ändern</h1>
    <form method="POST" class="form-control p-5 bg-dark">
        @csrf
        <label for="name" class="form-label text-white">Name</label>
        <input type="text" class="form-control bg-secondary text-white" name="name" id="name" value="{{$user->name}}" required>
        <label for="email" class="form-label text-white">Email</label>
        <input type="email" class="form-control bg-secondary text-white" name="email" id="email" value="{{$user->email}}" required>
        <label for="password" class="form-label text-white">Password</label>
        <input type="password" class="form-control bg-secondary text-white" name="password" id="password">
        <label for="Birthdate" class="form-label text-white">Birthdate</label>
        <input type="date" class="form-control bg-secondary text-white" name="birthdate" value="{{$user->birthdate}}" id="birthdate" required>
        <input type="submit" class="btn btn-primary mt-3" value="Save">
    </form>
@endsection