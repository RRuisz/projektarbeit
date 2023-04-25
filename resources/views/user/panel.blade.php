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
                                            <p class=""> Name: {{ $user->name }} </p>
                                            <p> Email: {{ $user->email }} </p>
                                            <p> Geburtsdatum: {{ $user->birthdate }} </p>
                                            <p> Abteilung: {{ $department->name }} </p>
                                        </div>
                                    </div>
                                    <div class="container mt-5 mb-3">
                                        <a href="{{ route('user.change', $user->id) }}" class="btn btn-primary">Daten ändern</a>
                                    </div>
                                    @if ($user->role_id == 2)
                                    <div class="container mb-3">
                                        <a href="{{ route('user.overview', $user->department_id) }}" class="btn btn-primary">Alle Mitarbeiter der Abteilung</a>
                                    </div>
                                    @endif
                                    @if ($user->role_id == 1)
                                    <div class="container mb-3">
                                        <a href="{{ route('user.all') }}" class="btn btn-primary">Übersicht aller Mitarbeiter</a>
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