//Declaration DOM & Variables
const url = "http://127.0.0.1:8000/"

//Functions
function getAllBenefaicaires(benefs) {
    var tbodyData = "";
    $.each(benefs, function (key, benef) {
        tbodyData += `<tr>
            <td><input class="form-check-input" type="checkbox"></td>
            <td>${benef.first_name}</td>
            <td>${benef.last_name}</td>
            <td>${benef.cin}</td>
            <td>${benef.birthday_date}</td>
            <td>${benef.phone_number}</td>
            <td>${benef.email}</td>
            <td><button type="button" class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-edit"></i></button></td>
            <td><button type="button" class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-minus"></i></button></td>
            <td><button type="button" class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-tag"></i></button></td>
        </tr>`
    });    
    $('#tablebenificiere tbody').html(tbodyData);
}


//GET - Read All Users
fetch(url)
    .then(response => response.json())
    .then(data => getAllBenefaicaire(data))