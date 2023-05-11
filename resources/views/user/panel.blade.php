@extends('layouts.default')

@section('title', 'Userpanel')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title  text-center">Userpanel</h3>
                  
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title  text-center">Übersicht</h3>
                                    </div>
                                    <div class="container">
                                        <div class="row text-center fs-3">
                                            <p class=""> Name: {{ Auth::user()->name }} </p>
                                            <p> Email: {{ Auth::user()->email }} </p>
                                            <p> Geburtsdatum: {{ Auth::user()->birthdate }} </p>
                                            <p> Abteilung: {{ $department->name }} </p>
                                        </div>
                                    </div>
                                    <div class="container mt-5 mb-3">
                                        <a href="{{ route('user.change', Auth::user()->id) }}" class="btn btn-primary">Daten ändern</a>
                                    </div>
                                    @if (Auth::user()->role_id == 2)
                                    <div class="container mb-3">
                                        <a href="{{ route('user.overview', Auth::user()->department_id) }}" class="btn btn-primary">Alle Mitarbeiter der Abteilung</a>
                                    </div>
                                    @endif
                                    @if (Auth::user()->role_id == 1)
                                    <div class="container mb-3">
                                        <a href="{{ route('admin.all') }}" class="btn btn-primary">Übersicht aller Mitarbeiter</a>
                                    </div>
                                    @endif
                                    @if (Auth::user()->role_id == 1)
                                    <div class="container mb-3">
                                        <a href="{{ route('admin.register') }}" class="btn btn-primary">Neuen Mitarbeiter anlegen</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection