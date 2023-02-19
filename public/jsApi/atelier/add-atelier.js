/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    $("button#btn-add-atelier").click(addAtelier);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Add new atelier
 * @param {Event} e Information about the event
 */
const addAtelier = (e) => {
    e.preventDefault();
    let nomAtelier = $("input#nom-atelier").val();
    let dataToSend = {
        "atelier_nom": nomAtelier,
    }
    addData("ateliers", dataToSend, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new atelier
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let atelier = data.result;
        let msg = data.msg;
        alertMsg(msg);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
