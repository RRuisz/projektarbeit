@extends('layouts.default')

@section('title', 'Userpanel')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-secondary ">
                        <h3 class="card-title text-center">Userpanel</h3>
                  {{-- TODO: DESIGN!!! --}}
                    </div>
                    <div class="card-body bg-dark">
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="container mt-4">
                                        <div class="row text-center fs-3 text-secondary">
                                            <p class=""> Name: {{ Auth::user()->name }} </p>
                                            <p> Email: {{ Auth::user()->email }} </p>
                                            <p> Geburtsdatum: {{ \Carbon\Carbon::parse(Auth::user()->birthdate)->format('d.m.Y') }} </p>
                                            <p> Abteilung: {{ $department->name }} </p>
                                        </div>
                                    </div>
                                    <div class="container mt-3 mb-3">
                                        <a href="{{ route('user.update') }}" class="btn btn-primary">Daten ändern</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection