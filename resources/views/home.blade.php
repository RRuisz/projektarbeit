@extends('layouts.default')

@section('title', 'Home')

@section('content')
<div class="container mt-5  h-100">
    <h2 class="text-center fs-1 fw-bolder">Neuesten News</h2>
      <div class="row">
          <div class="col-lg-12">
              <table class="table table-bordered table-dark table-hover " >
                <thead>
                  <tr>
                    <th colspan="3" class="text-white">Thema</th>
                    <th colspan="1" class="text-white">Ersteller</th>
                    <th colspan="1" class="text-white">Datum</th>
                  </tr>
                </thead>
                <tbody class="table-hover">
                  @foreach ($news as $newspost)
                    <tr>
                        <td colspan="3" class="text-white"><a href="{{ route('news.single', $newspost->id) }}">{{$newspost->topic}}</a></td>
                        <td colspan="1" class="text-white">{{$newspost->user->name}}</td>
                        <td colspan="1" class="text-white">{{\Carbon\Carbon::parse($newspost->created_at)->format('d.m.Y')}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
      </div>
  </div>
  <div class="container mt-5  h-100">
    <h2 class="text-center fs-1 fw-bolder">Neuesten Technik Aufträge</h2>
      <div class="row">
          <div class="col-lg-12">
              <table class="table table-bordered table-dark table-hover " >
                <thead>
                  <tr>
                    <th colspan="3" class="text-white">Aufgabe</th>
                    <th colspan="1" class="text-white">Ersteller</th>
                    <th colspan="1" class="text-white">Datum</th>
                    <th colspan="1" class="text-white">Status</th>
                    
                  </tr>
                </thead>
                <tbody class="table-hover">
                  @foreach ($engineering_tasks as $engineeringtask)
                    <tr>
                        <td colspan="3" class="text-white"><a href="{{route('engineeringtask.single', $engineeringtask->id)}}">{{$engineeringtask->name}}</a></td>
                        <td colspan="1" class="text-white">{{$engineeringtask->user->name}}</td>
                        <td colspan="1" class="text-white">{{\Carbon\Carbon::parse($engineeringtask->created_at)->format('d.m.Y')}}</td>
                        <td colspan="1" class="text-white">
                          @if ($engineeringtask->status === 0)
                          Offen
                          @else 
                          Erledigt
                          @endif
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
      </div>
  </div>
@endsection