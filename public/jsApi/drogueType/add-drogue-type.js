/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    $("button#btn-add-drogue-type").click(addDrogueType);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Add new drogue 
 * @param {Event} e Information about the event
 */
const addDrogueType = (e) => {
    e.preventDefault();
    let nomDrogueType = $("input#nom-drogue-type").val();
    let dataToSend = {
        "drogue_nom": nomDrogueType,
    }
    addData("drogueTypes", dataToSend, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new drogue 
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let drogueType = data.result;
        let msg = data.msg;
        alertMsg(msg);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
