@extends('layouts.default')

@section('title', 'Informationen')

@section('content')
<div class="container mt-5  h-100">
    <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">Zurück</a>
      <div class="row">
        <div class="col-3"></div>
          <div class="col-lg-6">
              <table class="table table-bordered table-dark table-hover " >
                <thead>
                  <tr>
                    <th colspan="3" class="text-white text-center ">Adminpanel</th>
                  </tr>
                </thead>
                <tbody class="table-hover">
                    @if(Auth::user()->role_id === 1)
                    <tr>
                        <td class="d-flex justify-content-around p-4">
                            <a href="{{route('admin.register')}}" class="btn btn-primary">Mitarbeiter anlegen</a>
                            <a href="{{route('admin.all')}}" class="btn btn-primary">Mitarbeiter Übersicht</a>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td class="d-flex justify-content-around p-4">
                            <a href="{{route('category.new')}}" class="btn btn-primary">Kategorie anlegen</a>
                            <a href="{{route('ingredient.new')}}" class="btn btn-primary">Zutat anlegen</a>
                            <a href="{{route('recipe.new')}}" class="btn btn-primary">Rezept anlegen</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="d-flex justify-content-around p-4">
                            <a href="{{route('checklist.newcategory')}}" class="btn btn-primary">Checklist Kategorie anlegen</a>
                            <a href="{{route('checklist.newtask')}}" class="btn btn-primary">Checklist Aufgabe anlegen</a>
                        </td>
                    </tr>
                </tbody>
              </table>

@endsection