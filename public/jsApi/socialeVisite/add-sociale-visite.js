/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("all-beneficiaires", fillSelectBeneficiaires);
    $("button#btn-visite-sociale").click(addSocialeVisite);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Add new sociale visite
 * @param {Event} e Information about the event
 */
const addSocialeVisite = (e) => {
    e.preventDefault();
    debugger
    let dateSocialeVisite = $("input#date_visite").val();
    let remarque = $(`input#remarque-visite`).val();
    let beneficiaire = $(`select#beneficiaire`).val();
    let dataToSend = {
        "visite_date": dateSocialeVisite,
        "visite_remarque": remarque,
        "beneficiaire": beneficiaire,
    }
    addData("socialeVisites", dataToSend, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new sociale visite
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
