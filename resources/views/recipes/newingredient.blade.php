@extends('layouts.default')

@section('title', 'Neue Zutat anlegen')

@section('content')
<div class="container mt-5 p-5">
    <a href="{{ url()->previous() }}" class="btn btn-primary">Zurück</a>
    <h1 class="text-center mb-5">Neue Zutat anlegen</h1>
    <form method="POST" class="form-control bg-dark p-5 mt-5">
        @csrf
        <label for="name" class="form-label text-white">Name</label>
        <input type="text" class="form-control bg-secondary text-white" name="name" id="name" placeholder="Name" value="{{old('name')}}" required>
        <label for="price" class="form-label text-white">Preis pro Einheit</label>
        <input type="number" class="form-control bg-secondary text-white" name="price" id="price" value="{{old('price')}}" step="any" required>
        <label for="amount" class="form-label text-white">Menge pro Einheit</label>
        <input type="number" class="form-control bg-secondary text-white" name="amount" id="amount" value="{{old('amount')}}" required>
        <label for="measure" class="form-label text-white">Maßeinheit</label>
        <input type="text" class="form-control bg-secondary text-white" name="measure" id="measure" value="{{old('measure')}}" required>
        <input type="submit" class="btn btn-primary mt-3" value="Save">
    </form>
@endsection

@section('script')
@endsection