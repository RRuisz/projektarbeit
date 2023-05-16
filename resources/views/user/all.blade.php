
@extends('layouts.default')

@section('title', 'Mitarbeiter Übersicht')

@section('content')
<div class="container mt-5  h-100">
      <h2 class="text-center fs-1 fw-bolder">Alle Mitarbeiter</h2>
        <div class="row">
          <div class="d-flex justify-content-center" id="depNav"> 

          </div>
          <div class="col-2"></div>
          <div class="col-lg-8">
              <input type="text" id="userSearch" placeholder="Name suchen..." class="rounded bg-dark text-white border border-white">
              <table class="table table-bordered table-dark table-hover mt-2" >
                  <thead>
                    <tr>
                      <th colspan="3" class="text-white col-6">Name</th>
                      <th colspan="1" class="text-white">Abteilung</th>
                      <th colspan="1" class="text-white">Email</th>
                    </tr>
                  </thead>
                  <tbody class="table-hover" id="usertable">
                  </tbody>
                </table>

@endsection

@section('scripts')
<script src="/js/users.js"></script>
@endsection