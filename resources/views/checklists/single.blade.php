@extends('layouts.default')

@section('content')
<div class="container mt-5  h-100">
  <a href="{{ url()->previous() }}" class="btn btn-primary mb-3 me-5">Zurück</a>
    <select class="ms-5" id="select">
      @foreach($categories as $category)
        <option value="{{$category->id}}" data-checklist="{{$checklist->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <h2 class="text-center fs-1 fw-bolder">Checkliste</h2>
    <div class="row">
      <div class="col-3"></div>
          <div class="col-lg-6">
              <input type="hidden" name="CSRF" id="csrf_token" value="{{ csrf_token() }}">
              <table class="table table-bordered table-dark table-hover">
                <thead>
                  <tr>
                    <th colspan="3" class="text-white">Aufgabe</th>
                    <th colspan="1" class="text-white">Erledigt von</th>
                    <th colspan="1" class="text-white">Erledigt um</th>
                  </tr>
                </thead>
                <tbody class="table-hover" id="table">
                </tbody>
              </table>
@endsection

@section('scripts')
<script src="/js/checklist.js"></script>
@endsection