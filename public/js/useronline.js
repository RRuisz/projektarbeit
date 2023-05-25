function onlineUser() {
let xhr = new XMLHttpRequest();
xhr.open('GET', '/api/users');
xhr.onload = function() {
  if (xhr.status === 200) {
    let response = JSON.parse(xhr.responseText);
    let users = response.users;
    const user_id = document.getElementById('online_user').getAttribute('data-userid');
    const userOnlineContainer = document.getElementById('online_user')
    for(let i = 0; i < users.length; i++){
      let lastSeen = new Date(users[i].last_seen);
      let currentTime = new Date();

      let diffInMins = Math.floor((currentTime - lastSeen) / (1000 * 60));
      if (users[i].id != user_id){
        if (diffInMins < 5){
          let div = document.getElementById('userDiv')
          div.innerHTML = '';
          div.innerHTML = `\u{1F7E2} ${users[i].name}`;

          userOnlineContainer.appendChild(div);
        }
      }
      

    }
    }
};
xhr.send();
}

onlineUser();