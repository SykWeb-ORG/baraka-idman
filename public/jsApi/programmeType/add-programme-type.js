/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    $("button#btn-add-programme_type").click(addProgrammeType);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Add new programme type
 * @param {Event} e Information about the event
 */
const addProgrammeType = (e) => {
    e.preventDefault();
    let nomProgrammeType = $("input#nom-programme-type").val();
    let dataToSend = {
        "programme_type_nom": nomProgrammeType,
    }
    addData("programmeTypes", dataToSend, showDialogResponse);
}
/**
 * Show dialog modal to display server type response
 * @param {object} data response from the server that contains new programme type
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let programmeType = data.result;
        let msg = data.msg;
        alertMsg(msg);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
