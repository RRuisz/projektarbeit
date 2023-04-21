@extends('layouts.default')

@section('title', 'Newspost')

@section('content')
<div class="container mt-5  h-100">
    <a href="{{ route('engineering')}}" class="btn btn-primary">Zurück</a>
      <div class="row">
          <div class="col-lg-12">
            <h1 class="display-3 font-weight-bold text-center text-gray-dark mb-5">{{ $task->name}} </h1>
          </div>
          <div class="col-lg-12">
            <h1 class="display-6 font-weight-bold text-gray-dark mb-5">{{ $task->description }} </h1>
          </div>
          <div class="col-lg-3">
            <p class="">Erstellt am: {{$task->creat_date}} </p>
             <p>   von: {{ $task->name }} </p>
          </div>

          
@endsection