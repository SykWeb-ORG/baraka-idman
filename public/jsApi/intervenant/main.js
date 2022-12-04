//Declaration DOM & Variables
const url = "http://127.0.0.1:8000/beneficiaires"

//Functions
function getAllBenefaicaires(benefs) {
    var tbodyData = "";
    $.each(benefs, function (key, benef) {
        tbodyData += `<tr>
            <td><input class="form-check-input" type="checkbox"></td>
            <td>${benef.id}</td>
            <td>${benef.prenom}</td>
            <td>${benef.nom}</td>
            <td>${benef.adresse}</td>
            <td>${benef.sexe}</td>
            <td>${benef.cin}</td>
            <td>${benef.telephone}</td>
            <td>${benef.type_travail}</td>
            <td><a href='${url}/${benef.id}' class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-edit"></i></a></td>
            <td><a href='' class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-minus"></i></a></td>
        </tr>`
    });    
    $('#tablebenificiere tbody').html(tbodyData);
}


//GET - Read All Users
fetch(url)
    .then(response => response.json())
    .then(data => getAllBenefaicaires(data))