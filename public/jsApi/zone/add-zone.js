/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    $("button#btn-add-zone").click(addZone);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Add new Zone 
 * @param {Event} e Information about the event
 */
const addZone = (e) => {
    e.preventDefault();
    let nomZone = $("input#nom-zone").val();
    let dataToSend = {
        "zone_nom": nomZone,
    }
    addData("zones", dataToSend, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new zone 
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let zone = data.result;
        let msg = data.msg;
        alertMsg(msg);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
