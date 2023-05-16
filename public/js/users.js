let response;
const searchInput = document.getElementById('userSearch');

let xhr = new XMLHttpRequest();
xhr.open('GET', 'http://127.0.0.1:8000/api/users', true);

xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    response = JSON.parse(xhr.responseText);
    let btns = document.querySelectorAll('.NavBtn');
    
    
    userOutput();
    departmentNav();
    showDepartmentUser();
    

  }
}

xhr.send();

function departmentNav() {
  const department = response.department;
  const depNav = document.getElementById('depNav');

  for (let i = 0; i < department.length; i++){
    let btn = document.createElement('button');
    btn.className = 'btn btn-primary m-3 navBtn';
    btn.textContent = department[i].name;
    btn.dataset.dept = department[i].id;
    depNav.appendChild(btn);
  }

  depNav.addEventListener('click', function(event) {
    if (event.target.classList.contains('navBtn')) {
        let tablerows = document.querySelectorAll('.tablerow');
        let department = event.target.getAttribute('data-dept');

        for (let i = 0; i < tablerows.length; i++) {
            const tablerow = tablerows[i];
            const rowDept = tablerow.getAttribute('data-dept');

            if (rowDept !== department) {
                tablerow.style.display = 'none';
            } else {
                tablerow.style.display = '';
            }
        }
    }
});
}

function showDepartmentUser(event) {
    const selectedDepartment = event.currentTarget.getAttribute('data-dept');
    const tablerows = document.querySelectorAll('.tablerow');

    tablerows.forEach(function(tablerow) {
      const departmentId = tablerow.getAttribute('data-dept');

      if (departmentId === selectedDepartment) {
        tablerow.style.display = '';
      } else {
        tablerow.style.display = 'none';
      }
    });
}



function userOutput() {
  
  const users = response.users;
  const departments = response.department;
  let usertable = document.getElementById('usertable');

    for (let i = 0; i < users.length; i++) {
      const user = users[i];
      const departmentId = user.department_id;
      const department = departments.find(dept => dept.id === departmentId);

      const departmentName = department ? department.name : "Unknown Department";
      
      let output = `<tr data-dept="${departmentId}" class="tablerow">`;
      output += `<td class="col-6" colspan="3"><a href="/user/${user.id}" class="text-white">${user.name}</a></td>`;
      output += `<td>${departmentName}</td>`;
      output += `<td><a href="mailto:${user.email}" class="text-white">${user.email}</a></td>`;
      output += '</tr>';

      usertable.innerHTML += output;
  }
}

function userSearch() {
    const searchInput = document.getElementById('userSearch');
    const select = document.querySelectorAll('.tablerow');
    const searchTerm = searchInput.value;

    for (let i = 0; i < select.length; i++) {
      const selectName = select[i].firstElementChild.textContent.toLowerCase();
      if (selectName.includes(searchTerm)){
                select[i].style.display = '';
            } else {
                select[i].style.display = 'none';
            }
        }

}


searchInput.addEventListener('input', userSearch);
