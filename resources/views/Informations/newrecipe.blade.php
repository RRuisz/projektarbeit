@extends('layouts.default')

@section('content')
<div class="container mt-5 p-5">
    <a href="{{ back() }}" class="btn btn-primary">Zurück zur Übersicht</a>
    <h1 class="text-center mb-5">Neue Zutat anlegen</h1>
    <form method="POST" class="form-control p-5">
        @csrf
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{old('name')}}" required>
        <div class="">
            <div id="add" class="">

            </div>
        </div>
        <div><a href="javascript:void(0)" id="addBtn" class="mt-3">&oplus;Weitere Zutat hinzufügen!</a></div>
        <input type="submit" class="btn btn-primary mt-3" value="Save">
    </form>
@endsection


@section('scripts')
{{-- TODO: AUSLAGERN!! --}}
<script>
let newSelect = document.getElementById('add');
let addBtn = document.getElementById('addBtn');
let xhr = new XMLHttpRequest();
let response;
xhr.open('GET', 'http://127.0.0.1:8000/api/ingredients', true);

xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
        response = JSON.parse(xhr.responseText);
        addIngredient();
        addBtn.addEventListener('click', addIngredient);
    }
};

xhr.send();

function addIngredient() {
    let div = document.createElement('div')
    div.className = 'col mt-3';
    let select = document.createElement('select');
    select.className = 'form-control';
    select.id = 'ingredient';
    select.name = 'ingredient[]';
    let label = document.createElement('label');
    label.className = 'form-label';
    label.textContent = 'Zutat:'
    let amountSelect = document.createElement('input');
    amountSelect.type = 'number';
    amountSelect.name = 'ingredientAmount[]';
    amountSelect.className = 'form-control p-1';
    amountSelect.placeholder = 'Wie viel?';
    amountSelect.step = 'any';


    for (let i = 0; i < response.length; i++) {
        let option = document.createElement('option');
        option.value = response[i].id;
        option.text = response[i].name;
        select.appendChild(option);
    }
    newSelect.appendChild(div)
    div.appendChild(label);
    div.appendChild(select);
    div.appendChild(amountSelect);
}


</script>
@endsection