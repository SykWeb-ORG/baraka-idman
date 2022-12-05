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
            <td>${user.birthday_date}</td>
            <td>${user.phone_number}</td>
            <td>${user.email}</td>
            <td><button type="button" class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-edit"></i></button></td>
            <td><button type="button" class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-minus"></i></button></td>
            <td><button type="button" class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-tag"></i></button></td>
        </tr>`
    });    
    $('#tableUser tbody').html(tbodyData);
}


//GET - Read All Users
fetch(url)
    .then(response => response.json())
    .then(data => getAllUsers(data))
    