@extends('layouts.default')

@section('title', 'Technikaufträge')

@section('content')
<div class="container mt-5  h-100">
    <h2 class="text-center fs-1 fw-bolder">{{$category->name}}</h2>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 mt-5">
            <table class="table table-bordered table-dark table-hover " >
                <thead>
                    <tr>
                        <th colspan="2" class="col-lg-8" class="text-white">Titel</th>
                        <th colspan="1" class="text-white">Ersteller</th>
                    </tr>
                </thead>
                <tbody class="table-hover">
                  @foreach ($category->recipe as $item)
                  <tr >
                      <td colspan="2" class="text-white"><a href="{{route('engineeringtask.single', $item->id)}}">{{$item->name}}</a></td>
                      <td colspan="1" class="text-white"><a href="{{route('user.single', $item->user_id)}}" class="text-white">{{$item->user->name}}</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-3">
            <a class="btn btn-primary " href="{{route('recipe.new')}}">Alle Rezepte anzeigen</a>
            <a class="btn btn-primary " href="{{route('ingredient.all')}}">Alle Zutaten anzeigen</a>
            </div>
            <div>
            <a class="btn btn-primary " href="{{route('recipe.new')}}">Neues Rezept anlegen</a>
            <a class="btn btn-primary " href="{{route('ingredient.new')}}">Neue Zutat anlegen</a>
            </div>
        </div>
    </div>
</div>

@endsection