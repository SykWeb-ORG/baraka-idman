/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var juridiqueVisites = null;
var juridiqueVisiteToOperate = null;
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("all-beneficiaires", fillSelectBeneficiaires);
    getAllData("juridiqueVisites", getAllJuridiqueVisites);
    $("button#btn-edit-visite-juridique").click(editJuridiqueVisite);
    $("button#btn-delete-visite-Juridique").click(deleteJuridiqueVisite);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Edit juridique visite
 * @param {Event} e Information about the event
 */
const editJuridiqueVisite = (e) => {
    e.preventDefault();
    // let dateJuridiqueVisite = $("input#date_visite").val();
    let remarque = $(`input#remarque-visite`).val();
    let beneficiaire = $(`select#beneficiaire`).val();
    let preuve = document.getElementById('visite-juridique-preuve').files[0];
    // let dataToSend = {
    //     // "visite_date": dateJuridiqueVisite,
    //     "visite_remarque": remarque,
    //     "beneficiaire": beneficiaire,
    // }
    let dataToSend = new FormData();
    dataToSend.append('visite_remarque', remarque);
    dataToSend.append('beneficiaire', beneficiaire);
    if (preuve) {
        dataToSend.append('visite_preuve', preuve);
    }
    dataToSend.append('_method', 'PUT');
    uploading(`juridiqueVisites/${juridiqueVisiteToOperate.id}`, dataToSend, showDialogResponse);
}
/**
 * Delete juridique visite
 * @param {Event} e Information about the event
 */
const deleteJuridiqueVisite = (e) => {
    e.preventDefault();
    deleteData(`juridiqueVisites/${juridiqueVisiteToOperate.id}`, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new juridique visite
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let juridiqueVisite = data.result;
        let msg = data.msg;
        alertMsg(msg);
        $("tbody#tbl_juridique_visites").empty();
        getAllData("juridiqueVisites", getAllJuridiqueVisites);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
/**
 * Fill the select field with all beneficiaires
 * @param {object} data response from the server that contains all beneficiaires
 */
const fillSelectBeneficiaires = (data) => {
    let beneficiaires = data.result;
    $.each(beneficiaires, function (indexInArray, beneficiaire) {
        let option = $("<option>");
        option.text(beneficiaire.nom + " " + beneficiaire.prenom);
        option.val(beneficiaire.id);
        $("select#beneficiaire").append(option);
    });
    $("select#beneficiaire").select2({
        placeholder: 'Séléctionner un beneficiaire ...',
    });
}
/**
 * Retrieve all juridique visites from the server
 * @param {object} data response from the server that contains all juridique visites
 */
const getAllJuridiqueVisites = (data) => {
    juridiqueVisites = data.juridique_visites;
    $.each(juridiqueVisites, function (indexInArray, juridiqueVisite) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);
        // let tdDateJuridiqueVisite = $("<td>");
        // tdDateJuridiqueVisite.text(juridiqueVisite.visite_date);
        let tdRemarqueJuridiqueVisite = $("<td>");
        tdRemarqueJuridiqueVisite.text(juridiqueVisite.visite_remarque);
        let tdBeneficiaire = $("<td>");
        tdBeneficiaire.text(`${juridiqueVisite.beneficiaire.nom} ${juridiqueVisite.beneficiaire.prenom}`);
        let tdPreuve = $("<td>");
        tdPreuve.html(`<img src="${baseUrl + juridiqueVisite.visite_preuve}" style="width: 40px; height: 40px;">`);
        let tdEditJuridiqueVisite = $(`<td class="text-center">`);
        let btnEditJuridiqueVisite = $(`<button type='submit' class='btn btn-sm btn-sm-square btn-primary m-2' data-juridique-visite-id=${juridiqueVisite.id} data-bs-toggle='modal' data-bs-target='#modal_EditVisite_Juridique'  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier Visite juridique'>`);
        btnEditJuridiqueVisite.append("<i class='fas fa-edit'></i>");
        btnEditJuridiqueVisite.click(function (e) {
            e.preventDefault();
            fillModalEditJuridiqueVisite($(this).data("juridique-visite-id"));
        });
        tdEditJuridiqueVisite.append(btnEditJuridiqueVisite);
        let tdDeleteJuridiqueVisite = $(`<td class="text-center">`);
        let btnDeleteJuridiqueVisite = $(`<button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2" data-juridique-visite-id=${juridiqueVisite.id} data-bs-toggle="modal" data-bs-target="#modal_DeleteVisite_juridique"  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer Visite juridique'>`);
        btnDeleteJuridiqueVisite.append(`<i class="fas fa-trash"></i>`);
        btnDeleteJuridiqueVisite.click(function (e) {
            e.preventDefault();
            juridiqueVisiteToOperate = juridiqueVisites.find(oneJuridiqueVisite => oneJuridiqueVisite.id == $(this).data("juridique-visite-id"));
        });
        tdDeleteJuridiqueVisite.append(btnDeleteJuridiqueVisite);
        tr.append(tdNb, /*tdDateJuridiqueVisite,*/ tdRemarqueJuridiqueVisite, tdBeneficiaire, tdPreuve, tdEditJuridiqueVisite, tdDeleteJuridiqueVisite);
        if ($("thead th").length == 6) {
            let tdJuridiqueAssistant = $("<td>");
            tdJuridiqueAssistant.text(`${juridiqueVisite.juridique_assistant.user.last_name} ${juridiqueVisite.juridique_assistant.user.first_name}`);
            tdJuridiqueAssistant.insertBefore(tdEditJuridiqueVisite);
        }
        $("tbody#tbl_juridique_visites").append(tr);
    });
}
const fillModalEditJuridiqueVisite = (juridiqueVisiteId) => {
    juridiqueVisiteToOperate = juridiqueVisites.find(juridiqueVisite => juridiqueVisite.id == juridiqueVisiteId);
    $("input#date_visite").val(juridiqueVisiteToOperate.visite_date);
    $(`input#remarque-visite`).val(juridiqueVisiteToOperate.visite_remarque);
    $(`select#beneficiaire`).val(juridiqueVisiteToOperate.beneficiaire.id);
    $(`select#beneficiaire`).trigger('change');
}
