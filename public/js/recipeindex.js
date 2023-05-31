let response;
    let categoryFilter = document.getElementById('categoryNav');
    let searchField = document.getElementById('recipeSearch');
    let recipeTable = document.getElementById('table')
    let xhr = new XMLHttpRequest();
    
    xhr.open('GET', 'http://127.0.0.1:8000/api/recipes', true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          response = JSON.parse(xhr.responseText);
          recipeOutput();
          createCategoryBtn();
          searchField.addEventListener('input', recipeSearch);
        }
      }
      xhr.send();


      function createCategoryBtn() {
        let categories = response.categories;
        let showallBtn = document.createElement('button');
        showallBtn.textContent = 'Alle anzeigen';
        showallBtn.className = 'btn btn-primary me-2';
        showallBtn.dataset.category = 0;

        showallBtn.addEventListener('click', function() {
          let tablerow = document.querySelectorAll('.tablerow')
              
              for (let i = 0; i < tablerow.length; i++){
                  tablerow[i].style.display = '';
              }
        })

        categoryFilter.appendChild(showallBtn);

        for(let i = 0; i < categories.length; i++){
          let btn = document.createElement('button')
          btn.textContent = categories[i].name;
          btn.className = 'btn btn-primary me-2';
          btn.dataset.category = categories[i].id;

          categoryFilter.appendChild(btn);

          btn.addEventListener('click', function () {
              let data = this.getAttribute('data-category');
              let tablerow = document.querySelectorAll('.tablerow')
              
              for (let i = 0; i < tablerow.length; i++){
                let rowdata = tablerow[i].getAttribute('data-category')
                if(data == rowdata){
                  tablerow[i].style.display = '';
                } else {
                  tablerow[i].style.display = 'none';
                }
              }
          })
        }
      }

      function recipeOutput(){
        let recipes = response.recipes;

        for(let i = 0; i < recipes.length; i++){
          let tablerow = document.createElement('tr');
          tablerow.dataset.category = recipes[i].category_id;
          tablerow.className = 'tablerow'
          let tabledata = document.createElement('td');
          tabledata.dataset.name = recipes[i].name
          let recipe = document.createElement('a');
          recipe.setAttribute('href', `/recipe/${recipes[i].id}`);
          recipe.textContent = recipes[i].name;
          recipe.className = 'text-white'; 

          recipeTable.appendChild(tablerow);
          tablerow.appendChild(tabledata);
          tabledata.appendChild(recipe);
        }
      }

      function recipeSearch(){
        let searchField = document.getElementById('recipeSearch');
        let searchTerm = searchField.value.toLowerCase();
        let tablerow = document.querySelectorAll('.tablerow');

        for(let i = 0; i < tablerow.length; i++) {
          let recipeName = tablerow[i].firstElementChild.getAttribute('data-name').toLowerCase();
          if (recipeName.includes(searchTerm)) {
            tablerow[i].style.display = '';
          } else {
            tablerow[i].style.display = 'none';
          }
        }
        
      }