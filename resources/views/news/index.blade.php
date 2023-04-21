@extends('layouts.default')

@section('title', 'Newsposts')

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
                  </tr>
                </thead>
                <tbody class="table-hover">
                  @foreach ($news as $newspost)
                    <tr>
                      
                        <td colspan="3" class="text-white"><a href="{{route('news.single', $newspost->id)}}">{{$newspost->topic}}</a></td>
                        <td colspan="1" class="text-white">{{$newspost->name}}</td>
                        <td colspan="1" class="text-white">{{$newspost->creat_date}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
      </div>
  </div>
@endsection
