/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    $("button#btn-add-service").click(addService);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Add new Cas juridique
 * @param {Event} e Information about the event
 */
const addService = (e) => {
    e.preventDefault();
    let nomService = $("input#nom-service").val();
    let dataToSend = {
        "service_nom": nomService,
    }
    addData("services", dataToSend, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new Service
 */
const showDialogResponse = (data) => {
    let service = data.result;
    let msg = data.msg;
    let status = data.status;
    if(status == 200) {
        alert(msg);
        $("input#nom-service").val("");
    }
}
