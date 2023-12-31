@extends('layouts.default')

@section('title', 'Newsposts')

@section('content')
<div class="container mt-5  h-100">
  <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">Zurück</a>
    <h2 class="text-center fs-1 fw-bolder">Alle News</h2>
      <div class="row">
          <div class="col-lg-12">
              <table class="table table-bordered table-dark table-hover " >
                <thead>
                  <tr>
                    <th class="col-6"class="text-white text-center">Thema</th>
                    <th class="col-4" class="text-white">Ersteller</th>
                    <th class="col-2" class="text-white">Datum</th>
                  </tr>
                </thead>
                <tbody class="table-hover">
                  @foreach ($news as $newspost)
                    <tr>
                      
                        <td class="col-6" class="text-white"><a href="{{route('news.single', $newspost->id)}}">{{$newspost->topic}}</a></td>
                        <td class="col-4" class="text-white"><a href="{{route('user.single', $newspost->user_id)}}" class="text-white">{{$newspost->user->name}}</td>
                        <td class="col-2" class="text-white">{{\Carbon\Carbon::parse($newspost->created_at)->format('d.m.Y')}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              @if (Auth::user()->role_id < 3)
              <a href="{{ route('news.new') }} " class="btn btn-primary btn-block">Neue News anlegen</a>
              @endif
          </div>
      </div>
  </div>
@endsection
