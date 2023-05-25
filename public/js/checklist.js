let categorySelect = document.getElementById('select');

categorySelect.addEventListener('change', createChecklistTasks)
window.addEventListener('DOMContentLoaded', createChecklistTasks);

//Gets data from Route, and creates table for the choosen category
function createChecklistTasks(){
  const csrfTokenChecklist = document.getElementById('csrf_token').value;
  let formData = new FormData();
  formData.append('categoryId', categorySelect.value)
  formData.append('checklistId', categorySelect.options[categorySelect.selectedIndex].getAttribute('data-checklist'));
  formData.append('_token', csrfTokenChecklist);
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
          formData.append('_token', csrfTokenChecklist);

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
