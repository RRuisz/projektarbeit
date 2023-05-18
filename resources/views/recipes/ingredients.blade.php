@extends('layouts.default')

@section('title', 'Alle Zutaten')

@section('content')
<div class="container mt-5  h-100">
  <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">Zurück</a>
      <h2 class="text-center fs-1 fw-bolder">Alle Zutaten</h2>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <table class="table table-bordered table-dark table-hover mt-5" >
                  <thead>
                    <tr>
                      <th colspan="3" class="text-white text-center">Name</th>
                      
                    </tr>
                  </thead>
                  <tbody class="table-hover">
                    @foreach ($ingredients as $item)
                      <tr>
                          <td  class="text-white  text-center"><a class="text-white" href="{{route('ingredient.single', $item->id)}}" class="text-white">{{$item->name}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="container mb-3">
                  <a href="{{ route('ingredient.new') }}" class="btn btn-primary">Neue Zutat anlegen</a>
              </div>
@endsection