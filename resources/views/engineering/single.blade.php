@extends('layouts.default')

@section('title', 'Newspost')

@section('content')
<div class="container mt-5  h-100">
    <a href="{{ route('engineering')}}" class="btn btn-primary mb-3">Zurück</a>
      <div class="row">
        <div class="card">
          <div class="card-header">
          <div class="col-lg-12">
            <h1 class="text-gray-dark mb-3">{{ $task->name}} </h1>
            <p class="text-gray-dark mb-1 font-weight-bold">Erstellt am: {{ $task->created_at }}</p>
            <p class="text-gray-dark mb-2 font-weight-bold">von: {{ $task->user->name }}</p>
          </div>
          </div>
          <div class="card-body mt-2" style="background-color: #f5f5f5">
          <div class="">
            <p class="display-6 font-weight-bold text-gray-dark p-5">{{ $task->description }} </p>
          </div>
          </div>
          <div class="card-footer">
 
            <h2 class=""> Kommentare:</h2>
            @foreach ($task->taskcomment as $comment)
            <div class="card-footer-item" style="background-color: #f5f5f5">
              <p class="font-weight-bold text-gray-dark" style="font-size: 1.5rem;"> {{ $comment->description }} </p>
              <p class="font-weight-bold text-gray-dark"> von: {{ $comment->user->name }} </p>
            </div>
            @endforeach
              <hr>
            @if ($task->status == 0)
            <p class="text-gray-dark mb-3">Neues Kommentar: </p>
            <form method="POST" class="form-control">
              @csrf
              <textarea class="form-control mb-1" rows="3" id="description" name="description"></textarea>
              <label for="status" class="font-weight-bold text-gray-dark">Status</label>
              <select class="form-control mb-5" id="status" name="status">
                <option value="1">Erledigt</option>
                <option value="0">Noch Offen</option>
              </select>
              <input type="submit" class="form-control btn btn-primary" value="Speichern">
              @endif
          
@endsection