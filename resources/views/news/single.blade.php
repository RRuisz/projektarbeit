@extends('layouts.default')

@section('title', 'Newspost')

@section('content')
<div class="container mt-5  h-100">
    <a href="{{ route('news')}}" class="btn btn-primary">Zurück</a>
      <div class="row">
          <div class="col-lg-12">
            <h1 class="display-3 font-weight-bold text-center text-gray-dark mb-5">{{ $post->topic}} </h1>
          </div>
          <div class="col-lg-12">
            <h1 class="display-6 font-weight-bold text-gray-dark mb-5">{{ $post->content }} </h1>
          </div>
          <div class="col-lg-3">
            <p class="">Erstellt am: {{$post->created_at}} </p>
             <p>   von: {{ $post->name }} </p>
          </div>

          
@endsection