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
{{-- TODO: AUSLAGERN!! --}}
<script>
    let newSelect = document.getElementById('add');
    let addBtn = document.getElementById('addBtn');
    let delBtn = document.getElementById('delBtn')
    let cost = document.getElementById('cost');
    let costInput = document.getElementById('costInput');
    let costBtn = document.getElementById('cost-btn');
    let sendForm = document.getElementById('send');
    let totalCost = 0;

    let response;
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://127.0.0.1:8000/api/ingredients', true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            response = JSON.parse(xhr.responseText);
            addIngredient();
            addBtn.addEventListener('click', addIngredient);
            delBtn.addEventListener('click', delSelect);
        }
    };

    xhr.send();



    function addIngredient() {
        let div = document.createElement('div')
        div.className = 'col mt-3';
        let select = document.createElement('select');
        select.className = 'form-control select';
        select.id = 'ingredient';
        select.name = 'ingredient[]';
        let label = document.createElement('label');
        label.className = 'form-label';
        label.textContent = 'Zutat:'
        let amountSelect = document.createElement('input');
        amountSelect.type = 'number';
        amountSelect.name = 'ingredientAmount[]';
        amountSelect.className = 'form-control p-1 amount';
        amountSelect.placeholder = 'Wie viel?';
        amountSelect.step = 'any';
        amountSelect.required = true;
        let searchInput = document.createElement('input');
        searchInput.type = 'text';
        searchInput.placeholder =  'Zutat suchen...'
        



        for (let i = 0; i < response.length; i++) {
            let option = document.createElement('option');
            option.value = response[i].id;
            option.className = 'option';
            option.text = response[i].name; 
            option.dataset.price = parseFloat(response[i].price);
            select.appendChild(option);

            searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase();
            const options = select.getElementsByTagName('option');
            let lastOptionIndex = -1;
            
            for (let i = 0; i < options.length; i++){
                const optionText = options[i].text.toLowerCase();

                if (optionText.includes(searchTerm)){
                    options[i].style.display = '';
                    lastOptionIndex = i;
                } else {
                    options[i].style.display = 'none';
                }
            }
            
            if (lastOptionIndex !== -1) {
                select.selectedIndex = lastOptionIndex;
            }
        });
        }
        newSelect.appendChild(div)
        div.appendChild(label);
        div.appendChild(searchInput);
        div.appendChild(select);
        div.appendChild(amountSelect);

        costBtn.addEventListener('click', sumCost);

        sendForm.addEventListener('click', sumCost);

        function sumCost() {
            cost.innerHTML = "";
            totalCost = 0;
            let select = document.querySelectorAll('.select')
            let amount = document.querySelectorAll('.amount')

            for (let i = 0; i < select.length; i++) {
                const selectedOption = select[i].options[select[i].selectedIndex];
                const price = parseFloat(selectedOption.getAttribute('data-price'));
                const selectedAmount = parseFloat(amount[i].value);
                const total = price * selectedAmount;
                totalCost += total;
                console.log(totalCost);
            }

            costInput.value = totalCost.toFixed(2);
            cost.innerHTML = `Wareneinsatz: ${totalCost.toFixed(2)}€`;
                            
        }
    }

    function delSelect(){
        let selectElements = document.querySelectorAll('.select');
        if (selectElements.length > 0) {
            let lastSelect = selectElements[selectElements.length - 1];
            lastSelect.parentNode.remove();
        }
    }
</script>
@endsection