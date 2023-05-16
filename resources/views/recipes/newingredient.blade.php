@extends('layouts.default')

@section('title', 'Neue Zutat anlegen')

@section('content')
<div class="container mt-5 p-5">
    <a href="{{ back() }}" class="btn btn-primary">Zurück zur Übersicht</a>
    <h1 class="text-center mb-5">Neue Zutat anlegen</h1>
    <form method="POST" class="form-control p-5">
        @csrf
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{old('name')}}" required>
        <label for="price" class="form-label">Preis pro Einheit</label>
        <input type="number" class="form-control" name="price" id="price" value="{{old('price')}}" step="any" required>
        <label for="amount" class="form-label">Menge pro Einheit</label>
        <input type="number" class="form-control" name="amount" id="amount" value="{{old('amount')}}" required>
        <label for="measure" class="form-label">Maßeinheit</label>
        <input type="text" class="form-control" name="measure" id="measure" value="{{old('measure')}}" required>
        <input type="submit" class="btn btn-primary mt-3" value="Save">
    </form>
@endsection

@section('script')
@endsection