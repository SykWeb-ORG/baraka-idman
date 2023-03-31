/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var medicaleVisites = null;
var medicaleVisiteToOperate = null;
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("all-beneficiaires", fillSelectBeneficiaires);
    getAllData("medicaleVisites", getAllMedicaleVisites);
    $("button#btn-edit-visite-medical").click(editMedicaleVisite);
    $("button#btn-delete-visite-medical").click(deleteMedicaleVisite);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Edit medicale visite
 * @param {Event} e Information about the event
 */
const editMedicaleVisite = (e) => {
    e.preventDefault();
    let dateMedicaleVisite = $("input#date_visite").val();
    let presence = $(`input#gridRadios1`).prop("checked") ? 1 : 0;
    let remarque = $(`input#remarque-visite`).val();
    let beneficiaire = $(`select#beneficiaire`).val();
    let dataToSend = {
        "visite_date": dateMedicaleVisite,
        "visite_presence": presence,
        "visite_remarque": remarque,
        "beneficiaire": beneficiaire,
    }
    updateData(`medicaleVisites/${medicaleVisiteToOperate.id}`, dataToSend, showDialogResponse);
}
/**
 * Delete medicale visite
 * @param {Event} e Information about the event
 */
const deleteMedicaleVisite = (e) => {
    e.preventDefault();
    deleteData(`medicaleVisites/${medicaleVisiteToOperate.id}`, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new medicale visite
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let atelier = data.result;
        let msg = data.msg;
        alertMsg(msg);
        $("tbody#tbl_medicale_visites").empty();
        getAllData("medicaleVisites", getAllMedicaleVisites);
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
 * Retrieve all medicale visites from the server
 * @param {object} data response from the server that contains all medicale visites
 */
const getAllMedicaleVisites = (data) => {
    medicaleVisites = data.medicale_visites;
    $.each(medicaleVisites, function (indexInArray, medicaleVisite) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);
        let tdDateMedicaleVisite = $("<td>");
        tdDateMedicaleVisite.text(medicaleVisite.visite_date);
        let tdPresenceMedicaleVisite = $("<td>");
        tdPresenceMedicaleVisite.text((medicaleVisite.visite_presence == 1 ? "Oui" : "Non"));
        let tdRemarqueMedicaleVisite = $("<td>");
        tdRemarqueMedicaleVisite.text(medicaleVisite.visite_remarque);
        let tdBeneficiaire = $("<td>");
        tdBeneficiaire.text(`${medicaleVisite.beneficiaire.nom} ${medicaleVisite.beneficiaire.prenom}`);
        let tdEditMedicaleVisite = $(`<td class="text-center">`);
        let btnEditMedicaleVisite = $(`<button type='submit' class='btn btn-primary m-2' data-medicale-visite-id=${medicaleVisite.id} data-bs-toggle='modal' data-bs-target='#modal_EditMedicaleVisite'  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier Visite medicale'>`);
        btnEditMedicaleVisite.append("<i class='fas fa-edit me-2'></i>Modifier");
        btnEditMedicaleVisite.click(function (e) {
            e.preventDefault();
            fillModalEditMedicaleVisite($(this).data("medicale-visite-id"));
        });
        tdEditMedicaleVisite.append(btnEditMedicaleVisite);
        let tdDeleteMedicaleVisite = $(`<td class="text-center">`);
        let btnDeleteMedicaleVisite = $(`<button type="submit" class="btn btn-primary m-2" data-medicale-visite-id=${medicaleVisite.id} data-bs-toggle="modal" data-bs-target="#modal_DeleteMedicaleVisite"  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer Visite medicale'>`);
        btnDeleteMedicaleVisite.append(`<i class="fas fa-trash me-2"></i>Supprimer`);
        btnDeleteMedicaleVisite.click(function (e) {
            e.preventDefault();
            medicaleVisiteToOperate = medicaleVisites.find(oneMedicaleVisite => oneMedicaleVisite.id == $(this).data("medicale-visite-id"));
        });
        tdDeleteMedicaleVisite.append(btnDeleteMedicaleVisite);
        tr.append(tdNb, tdDateMedicaleVisite, tdPresenceMedicaleVisite, tdRemarqueMedicaleVisite, tdBeneficiaire, tdEditMedicaleVisite, tdDeleteMedicaleVisite);
        if ($("thead th").length == 7) {
            let tdMedicaleAssistant = $("<td>");
            tdMedicaleAssistant.text(`${medicaleVisite.medical_assistant.user.last_name} ${medicaleVisite.medical_assistant.user.first_name}`);
            tdMedicaleAssistant.insertBefore(tdEditMedicaleVisite);
        }
        $("tbody#tbl_medicale_visites").append(tr);
    });
}
const fillModalEditMedicaleVisite = (medicaleVisiteId) => {
    medicaleVisiteToOperate = medicaleVisites.find(medicaleVisite => medicaleVisite.id == medicaleVisiteId);
    $("input#date_visite").val(medicaleVisiteToOperate.visite_date);
    $(`input#remarque-visite`).val(medicaleVisiteToOperate.visite_remarque);
    $(`select#beneficiaire`).val(medicaleVisiteToOperate.beneficiaire.id);
    $(`select#beneficiaire`).trigger('change');
    if (medicaleVisiteToOperate.visite_presence) {
        $(`input#gridRadios1`).prop("checked", true);
    } else {
        $(`input#gridRadios2`).prop("checked", true);
    }
}
