/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    $("button#btn-add-service-type").click(addServiceType);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Add new service type
 * @param {Event} e Information about the event
 */
const addServiceType = (e) => {
    e.preventDefault();
    let nomServiceType = $("input#nom-service-type").val();
    let dataToSend = {
        "service_type_nom": nomServiceType,
    }
    addData("serviceTypes", dataToSend, showDialogResponse);
}
/**
 * Show dialog modal to display server type response
 * @param {object} data response from the server that contains new service type
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let serviceType = data.result;
        let msg = data.msg;
        alertMsg(msg);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
