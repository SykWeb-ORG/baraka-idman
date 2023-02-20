/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    $("button#btn-add-cas").click(addCas);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Add new Cas juridique
 * @param {Event} e Information about the event
 */
const addCas = (e) => {
    e.preventDefault();
    let nomCas = $("input#nom-cas").val();
    let dataToSend = {
        "cas_nom": nomCas,
    }
    addData("cas", dataToSend, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new cas juridique
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let cas = data.result;
        let msg = data.msg;
        alertMsg(msg);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
