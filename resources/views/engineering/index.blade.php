@extends('layouts.default')

@section('title', 'Technikaufträge')

@section('content')
<div class="container mt-5  h-100">
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
                {{-- {{dd($opentask ) }} --}}
                <tbody class="table-hover">
                  @foreach ($opentask as $item)
                  <tr>
                      <td colspan="3" class="text-white"><a href="{{route('engineeringtask.single', $item->id)}}">{{$item->name}}</a></td>
                      <td colspan="1" class="text-white">{{$item->user->name}}</td>
                      <td colspan="1" class="text-white">{{$item->created_at}}</td>
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
                {{-- {{dd($opentask ) }} --}}
                <tbody class="table-hover">
                  @foreach ($donetask as $item)
                    <tr>
                        <td colspan="3" class="text-white"><a href=" {{route('engineeringtask.single', $item->id)}} ">{{$item->name}}</a></td>
                        <td colspan="1" class="text-white">{{$item->user->name}}</td>
                        <td colspan="1" class="text-white">{{$item->created_at}}</td>
                        <td colspan="1" class="text-white">Abgeschlossen</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
      </div>
  </div>
@endsection