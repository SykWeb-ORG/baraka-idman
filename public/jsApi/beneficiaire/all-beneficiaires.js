/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    $("input[type='radio']").click(changeIntegrationStatus);
    FillSelectYear();
    getAllData(`all-affected-services`, fillSelectServices);
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
/**
 * Fill the select field with all services
 * @param {object} data response from the server that contains all services
 */
const fillSelectServices = (data) => {
    let services = data.services;
    $.each(services, function (indexInArray, service) {
        let option = $("<option>");
        option.text(service.service_nom);
        option.val(service.id);
        $("select#service").append(option);
    });
    $("select#service").select2({
        placeholder: 'Séléctionner un service ...',
        dropdownParent: $('.modal-bodyF'),
    });
}
function FillSelectYear(){
    let YearDropdown = document.getElementById('year'); 
    let currentYear = new Date().getFullYear();    
    let earliestYear = 2000;     
    while (currentYear >= earliestYear) {      
      let YearOption = document.createElement('option');          
      YearOption.text = currentYear;      
      YearOption.value = currentYear;        
      YearDropdown.add(YearOption);      
      currentYear -= 1;    
    }
}
