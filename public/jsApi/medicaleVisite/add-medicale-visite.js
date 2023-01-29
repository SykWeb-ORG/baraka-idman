/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("all-beneficiaires", fillSelectBeneficiaires)
    $("button#btn-visite-medical").click(addMedicaleVisite);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Add new medicale visite
 * @param {Event} e Information about the event
 */
const addMedicaleVisite = (e) => {
    e.preventDefault();
    debugger
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
    addData("medicaleVisites", dataToSend, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new medicale visite
 */
const showDialogResponse = (data) => {
    let atelier = data.result;
    let msg = data.msg;
    alert(msg);
}
/**
 * Fill the select field with all beneficiaires
 * @param {object} data response from the server that contains all beneficiaires
 */
const fillSelectBeneficiaires = (data)=>{
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
