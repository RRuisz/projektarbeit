@extends('layouts.default')

@section('title', 'Userpanel')

@section('content')
    <div class="container mt-5  h-100">
        <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">Zurück</a>
            <div class="row">
                <div class="col-2"></div>
              <div class="card col-8">
                  <div class="card-header">
                    <div class="">
                        <h1 class="text-gray-dark mb-3 text-center">Userpanel</h1>
                    </div>
                    </div>
                <div class="card-body mt-2" style="background-color: #f5f5f5">
                <div class="">
                  <p class="display-6  text-gray-dark text-center mb-3">Name: {{ Auth::user()->name }} </p>
                  <p class="display-6  text-gray-dark text-center mb-3"> Email: {{ Auth::user()->email }} </p>
                  <p class="display-6  text-gray-dark text-center mb-3"> Geburtsdatum: {{ \Carbon\Carbon::parse(Auth::user()->birthdate)->format('d.m.Y') }} </p>
                  <p class="display-6  text-gray-dark text-center mb-3"> Abteilung: {{ $department->name }} </p>
                </div>
                <div class="container mt-5 mb-3">
                    <a href="{{ route('user.update') }}" class="btn btn-primary">Daten ändern</a>
                </div>
        
@endsection