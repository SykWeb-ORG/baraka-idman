/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var partenaires = null;
var partenaireToOperate = null;
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("partenaires", getAllPartenaires);
    $("button#btn-edit-partenaire").click(editPartenaire);
    $("button#btn-delete-partenaire").click(deletePartenaire);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Edit partenaire
 * @param {Event} e Information about the event
 */
const editPartenaire = (e) => {
    e.preventDefault();
    let nomPartenaire = $("input#nom-partenaire").val();
    let objectifPartenaire = $("input#objectif-partenaire").val();
    let logoPartenaire = document.getElementById('logo-partenaire').files[0];
    let dataToSend = new FormData();
    dataToSend.append('partenaire_nom', nomPartenaire);
    dataToSend.append('partenaire_objectif', objectifPartenaire);
    if (logoPartenaire) {
        dataToSend.append('logo', logoPartenaire);
    }
    dataToSend.append('_method', 'PUT');
    uploading(`partenaires/${partenaireToOperate.id}`, dataToSend, showDialogResponse);
}
/**
 * Delete partenaire
 * @param {Event} e Information about the event
 */
const deletePartenaire = (e) => {
    e.preventDefault();
    deleteData(`partenaires/${partenaireToOperate.id}`, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains modified partenaire 
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let partenaire = data.result;
        let msg = data.msg;
        alertMsg(msg);
        $("tbody#tbl_partenaire").empty();
        getAllData("partenaires", getAllPartenaires);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
/**
 * Retrieve all partenaires from the server
 * @param {object} data response from the server that contains all partenaires
 */
const getAllPartenaires = (data) => {
    partenaires = data.partenaires;
    $.each(partenaires, function (indexInArray, partenaire) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);
        let tdNamePartenaire = $("<td>");
        tdNamePartenaire.text(partenaire.partenaire_nom);
        let tdObjectifPartenaire = $("<td>");
        tdObjectifPartenaire.text(partenaire.partenaire_objectif);
        let tdLogoPartenaire = $("<td>");
        tdLogoPartenaire.html(`<img src="${baseUrl + partenaire.partenaire_logo}" style="width: 40px; height: 40px;">`);
        let tdEditPartenaire = $(`<td class="text-center">`);
        let btnEditPartenaire = $(`<button type='submit' class='btn btn-primary m-2' data-partenaire-id=${partenaire.id} data-bs-toggle='modal' data-bs-target='#modal_EditPartenaire'  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier Partenaire'>`);
        btnEditPartenaire.append("<i class='fas fa-edit me-2'></i>Modifier");
        btnEditPartenaire.click(function (e) {
            e.preventDefault();
            fillModalEditPartenaire($(this).data("partenaire-id"));
        });
        tdEditPartenaire.append(btnEditPartenaire);
        let tdDeletePartenaire = $(`<td class="text-center">`);
        let btnDeletePartenaire = $(`<button type="submit" class="btn btn-primary m-2" data-partenaire-id=${partenaire.id} data-bs-toggle="modal" data-bs-target="#modal_DeletePartenaire"  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer Partenaire'>`);
        btnDeletePartenaire.append(`<i class="fas fa-trash me-2"></i>Supprimer`);
        btnDeletePartenaire.click(function (e) {
            e.preventDefault();
            partenaireToOperate = partenaires.find(onePartenaire => onePartenaire.id == $(this).data("partenaire-id"));
        });
        tdDeletePartenaire.append(btnDeletePartenaire);
        tr.append(tdNb, tdNamePartenaire, tdObjectifPartenaire, tdLogoPartenaire, tdEditPartenaire, tdDeletePartenaire);
        $("tbody#tbl_partenaire").append(tr);
    });
}
const fillModalEditPartenaire = (partenaireId) => {
    partenaireToOperate = partenaires.find(partenaire => partenaire.id == partenaireId);
    $("input#nom-partenaire").val(partenaireToOperate.partenaire_nom);
    $("input#objectif-partenaire").val(partenaireToOperate.partenaire_objectif);
}
