/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("serviceTypes", fillSelectServiceTypes);
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
    let serviceType = $("select#type-service").val();
    let dataToSend = {
        "service_nom": nomService,
        "service_type": serviceType,
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
        $("select#type-service").val("").trigger("change");
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
/**
 * Fill the select field with all service types
 * @param {object} data response from the server that contains all service types
 */
const fillSelectServiceTypes = (data)=>{
    let service_types = data.service_types;
    $.each(service_types, function (indexInArray, service_type) {
        let option = $("<option>");
        option.text(service_type.service_type_nom);
        option.val(service_type.id);
        $("select#type-service").append(option);
    });
    $("select#type-service").select2({
        placeholder: 'Séléctionner un type service...',
    });
}
