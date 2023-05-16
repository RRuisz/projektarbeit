@extends('layouts.default')

@section('title', 'Neuen Task anlegen')

@section('content')
<div class="container mt-5">
    <div class="page-header mt-5">
        <div class="container mt-5  h-100">
            {{-- TODO: ROUTE! --}}
            <a href="{{ route('engineering')}}" class="btn btn-primary mb-3">Zurück zur Übersicht</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" class="form-control bg-dark p-5 mt-5">
                            <h1 class="text-center mb-5 text-info">Neue Checklist-Kategorie anlegen</h1>
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="name" class="text-white col-form-label text-md-right">Name</label>
                                    <input id="name" type="text" class="form-control bg-secondary text-white" name="name" value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-12 form-outline">
                                <label for="taskcategory_id" class="form-label text-white">Aufgabenbereich</label>
                                <select class="form-control bg-secondary text-white" name="department_id">
                                    @foreach($departments as $department)
                                    <option class="form-control bg-secondary text-white" value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                                </select>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="form-control btn btn-primary mt-3" value="Speichern">
                                </div>

                            
                        </form>

    </div>

@endsection