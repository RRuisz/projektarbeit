@extends('layouts.default')

@section('title', $recipe->name)

@section('content')

<div class="container mt-5">
    <a href="{{ route('info.cat', $recipe->category_id)}}" class="btn btn-primary mb-3">Zurück zur Übersicht</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title  text-center">{{$recipe->name}}</h3>
                                </div>
                                <div class="container">
                                    <div class="fs-4">
                                        <p> Zutaten: </p>
                                        @foreach($recipe->ingredient as $ingredient)
                                        <p> {{ $ingredient->name }}: {{ $ingredient->pivot->ingredient_amount }}{{$ingredient->measure}} </p>
                                        @endforeach
                                    </div>
                                </div>
                               
                            </div>
                            <div class="d-flex justify-content-between"> 
                            <div>
                                @if(Auth::user()->role_id <= 2)
                                <a href="#" class="btn btn-primary mt-3">Bearbeiten</a>
                                @endif
                            </div>
                            <div class="mt-3">
                                <p> Wareneinsatz: {{$recipe->cost}}€ </p>
                            </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>

@endsection