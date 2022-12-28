//Functions
// Variables 
const endUrl = "beneficiaires";

// Eventes
$(document).ready(function(){
    getAllData(endUrl,getAllBenefaicaires)
})

// Functions
function getAllBenefaicaires(benefs) {
    var tbodyData = "";
    $.each(benefs, function (key, benef) {
        tbodyData += `<tr>
            <td>${benef.id}</td>
            <td>${benef.prenom}</td>
            <td>${benef.nom}</td>
            <td>${benef.adresse}</td>
            <td>${benef.sexe}</td>
            <td>${benef.cin}</td>
            <td>${benef.telephone}</td>
            <td>${benef.type_travail}</td>
            <td>${benef.intervenant_id }</td>
            <td>${benef.niveau_scolaire}</td>
            <td>${benef.situation_familial}</td>
            <td>${benef.orphelin}</td>
            <td>${benef.profession}</td>
            <td>${benef.zone_habitation}</td>
            <td>${benef.localisation}</td>
            <td>${benef.famille_informee}</td>
            <td>${benef.age_debut_addiction}</td>
            <td>${benef.duree_addiction}</td>
            <td>${benef.ts}</td>
            <td><a href='${url}/${benef.id}' class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-edit"></i></a></td>
            <td><a href='' class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-minus"></i></a></td>
        </tr>`
    });    
    $('#tablebenificiere tbody').html(tbodyData);
}
