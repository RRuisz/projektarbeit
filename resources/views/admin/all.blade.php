@extends('layouts.default')

@section('title', 'Mitarbeiter - Übersicht')

@section('content')
<div class="container mt-5  h-100">
  <a href="{{ route('user.panel', Auth::id()) }}" class="btn btn-primary">Zurück zum Userpanel</a> 
    <h2 class="text-center fs-1 fw-bolder">Alle Mitarbeiter</h2>
      <div class="row">
          <div class="col-lg-12">
              <table class="table table-bordered table-dark table-hover mt-5" >
                <thead>
                  <tr>
                    <th colspan="3" class="text-white">Name</th>
                    <th colspan="1" class="text-white">Abteilung</th>
                    <th colspan="1" class="text-white">Rang</th>
                    <th colspan="1" class="text-white">Email</th>
                    
                  </tr>
                </thead>
                <tbody class="table-hover">
                  @foreach ($users as $users)
                    <tr>
                        <td colspan="3" class="text-white"><a class="text-white" href="{{route('admin.change', $users->id)}}" class="">{{$users->name}}</td>
                        <td colspan="1" class="text-white">{{$users->department->name}}</td>
                        <td colspan="1" class="text-white">{{$users->role->name}}</td>
                        <td colspan="1" class="text-white"><a class="text-white" href="mailto:{{$users->email}}">{{$users->email}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="container mb-3">
                <a href="{{ route('admin.register') }}" class="btn btn-primary">Neuen Mitarbeiter anlegen</a>
            </div>
@endsection