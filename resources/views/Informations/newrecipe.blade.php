@extends('layouts.default')

@section('content')
<div class="container mt-5 p-5">
    <a href="{{ back() }}" class="btn btn-primary">Zurück zur Übersicht</a>
    <h1 class="text-center mb-5">Neues Rezept anlegen</h1>
    <form method="POST" class="form-control p-5 bg-dark text-white">
        @csrf
        <div class="mt-2"><a href="javascript:void(0)" id="delBtn" class="mt-3 text-white bg-danger rounded p-1">&oplus;Letzte Zutat löschen!</a>
        <a href="javascript:void(0)" id="addBtn" class="mt-3 text-white bg-primary rounded p-1">&oplus;Weitere Zutat hinzufügen!</a></div>
        <div class="">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control bg-secondary text-white" name="name" id="name" placeholder="Name" value="{{old('name')}}" required>
        <input type="hidden" class="form-control" name="cost" id="costInput" value="">
       
            <div id="add" class="">

            </div>
        </div>
        <div class="d-flex justify-content-between">
            <input type="submit" id="send" class="btn btn-primary mt-3" value="Save">
            <div class="">
                <div class="btn btn-primary mt-3" id="cost-btn">Wareneinsatz berechnen</div>
                <div id="cost" class=""></div>
            </div>
    </form>
@endsection


@section('scripts')
<script src="{{asset('js/newrecipe.js')}}">
</script>
@endsection