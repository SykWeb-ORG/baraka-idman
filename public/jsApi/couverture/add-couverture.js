/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    $("button#btn-add-couv-medicale").click(addCouverture);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Add new couverture
 * @param {Event} e Information about the event
 */
const addCouverture = (e) => {
    e.preventDefault();
    let nomCouverture = $("input#nom-couv-medicale").val();
    let dataToSend = {
        "couverture_nom": nomCouverture,
    }
    addData("couvertures", dataToSend, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new couverture
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let couverture = data.result;
        let msg = data.msg;
        alertMsg(msg);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
