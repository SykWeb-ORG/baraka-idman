/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    $("btn-add-formation").click(addFormation);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Add new formation
 * @param {Event} e Information about the event
 */
const addFormation = (e) => {
    e.preventDefault();
    let titleFormation = $("input#titre-formation").val();
    let dateFormation = $("input#date_formation").val();
    let dureeFormation = $("input#duree_formation").val();
    let organismeFormation = $("input#organisme-formation").val();
    let formateur = $("input#formateur").val();
    let objet = $("input#objet").val();
    let dataToSend = {
        "formation_titre": titleFormation,
        "formation_date": dateFormation,
        "formation_heure": dureeFormation,
        "organisme": organismeFormation,
        "formateur": formateur,
        "objet": objet,
    }
    addData("formations", dataToSend, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new formations
 */
const showDialogResponse = (data) => {
    let formation = data.result;
    let msg = data.msg;
    alert(msg);
}
