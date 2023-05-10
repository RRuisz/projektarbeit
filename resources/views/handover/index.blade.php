@extends('layouts.default')

@section('title', 'handoverposts')

@section('content')
{{-- UNGELESENE ÜBERGABEN --}}
<div class="container mt-5  h-100">
    <h2 class="text-center fs-1 fw-bolder">Ungelesene Übergaben</h2>
      <div class="row">
          <div class="col-lg-12">
              <table class="table table-bordered table-dark table-hover " >
                <thead>
                  <tr>
                    <th colspan="3" class="text-white">Thema</th>
                    <th colspan="1" class="text-white">Ersteller</th>
                    <th colspan="1" class="text-white">Datum</th>
                    <th colspan="1" class="text-white">Abteilung</th>
                  </tr>
                </thead>
                <tbody class="table-hover">
                  {{-- If USER = ROLE Mitarbeiter, show all unread Handovers of HIS department! --}}
                  @if(Auth::user()->role_id == 3)  
                  @foreach ($handover as $handoverpost)
                  @if ($handoverpost->department->contains(Auth::user()->department_id))
                  @if (!$handoverpost->userread->contains(Auth::id()))
                      <tr>
                        <td colspan="3" class="text-white"><a href="{{route('handover.single', $handoverpost->id)}}">{{$handoverpost->headline}}</a></td>
                        <td colspan="1" class="text-white">{{$handoverpost->user->name}}</td>
                        <td colspan="1" class="text-white">{{$handoverpost->created_at}}</td>
                        <td colspan="1" class="text-white">{{Auth::user()->department->name}}</td>
                    </tr>
                    @endif
                    @endif
                  @endforeach
                  {{-- IF USER = ROLE Abteilungsleiter or Higher, show ALL unread Handovers --}}
                  @elseif(Auth::user()->role_id <= 2)
                  @foreach ($handover as $handoverpost)
                  @if (!$handoverpost->userread->contains(Auth::id()))
                  <tr>
                    <td colspan="3" class="text-white"><a href="{{route('handover.single', $handoverpost->id)}}">{{$handoverpost->headline}}</a></td>
                    <td colspan="1" class="text-white">{{$handoverpost->user->name}}</td>
                    <td colspan="1" class="text-white">{{$handoverpost->created_at}}</td>
                    <td colspan="1" class="text-white">
                      @foreach($handoverpost->department as $department)
                      {{ $department->name }}
                      @endforeach
                    </td>
                </tr>
                @endif
                @endforeach
                @endif

                </tbody>
              </table>
              <a href="{{ route('handover.new') }} " class="btn btn-primary btn-block">Neue Übergabe anlegen</a>
          </div>
          {{-- GELESENE ÜBERGABEN --}}
          <div class="container mt-5  h-100">
            <h2 class="text-center fs-1 fw-bolder">Gelesene Übergaben</h2>
              <div class="row">
                  <div class="col-lg-12">
                      <table class="table table-bordered table-dark table-hover " >
                        <thead>
                          <tr>
                            <th colspan="3" class="text-white">Thema</th>
                            <th colspan="1" class="text-white">Ersteller</th>
                            <th colspan="1" class="text-white">Datum</th>
                            <th colspan="1" class="text-white">Abteilung</th>
                          </tr>
                        </thead>
                        <tbody class="table-hover">
                          @if(Auth::user()->role_id == 3)  
                          @foreach ($handover as $handoverpost)
                              @if ($handoverpost->department->contains(Auth::user()->department_id))
                              @if ($handoverpost->userread->contains(Auth::id()))
                              <tr>
                                <td colspan="3" class="text-white"><a href="{{route('handover.single', $handoverpost->id)}}">{{$handoverpost->headline}}</a></td>
                                <td colspan="1" class="text-white">{{$handoverpost->user->name}}</td>
                                <td colspan="1" class="text-white">{{$handoverpost->created_at}}</td>
                                <td colspan="1" class="text-white">{{Auth::user()->department->name}}</td>
                            </tr>
                            @endif
                            @endif
                          @endforeach
                            
                          @elseif(Auth::user()->role_id <= 2)
                          @foreach ($handover as $handoverpost)
                          @if ($handoverpost->userread->contains(Auth::id()))
                          <tr>
                            <td colspan="3" class="text-white"><a href="{{route('handover.single', $handoverpost->id)}}">{{$handoverpost->headline}}</a></td>
                            <td colspan="1" class="text-white">{{$handoverpost->user->name}}</td>
                            <td colspan="1" class="text-white">{{$handoverpost->created_at}}</td>
                            <td colspan="1" class="text-white">
                              @foreach($handoverpost->department as $department)
                              {{ $department->name }}
                              @endforeach
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        @endif
        
                        </tbody>
                      </table>
      </div>
  </div>
@endsection
