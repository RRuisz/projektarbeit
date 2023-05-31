@extends('layouts.default')

@section('title', 'neue Kategory')

@section('content')
<div class="container mt-5 p-5">
    <a href="{{ url()->previous() }}" class="btn btn-primary">Zurück</a>
    <h1 class="text-center mb-5">Neue Rezept Kategorie anlegen</h1>
    <form method="POST" class="form-control bg-dark p-5 mt-5">
        @csrf
        <label for="name" class="form-label text-white">Name</label>
        <input type="text" class="form-control bg-secondary text-white" name="name" id="name" placeholder="Name" value="{{old('name')}}" required>
        <input type="submit" class="btn btn-primary mt-3" value="Save">
    </form>
@endsection