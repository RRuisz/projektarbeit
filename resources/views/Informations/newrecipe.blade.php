@extends('layouts.default')

@section('content')
<div class="container mt-5 p-5">
    <a href="{{ back() }}" class="btn btn-primary">Zurück zur Übersicht</a>
    <h1 class="text-center mb-5">Neues Rezept anlegen</h1>
    <form method="POST" class="form-control p-5">
        @csrf
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{old('name')}}" required>
        <input type="hidden" class="form-control" name="cost" id="costInput" value="">
        <div class="">
            <div id="add" class="">

            </div>
        </div>
        <div><a href="javascript:void(0)" id="delBtn" class="mt-3 text-danger">&oplus;Letztes löschen!</a></div>
        <div><a href="javascript:void(0)" id="addBtn" class="mt-3">&oplus;Weitere Zutat hinzufügen!</a></div>
        <div class="d-flex justify-content-between">
            <input type="submit" id="send" class="btn btn-primary mt-3" value="Save">
            <div class="">
                <div class="btn btn-primary" id="cost-btn">Wareneinsatz berechnen</div>
                <div id="cost" class=""></div>
            </div>
    </form>
@endsection


@section('scripts')
<script src="{{asset('js/newrecipe.js')}}">
</script>
@endsection