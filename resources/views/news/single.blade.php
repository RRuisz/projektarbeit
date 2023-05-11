@extends('layouts.default')

@section('title', 'Newspost')

@section('content')
<div class="container mt-5  h-100">
  <a href="{{ route('news')}}" class="btn btn-primary mb-3">Zurück zur Übersicht</a>
    <div class="row">
      <div class="card">
        <div class="card-header">
        <div class="col-lg-12">
          <h1 class="text-gray-dark mb-3">{{ $post->topic}} </h1>
          <p class="text-gray-dark mb-1 font-weight-bold">Erstellt am: {{ $post->created_at }}</p>
          <p class="text-gray-dark mb-2 font-weight-bold">von: {{ $post->user->name }}</p>
        </div>
        </div>
        <div class="card-body mt-2" style="background-color: #f5f5f5">
        <div class="">
          <p class="display-6 font-weight-bold text-gray-dark p-5">{{ $post->content }} </p>
        </div>
        </div>
        <div class="mt-3">
          @if(Auth::user()->role_id <= 2 || Auth::user()->id == $post->user_id)
          <button type="button" id="delete-btn" class="btn btn-primary">Löschen</button>
          <a href="{{ route('news.update', $post->id) }}" class="btn btn-primary "> Bearbeiten </a>
          @endif 
        </div>
        <div id="deletebutton" class="mb-3" style="display: none;">
          <p>möchten Sie diesen Beitrag endgültig löschen?</p>
          <button type="button" class="btn btn-primary"><a class="text-white" href="{{route('news.delete', $post->id)}}">Ja!</a></button>
          <button type="button" id="no-btn" class="btn btn-primary">Nein!</button>
        </div>
      

          
@endsection

@section('scripts')
<script>
let delBtn = document.getElementById('delete-btn');
let delDiv = document.getElementById('deletebutton');
let noBtn = document.getElementById('no-btn');

delBtn.addEventListener('click', deleteContent);
noBtn.addEventListener('click', clearDiv);

function deleteContent() {
  delDiv.style.display = 'block';
}

function clearDiv() {
  delDiv.style.display = 'none';
}
</script>
@endsection