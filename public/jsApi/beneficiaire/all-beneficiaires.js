/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    $("input[type='radio']").click(changeIntegrationStatus);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains modified beneficiaire
 */
const showDialogResponse = (data) => {
    let beneficiaire = data.result;
    let msg = data.msg;
    alert(msg);
}
/**
 * Change the integration status of the selected beneficiaire
 * @param {object} beneficiaire modified beneficiaire
 */
const changeIntegrationStatus = (e) => {
    let dataToSend = {
        "integration_status": e.target.value,
    }
    updateData(`integration-status/${e.target.dataset.beneficiaireId}`, dataToSend, showDialogResponse);
}
