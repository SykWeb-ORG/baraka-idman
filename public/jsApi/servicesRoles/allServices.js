/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var service = null;
var serviceToOperate = null;

/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("all-services", getAllServices);
});

/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************

/**
 * Retrieve all services from the server
 * @param {object} data response from the server that contains all services
 */
const getAllServices = (data) => {
    service = data.services;
    $.each(service, function(indexInArray, oneService) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);
        let tdNameService = $("<td>");
        tdNameService.text(oneService.service_nom);

        let tdEditService = $(`<td class="text-center">`);
        let btnEditService = $(`<button type='submit' class='btn btn-sm btn-sm-square btn-primary m-2' data-service-id=${oneService.id} data-bs-toggle='modal' data-bs-target='#modal_EditService'  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier Service'>`);
        btnEditService.append("<i class='fas fa-edit'></i>");
        btnEditService.click(function (e) { 
            e.preventDefault();
            fillModalEditService($(this).data("service-id"));
        });
        tdEditService.append(btnEditService);

        let tdDeleteService = $(`<td class="text-center">`);
        let btnDeleteService = $(`<button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2" data-service-id=${oneService.id} data-bs-toggle="modal" data-bs-target="#modal_DeleteService"  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer Service'>`);
        btnDeleteService.append(`<i class="fas fa-trash"></i>`);
        btnDeleteService.click(function (e) {
            e.preventDefault();
            serviceToOperate = service.find(oneService => oneService.id == $(this).data("service-id"));
        });
        tdDeleteService.append(btnDeleteService);

        tr.append(tdNb, tdNameService, tdEditService, tdDeleteService);
        $("tbody#tbl_services").append(tr);
    });
}

const fillModalEditService = (serviceId) => {
    serviceToOperate = service.find(oneService => oneService.id == serviceId);
    $("input#service_nom").val(serviceToOperate.service_nom);
}

