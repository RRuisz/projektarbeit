@extends('layouts.default')

@section('title', 'Neue Aufgabe anlegen')

@section('content')
<div class="container mt-5">
    <div class="page-header mt-5">
        <div class="container mt-5  h-100">
            <a href="{{ route('engineering')}}" class="btn btn-primary mb-3">Zurück zur Übersicht</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" class="form-control bg-dark p-5 mt-5">
                            <h1 class="text-center mb-5 text-info">Neue Aufgabe anlegen</h1>
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="name" class="text-white col-form-label text-md-right">Überschrift</label>
                                    <input id="name" type="text" class="form-control bg-secondary text-white" name="name" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-12 form-outline">
                                    <label for="name" class="col-form-label text-md-right text-white ">Beschreibung:</label>
                                    <textarea class="form-control bg-secondary text-white" id="textAreaExample1" name="description" rows="6"></textarea>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="form-control btn btn-primary mt-3" value="Speichern">
                                </div>

                            
                        </form>

    </div>

@endsection