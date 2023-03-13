/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    $("button#btn-add-partenaire").click(addPartenaire);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Add new partenaire 
 * @param {Event} e Information about the event
 */
const addPartenaire = (e) => {
    e.preventDefault();
    let nomPartenaire = $("input#nom-partenaire").val();
    let objectifPartenaire = $("input#objectif-partenaire").val();
    let logoPartenaire = document.getElementById('logo-partenaire').files[0];
    let dataToSend = new FormData();
    dataToSend.append('partenaire_nom', nomPartenaire);
    dataToSend.append('partenaire_objectif', objectifPartenaire);
    dataToSend.append('logo', logoPartenaire);
    addData("partenaires", dataToSend, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new partenaire 
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let partenaire = data.result;
        let msg = data.msg;
        alertMsg(msg);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
