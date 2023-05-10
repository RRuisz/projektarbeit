@extends('layouts.default')

@section('title', 'Neue Aufgabe anlegen')

@section('content')
    <div class="page-header mt-5">
        <h3 class="text-center"></h3>
    </div>
    <div class="container mt-5">
        <div class="container mt-5  h-100">
            <a href="{{ route('handover')}}" class="btn btn-primary mb-3">Zurück zur Übersicht</a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" class="form-control bg-dark p-5 mt-5">
                            <h1 class="text-center mb-5 text-info">Neue Aufgabe anlegen</h1>
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="headline" class="text-white col-form-label text-md-right">Überschrift</label>
                                    <input id="headline" type="text" class="form-control bg-secondary text-white" name="headline" value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-12 form-outline">
                                    <label for="content" class="col-form-label text-md-right text-white ">Beschreibung:</label>
                                    <textarea class="form-control bg-secondary text-white" id="textAreaExample1" name="content" rows="6"></textarea>
                                </div>
                                <div class="col-md-12 form-outline">
                                    <label for="name" class="col-form-label text-md-right text-white mt-3">Abteilung:</label>
                                    @if(Auth::user()->role_id == 3)
                                    <select class="form-control bg-dark text-white " id="department" name="department">
                                        <option value="{{ Auth::user()->department_id }}" selected>{{ $userdepartment[0]->name }}</option>
                                    @elseif(Auth::user()->role_id <= 2)
                                        <select class="form-control bg-dark text-white" id="department" name="department">
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                <div class="col-md-12">
                                    <input type="submit" class="form-control btn btn-primary mt-3" value="Speichern">
                                </div>

                            
                        </form>

    </div>

@endsection