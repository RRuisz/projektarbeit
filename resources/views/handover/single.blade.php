@extends('layouts.default')

@section('title', 'Übergabe')

@section('content')
<div class="container mt-5  h-100">
    <a href="{{ route('handover')}}" class="btn btn-primary mb-3">Zurück</a>
      <div class="row">
        <div class="card">
          <div class="card-header">
          <div class="col-lg-12">
            <h1 class="text-gray-dark mb-3">{{ $handover->headline}} </h1>
            <p class="text-gray-dark mb-1 font-weight-bold">Erstellt am: {{ $handover->created_at }}</p>
            <p class="text-gray-dark mb-2 font-weight-bold">von: {{ $handover->user->name }}</p>
          </div>
          </div>
          <div class="card-body mt-2" style="background-color: #f5f5f5">
          <div class="">
            <p class="display-6 font-weight-bold text-gray-dark p-5">{{ $handover->content }} </p>
          </div>
          </div>
          <div>
            @if(Auth::user()->role_id <= 2 || Auth::user()->id == $handover->user_id)
            <button type="button" id="delete-btn" class="btn btn-primary">Löschen</button>
          <a href="{{ route('engineeringtask.update', $handover->id) }}" class="btn btn-primary "> Bearbeiten </a>
          @endif 
        </div>
        <div id="deletebutton" class="mb-3" style="display: none;">
          <p>möchten Sie diesen Beitrag endgültig löschen?</p>
          <button type="button" class="btn btn-primary"><a class="text-white" href="{{route('handover.delete', $handover->id)}}">Ja!</a></button>
          <button type="button" id="no-btn" class="btn btn-primary">Nein!</button>
        </div>
        
          <div class="card-footer">
            {{-- TODO: gescheites design! --}}
            <div> Gelesen von:</div>
              @foreach ($handover->userread as $user)
              {{$user->name}}
              @endforeach
          <div> Ungelesen: </div>
          @foreach ($handover->department as $department)
            @foreach ($department->user as $user)
                @if (!$handover->userread->contains($user->id))
                   {{$user->name}}
                @endif
              @endforeach
              @endforeach
          
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