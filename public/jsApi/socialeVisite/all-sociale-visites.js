/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var socialeVisites = null;
var socialeVisiteToOperate = null;
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("all-beneficiaires", fillSelectBeneficiaires);
    getAllData("socialeVisites", getAllSocialeVisites);
    $("button#btn-edit-visite-sociale").click(editSocialeVisite);
    $("button#btn-delete-visite-sociale").click(deleteSocialeVisite);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Edit sociale visite
 * @param {Event} e Information about the event
 */
const editSocialeVisite = (e) => {
    e.preventDefault();
    let dateSocialeVisite = $("input#date_visite").val();
    let remarque = $(`input#remarque-visite`).val();
    let beneficiaire = $(`select#beneficiaire`).val();
    let dataToSend = {
        "visite_date": dateSocialeVisite,
        "visite_remarque": remarque,
        "beneficiaire": beneficiaire,
    }
    updateData(`socialeVisites/${socialeVisiteToOperate.id}`, dataToSend, showDialogResponse);
}
/**
 * Delete sociale visite
 * @param {Event} e Information about the event
 */
const deleteSocialeVisite = (e) => {
    e.preventDefault();
    deleteData(`socialeVisites/${socialeVisiteToOperate.id}`, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new sociale visite
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let socialeVisite = data.result;
        let msg = data.msg;
        alertMsg(msg);
        $("tbody#tbl_sociale_visites").empty();
        getAllData("socialeVisites", getAllSocialeVisites);
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
        dropdownParent: $('.modal-bodyEdit'),
    });
}
/**
 * Retrieve all sociale visites from the server
 * @param {object} data response from the server that contains all sociale visites
 */
const getAllSocialeVisites = (data) => {
    socialeVisites = data.sociale_visites;
    $.each(socialeVisites, function (indexInArray, socialeVisite) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);
        let tdDateSocialeVisite = $("<td>");
        tdDateSocialeVisite.text(socialeVisite.visite_date);
        let tdRemarqueSocialeVisite = $("<td>");
        tdRemarqueSocialeVisite.text(socialeVisite.visite_remarque);
        let tdBeneficiaire = $("<td>");
        tdBeneficiaire.text(`${socialeVisite.beneficiaire.nom} ${socialeVisite.beneficiaire.prenom}`);
        let tdEditSocialeVisite = $(`<td class="text-center">`);
        let btnEditSocialeVisite = $(`<button type='submit' class='btn btn-primary m-2' data-sociale-visite-id=${socialeVisite.id} data-bs-toggle='modal' data-bs-target='#modal_EditVisite_Sociale'  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier Visite sociale'>`);
        btnEditSocialeVisite.append("<i class='fas fa-edit me-2'></i>Modifier");
        btnEditSocialeVisite.click(function (e) {
            e.preventDefault();
            fillModalEditSocialeVisite($(this).data("sociale-visite-id"));
        });
        tdEditSocialeVisite.append(btnEditSocialeVisite);
        let tdDeleteSocialeVisite = $(`<td class="text-center">`);
        let btnDeleteSocialeVisite = $(`<button type="submit" class="btn btn-primary m-2" data-sociale-visite-id=${socialeVisite.id} data-bs-toggle="modal" data-bs-target="#modal_DeleteVisite_sociale"  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer Visite sociale'>`);
        btnDeleteSocialeVisite.append(`<i class="fas fa-trash me-2"></i>Supprimer`);
        btnDeleteSocialeVisite.click(function (e) {
            e.preventDefault();
            socialeVisiteToOperate = socialeVisites.find(oneSocialeVisite => oneSocialeVisite.id == $(this).data("sociale-visite-id"));
        });
        tdDeleteSocialeVisite.append(btnDeleteSocialeVisite);
        tr.append(tdNb, tdDateSocialeVisite, tdRemarqueSocialeVisite, tdBeneficiaire, tdEditSocialeVisite, tdDeleteSocialeVisite);
        if ($("thead th").length == 6) {
            let tdSocialeAssistant = $("<td>");
            tdSocialeAssistant.text(`${socialeVisite.social_assistant.user.last_name} ${socialeVisite.social_assistant.user.first_name}`);
            tdSocialeAssistant.insertBefore(tdEditSocialeVisite);
        }
        $("tbody#tbl_sociale_visites").append(tr);
    });
}
const fillModalEditSocialeVisite = (socialeVisiteId) => {
    socialeVisiteToOperate = socialeVisites.find(socialeVisite => socialeVisite.id == socialeVisiteId);
    $("input#date_visite").val(socialeVisiteToOperate.visite_date);
    $(`input#remarque-visite`).val(socialeVisiteToOperate.visite_remarque);
    $(`select#beneficiaire`).val(socialeVisiteToOperate.beneficiaire.id);
    $(`select#beneficiaire`).trigger('change');
}
