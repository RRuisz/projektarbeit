@extends('layouts.default')

@section('content')
<div class="container mt-5  h-100">
  <a href="{{ url()->previous() }}" class="btn btn-primary mb-3 me-5">Zurück</a>
    <select class="ms-5" id="select">
      @foreach($categories as $category)
        <option value="{{$category->id}}" data-checklist="{{$checklist->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <h2 class="text-center fs-1 fw-bolder">Checkliste</h2>
    <div class="row">
      <div class="col-3"></div>
          <div class="col-lg-6">
              <table class="table table-bordered table-dark table-hover " >
                <thead>
                  <tr>
                    <th colspan="3" class="text-white">Aufgabe</th>
                    <th colspan="1" class="text-white">Erledigt von</th>
                    <th colspan="1" class="text-white">Erledigt um</th>
                  </tr>
                </thead>
                <tbody class="table-hover" id="table">
                </tbody>
              </table>
@endsection

@section('scripts')
<script>
  let categorySelect = document.getElementById('select');

categorySelect.addEventListener('change', createChecklistTasks)
window.addEventListener('DOMContentLoaded', createChecklistTasks);

//Gets data from Route, and creates table for the choosen category
function createChecklistTasks(){
  let formData = new FormData();
  formData.append('categoryId', categorySelect.value)
  formData.append('checklistId', categorySelect.options[categorySelect.selectedIndex].getAttribute('data-checklist'));
  formData.append('_token', '{{ csrf_token() }}');
  let xhr = new XMLHttpRequest();
  xhr.open('POST', '/checklist/category/tasks');
  xhr.onload = function() {
    if (xhr.status === 200){
      let response = JSON.parse(xhr.responseText);
      let table = document.getElementById('table');
      table.innerHTML = '';
      
      //iteriert durch den response um für jedes objekt eine tablerow zu erstellen
      for (let i = 0; i < response.checklisttask.length; i++){
        let tablerow = document.createElement('tr');
        let tabledata = document.createElement('td');
        let checkbox = document.createElement('input');
        tabledata.setAttribute('colspan', 3);
        checkbox.type = 'checkbox';
        checkbox.dataset.checklist = response.id;
        checkbox.name = response.checklisttask[i].id;
        checkbox.id = response.checklisttask[i].id;
        checkbox.className = 'form-check-input input me-2';
        let label = document.createElement('label');
        label.textContent = response.checklisttask[i].name;
        label.setAttribute('for', response.checklisttask[i].id);
        label.className = "form-check-label";

        //funktion um beim anhackerl der checkbox, die daten und direkt ausgeben
        checkbox.addEventListener('change', function() {
          const taskStatus = this.checked ? 1 : 0;
          const taskId = this.getAttribute('name');
          const checklistId = this.getAttribute('data-checklist');

          let formData = new FormData();
          formData.append('taskStatus', taskStatus);
          formData.append('taskId', taskId);
          formData.append('checklistId', checklistId);
          formData.append('_token', '{{ csrf_token() }}');

          let xhr = new XMLHttpRequest();
          xhr.open('POST', '/checklists/tasks/update');
          xhr.onload = function() {
            if (xhr.status === 200) {
              location.reload();
              createChecklistTasks();
            }
          };
          xhr.send(formData);
          
    });
  
        
        table.appendChild(tablerow);
        tablerow.appendChild(tabledata);
        tabledata.appendChild(checkbox);
        tabledata.appendChild(label); 
        
        //wenn aufgabe schon erledigt, mit namen der person und uhrzeit ausgeben
        if(response.checklisttask[i].pivot.status === 1){
          let doneAtFull = response.checklisttask[i].pivot.done_at;
          let doneAt = new Date(doneAtFull);
          let hours = doneAt.getHours();
          let minutes = doneAt.getMinutes();
          let timeString = hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0');


          checkbox.checked = true;
          let tabledataName = document.createElement('td')
          tabledataName.textContent = response.checklisttask[i].pivot.user_name;
          let tabledataDoneAt = document.createElement('td')
          tabledataDoneAt.textContent = timeString;

          tablerow.appendChild(tabledataName);
          tablerow.appendChild(tabledataDoneAt);

          //ansonsten nur 2 leere td's ausgeben, für den look
        } else {
          let emptyTabledata1 = document.createElement('td');
          let emptyTabledata2 = document.createElement('td');

          tablerow.appendChild(emptyTabledata1);
          tablerow.appendChild(emptyTabledata2);
        }
        
        
      }
    }
  }
  xhr.send(formData)
}


</script>
@endsection