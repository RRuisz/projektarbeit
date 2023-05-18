@extends('layouts.default')

@section('title', 'Neuen Task anlegen')

@section('content')
<div class="container mt-5">
    <div class="page-header mt-5">
        <div class="container mt-5  h-100">
            <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">Zurück</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-5">Neue Checklist-Aufgabe für {{$taskcategory[0]->department->name}} anlegen</h1>
            <form method="POST" class="form-control bg-dark p-5 mt-5">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="name" class="text-white col-form-label text-md-right">Name</label>
                                    <input id="name" type="text" class="form-control bg-secondary text-white" name="name" value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-12 form-outline">
                                <label for="taskcategory_id" class="form-label text-white">Aufgabenbereich</label>
                                <select class="form-control bg-secondary text-white" name="taskcategory_id">
                                    @foreach($taskcategory as $category)
                                    <option class="form-control bg-secondary text-white" value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                </select>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="form-control btn btn-primary mt-3" value="Speichern">
                                </div>

                            
                        </form>

    </div>

@endsection