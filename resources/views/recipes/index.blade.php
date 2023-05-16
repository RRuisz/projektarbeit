@extends('layouts.default')

@section('title', 'Informationen')

@section('content')
<div class="container mt-5  h-100">
    <h2 class="text-center fs-1 fw-bolder">Kategorien</h2>
      <div class="row">
        <div class="col-3"></div>
          <div class="col-lg-6">
              <table class="table table-bordered table-dark table-hover " >
                <thead>
                  <tr>
                    <th colspan="3" class="text-white">Kategorie</th>
                  </tr>
                </thead>
                <tbody class="table-hover">
                  @foreach ($categorys as $category)
                    <tr>
                      
                        <td colspan="3" class="text-white"><a href="{{route('recipe.cat', $category->id)}}">{{$category->name}}</a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>




              {{-- TODO: Alle Info Posts ausgeben! --}}
{{-- <div class="container mt-5  h-100">
    <h2 class="text-center fs-1 fw-bolder">Alle Informationen</h2>
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
                      
                        <td colspan="3" class="text-white"><a href="{{route('news.single', $newspost->id)}}">{{$newspost->topic}}</a></td>
                        <td colspan="1" class="text-white"><a href="{{route('user.single', $newspost->user_id)}}" class="text-white">{{$newspost->user->name}}</td>
                        <td colspan="1" class="text-white">{{$newspost->created_at}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              @if (Auth::user()->role_id < 3)
              <a href="{{ route('news.new') }} " class="btn btn-primary btn-block">Neue News anlegen</a>
              @endif
          </div>
      </div>
  </div> --}}

          </div>
      </div>
  </div>
@endsection
