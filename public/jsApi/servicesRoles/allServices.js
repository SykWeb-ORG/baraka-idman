/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var services = null;
var serviceToOperate = null;

/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("all-services", getAllServices);
    getAllData("serviceTypes", fillSelectServiceTypes);
    $("button#btn-edit-service").click(editService);
    $("button#btn-delete-service").click(deleteService);

});

/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************

/**
 * Edit Services
 * @param {Event} e Information about the event
 */
const editService = (e) => {
    e.preventDefault();
    let nomService = $("input#service_nom").val();
    let serviceType = $("select#type-service").val();
    let dataToSend = {
        "service_nom": nomService,
        "service_type": serviceType,
    }
    updateData(`services/${serviceToOperate.id}`, dataToSend, showDialogResponse);
}

/**
 * Delete Service
 * @param {Event} e Information about the event
 */
const deleteService = (e) => {
    e.preventDefault();
    deleteData(`services/${serviceToOperate.id}`, showDialogResponse);
}

/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new service
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let service = data.result;
        let msg = data.msg;
        alertMsg(msg);
        $("select#type-service").val("");
        $("select#type-service").trigger('change');
        $("tbody#tbl_services").empty();
        getAllData("all-services", getAllServices);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}


/**
 * Retrieve all services from the server
 * @param {object} data response from the server that contains all services
 */
const getAllServices = (data) => {
    services = data.services;
    $.each(services, function(indexInArray, oneService) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);
        let tdNameService = $("<td>");
        tdNameService.text(oneService.service_nom);
        let tdServiceType = $("<td>");
        tdServiceType.text(oneService.service_type ? oneService.service_type.service_type_nom : "");

        let tdEditService = $(`<td class="text-center">`);
        let btnEditService = $(`<button type='submit' class='btn btn-primary m-2' data-service-id=${oneService.id} data-bs-toggle='modal' data-bs-target='#modal_EditService'  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier Service'>`);
        btnEditService.append("<i class='fas fa-edit'></i>Modifier");
        btnEditService.click(function (e) { 
            e.preventDefault();
            fillModalEditService($(this).data("service-id"));
        });
        tdEditService.append(btnEditService);

        let tdDeleteService = $(`<td class="text-center">`);
        let btnDeleteService = $(`<button type="submit" class="btn btn-primary m-2" data-service-id=${oneService.id} data-bs-toggle="modal" data-bs-target="#modal_DeleteService"  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer Service'>`);
        btnDeleteService.append(`<i class="fas fa-trash"></i>Supprimer`);
        btnDeleteService.click(function (e) {
            e.preventDefault();
            serviceToOperate = services.find(oneService => oneService.id == $(this).data("service-id"));
        });
        tdDeleteService.append(btnDeleteService);

        tr.append(tdNb, tdNameService, tdServiceType, tdEditService, tdDeleteService);
        $("tbody#tbl_services").append(tr);
    });
}

const fillModalEditService = (serviceId) => {
    serviceToOperate = services.find(oneService => oneService.id == serviceId);
    $("input#service_nom").val(serviceToOperate.service_nom);
    $("select#type-service").val(serviceToOperate.service_type ? serviceToOperate.service_type.id : "");
    $("select#type-service").trigger('change');
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
