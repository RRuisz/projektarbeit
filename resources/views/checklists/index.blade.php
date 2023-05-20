@extends('layouts.default')

@section('title', 'Checklisten')

@section('content')

<div class="container mt-5  h-100">
    <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">Zurück</a>
    <h2 class="text-center fs-1 fw-bolder">Heutige Checkliste</h2>
    <a href="{{route('checklist.new')}}" class=" btn btn-primary">Neue Checkliste</a>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-lg-8">
            <table class="table table-bordered table-dark table-hover mb-5" >
                <thead>
                    <tr>
                        <th colspan="3" class="text-white">Abteilung</th>
                        <th colspan="1" class="text-white">Datum</th>
                    </tr>
                </thead>
                <tbody class="table-hover">
                @foreach ($checklist as $item)
                @if ($item->created_at->format('Y-m-d') === $todayDate)
                <tr>
                    <td colspan="3" class="text-white"><a href="{{route('checklist.single', $item->id)}}">{{$item->name}}</a></td>
                    <td colspan="3" class="text-white">{{$item->created_at->format('d.m.Y')}}</td>    
                </tr>
                @endif
                @endforeach

                </tbody>
            </table >
        </div>

</div>


<div class="container mt-5  h-100">
    <h2 class="text-center fs-1 fw-bolder">Vergangene Checklisten</h2>
    <div class="row mt-5">
        <div class="col-2"></div>
        <div class="col-lg-8">
            <table class="table table-bordered table-dark table-hover " >
                <thead>
                    <tr>
                        <th colspan="3" class="text-white">Aufgabe</th>
                        <th colspan="1" class="text-white">Datum</th>
                    </tr>
                </thead>
                <tbody class="table-hover">
                  @foreach ($checklist as $item)
                  @if ($item->created_at->format('Y-m-d') !== $todayDate) 
                  <tr>
                      <td colspan="3" class="text-white"><a href="{{route('checklist.single', $item->id)}}">{{$item->name}}</a></td>
                      <td colspan="1" class="text-white">{{\Carbon\Carbon::parse($item->created_at)->format('d.m.Y')}}</td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
          </div>
      </div>
  </div> 
@endsection