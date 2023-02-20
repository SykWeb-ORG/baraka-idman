/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    $("input[type='radio']").click(changeIntegrationStatus);
    $(".service_item").click(function (e) {
        let filterValue = $(this).data(`filter-val`);
        displayBeneficiairesByService(filterValue);
    });
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains modified beneficiaire
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let beneficiaire = data.result;
        let msg = data.msg;
        alertMsg(msg);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
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
const displayBeneficiairesByService = (filterValue)=>{
    $(`div.table-responsive`).not(`[class*='d-none']`).addClass('d-none');
    let targetTable = $(`div#${filterValue}`)
    targetTable.removeClass('d-none');
}
