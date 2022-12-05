//Declaration DOM & Variables
const url = "http://127.0.0.1:8000/users"

//Functions
function getAllUsers(users) {
    var tbodyData = "";
    $.each(users, function (key, user) {
        tbodyData += `<tr>
            <td>${user.first_name}</td>
            <td>${user.last_name}</td>
            <td>${user.cin}</td>
            <td>${user.phone_number}</td>
            <td>${user.birthday_date}</td>
            <td>${user.email}</td>
            <td>rôle</td>
            <td><a href="${url}/${user.id}" class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-edit"></i></a></td>
            <td><button type="button" class="btn btn-sm btn-sm-square btn-primary m-2 delete-btn" data-user="${user.id}"><i class="fas fa-user-minus"></i></button></td>
            <td><button type="button" class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-tag"></i></button></td>
        </tr>`
    });    
    $('#tableUser tbody').html(tbodyData);
}


//GET - Read All Users
fetch(url)
    .then(response => response.json())
    .then(data => getAllUsers(data))

function deleteUser(user_id) {
    fetch(url + "/" + user_id, {
        method: 'DELETE'
    }).then(() => {
        location.reload()
    }).catch(err => {
        console.error
    })
}

$(document).on('click', '.delete-btn', function() {
    var currentUserId = $(this).attr('data-user');
    deleteUser(currentUserId);
})
