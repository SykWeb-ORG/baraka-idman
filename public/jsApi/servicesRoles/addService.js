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
 * Add new Service
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
    if(data.status == 200) {
        let service = data.result;
        let msg = data.msg;
        alertMsg(msg);
        $("input#nom-service").val("");
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
