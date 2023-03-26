/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var serviceTypes = null;
var serviceTypeToOperate = null;
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("serviceTypes", getAllServiceType);
    $("button#btn-edit-service-type").click(editServiceType);
    $("button#btn-delete-service-type").click(deleteServiceType);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Edit service type
 * @param {Event} e Information about the event
 */
const editServiceType = (e) => {
    e.preventDefault();
    let nomServiceType = $("input#nom-service-type").val();
    let dataToSend = {
        "service_type_nom": nomServiceType,
    }
    updateData(`serviceTypes/${serviceTypeToOperate.id}`, dataToSend, showDialogResponse);
}
/**
 * Delete service type
 * @param {Event} e Information about the event
 */
const deleteServiceType = (e) => {
    e.preventDefault();
    deleteData(`serviceTypes/${serviceTypeToOperate.id}`, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new service type 
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let serviceType = data.result;
        let msg = data.msg;
        alertMsg(msg);
        $("tbody#tbl_service_types").empty();
        getAllData("serviceTypes", getAllServiceType);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
/**
 * Retrieve all service types from the server
 * @param {object} data response from the server that contains all service types
 */
const getAllServiceType = (data)=>{
    serviceTypes = data.service_types;
    $.each(serviceTypes, function (indexInArray, serviceType) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);
        let tdNameServiceType = $("<td>");
        tdNameServiceType.text(serviceType.service_type_nom);
        let tdEditServiceType = $(`<td class="text-center">`);
        let btnEditServiceType = $(`<button type='submit' class='btn btn-sm btn-sm-square btn-primary m-2' data-service-type-id=${serviceType.id} data-bs-toggle='modal' data-bs-target='#modal_EditServiceType'  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier type de service'>`);
        btnEditServiceType.append("<i class='fas fa-edit'></i>");
        btnEditServiceType.click(function (e) { 
            e.preventDefault();
            fillModalEditServiceType($(this).data("service-type-id"));
        });
        tdEditServiceType.append(btnEditServiceType);
        let tdDeleteServiceType = $(`<td class="text-center">`);
        let btnDeleteServiceType = $(`<button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2" data-service-type-id=${serviceType.id} data-bs-toggle="modal" data-bs-target="#modal_DeleteServiceType"  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer type de service'>`);
        btnDeleteServiceType.append(`<i class="fas fa-trash"></i>`);
        btnDeleteServiceType.click(function (e) {
            e.preventDefault();
            serviceTypeToOperate = serviceTypes.find(oneServiceType => oneServiceType.id == $(this).data("service-type-id"));
        });
        tdDeleteServiceType.append(btnDeleteServiceType);
        tr.append(tdNb, tdNameServiceType, tdEditServiceType, tdDeleteServiceType);
        $("tbody#tbl_service_types").append(tr);
    });
}
const fillModalEditServiceType = (serviceTypeId) => {
    serviceTypeToOperate = serviceTypes.find(serviceType => serviceType.id == serviceTypeId);
    $("input#nom-service-type").val(serviceTypeToOperate.service_type_nom);
}
