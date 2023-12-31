@extends('layouts.default')

@section('title', $user->name)

@section('content')
<div class="container mt-5">
    <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">Zurück</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
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
                                        <p> Email:<a href="mailto: {{ $user->email }} ">{{ $user->email }} </a> </p>
                                        <p> Geburtsdatum: {{ \Carbon\Carbon::parse($user->birthdate)->format('d.m.Y') }} </p>
                                        <p> Abteilung: {{ $user->department->name }} </p>
                                    </div>
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