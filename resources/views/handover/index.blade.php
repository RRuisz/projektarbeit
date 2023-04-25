@extends('layouts.default')

@section('title', 'handoverposts')

@section('content')
<div class="container mt-5  h-100">
    <h2 class="text-center fs-1 fw-bolder">Alle News</h2>
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
                  @if($user->role_id == 3)  
                  @foreach ($handover as $handoverpost)
                  @if ($handoverpost->department_id == $user->department_id)
                  <tr>
                        <td colspan="3" class="text-white"><a href="{{route('handover.single', $handoverpost->id)}}">{{$handoverpost->headline}}</a></td>
                        <td colspan="1" class="text-white">{{$handoverpost->user_name}}</td>
                        <td colspan="1" class="text-white">{{$handoverpost->created_at}}</td>
                        <td colspan="1" class="text-white">{{$handoverpost->department_name}}</td>
                    </tr>
                    @endif
                  @endforeach
                  @elseif($user->role_id <= 2)
                  @foreach ($handover as $handoverpost)
                  <tr>
                    <td colspan="3" class="text-white"><a href="{{route('handover.single', $handoverpost->id)}}">{{$handoverpost->headline}}</a></td>
                    <td colspan="1" class="text-white">{{$handoverpost->user_name}}</td>
                    <td colspan="1" class="text-white">{{$handoverpost->created_at}}</td>
                    <td colspan="1" class="text-white">{{$handoverpost->department_name}}</td>
                </tr>
                @endforeach
                @endif

                </tbody>
              </table>
              <a href="{{ route('handover.new') }} " class="btn btn-primary btn-block">Neue Übergabe anlegen</a>
          </div>
      </div>
  </div>
@endsection
