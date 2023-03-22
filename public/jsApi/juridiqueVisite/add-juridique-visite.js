/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("all-beneficiaires", fillSelectBeneficiaires);
    $("button#btn-visite-juridique").click(addJuridiqueVisite);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Add new juridique visite
 * @param {Event} e Information about the event
 */
const addJuridiqueVisite = (e) => {
    e.preventDefault();
    debugger
    // let dateJuridiqueVisite = $("input#date_visite").val();
    let remarque = $(`input#remarque-visitejuridique`).val();
    let preuve = document.getElementById('visite-juridique-preuve').files[0];
    let beneficiaire = $(`select#beneficiaire`).val();
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
    addData("juridiqueVisites", dataToSend, showDialogResponse);
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
    } else {
        let errors = data.errors;
        console.log(errors);
    }
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
