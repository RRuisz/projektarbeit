@extends('layouts.default')

@section('title', 'Technikaufträge')

@section('content')
<div class="container mt-5  h-100">
    <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">Zurück</a>
    <h2 class="text-center fs-1 fw-bolder">Offene Aufgaben</h2>
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
                  @foreach ($opentask as $item)
                  <tr>
                      <td colspan="3" class="text-white"><a href="{{route('engineeringtask.single', $item->id)}}">{{$item->name}}</a></td>
                      <td colspan="1" class="text-white"><a href="{{route('user.single', $item->user_id)}}" class="text-white">{{$item->user->name}}</a></td>
                      <td colspan="1" class="text-white">{{\Carbon\Carbon::parse($item->created_at)->format('d.m.Y')}}</td>
                      <td colspan="1" class="text-white">Offen</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <a class="btn btn-primary " href="/engineering/new">Neue Aufgabe erstellen</a>
</div>
<div class="container mt-5  h-100">
    <h2 class="text-center fs-1 fw-bolder">Abgeschlossene Aufgaben</h2>
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
                  @foreach ($donetask as $item)
                    <tr>
                        <td colspan="3" class="text-white"><a href=" {{route('engineeringtask.single', $item->id)}} ">{{$item->name}}</a></td>
                        <td colspan="1" class="text-white"><a href="{{route('user.single', $item->user_id)}}" class="text-white">{{$item->user->name}}</a></td>
                        <td colspan="1" class="text-white">{{\Carbon\Carbon::parse($item->created_at)->format('d.m.Y')}}</td>
                        <td colspan="1" class="text-white">Abgeschlossen</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
      </div>
  </div>
@endsection