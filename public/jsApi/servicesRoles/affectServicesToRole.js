/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var roles = null;
var services = null;
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    debugger
    // fill the select field with roles:
    getAllData("all-roles", fillSelectRoles);
    // create checkboxes for the services:
    getAllData("all-services", createCheckboxesServices);
    $("select#role").change(function (e) {
        e.preventDefault();
        $(`input[type=checkbox]`).prop("checked", false);
        checkServicesByRole($(this).val());
    });
    $("button#btnMatchServiceRole").click(function (e) {
        e.preventDefault();
        debugger
        let selectedRole = $("select#role").val();
        let services_ids = getSelectedServices();
            let dataToSend = {
                "services": services_ids,
            }
        updateData(`match-role-services/${selectedRole}`, dataToSend, attachServicesToRole);
    });
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Fill the select field of roles from server
 * @param {object} data response from the server that contains roles
 */
const fillSelectRoles = (data) => {
    roles = data.result;
    let selectRole = $("select#role");
    $.each(roles, function (indexInArray, role) {
        let optionRole = $("<option>");
        optionRole.text(role.role_nom);
        optionRole.val(role.id);
        selectRole.append(optionRole);
    });
}
/**
 * Create checkboxes for each coming service from the server
 * @param {object} data response from the server that contains services
 */
const createCheckboxesServices = (data) => {
    services = data.services;
    let divCheckboxesServices = $("div#service_check");
    $.each(services, function (indexInArray, service) {
        let divContainerService = $("<div class=perm>");
        let checkboxService = $("<input type=checkbox class='form-check-input'>");
        let labelService = $("<label>");
        labelService.text(service.service_nom);
        checkboxService.val(service.id);
        divContainerService.append(checkboxService, labelService);
        divCheckboxesServices.append(divContainerService);
    });
    checkServicesByRole($("select#role").val());
}
/**
 * check all services of the selected role
 * @param role {int} selected role id 
 */
const checkServicesByRole = (role) => {
    $.each(services, function (indexInArray, service) {
        let checkboxService = $(`input[value=${service.id}]`);
        if (service.role_id == role) {
            checkboxService.prop("checked", true);
        }
    });
}
/**
 * Match services with the selected role (used for adding & editing)
 * @param {object} data response from the server that contains the role with new attached services
 */
const attachServicesToRole = (data) => {
    let role = data.result;
    let indexOldRole = roles.findIndex((old_role, index) => {
        return old_role.id == role.id;
    });
    roles[indexOldRole] = role;
    alert(data.msg);
    getAllData("all-services", refreshServices);
}
/**
 * get all selected services to attach them to the role
 * @returns {arr[]} selected services
 */
const getSelectedServices = () => {
    let services_ids = [];
    $.each(services, function (indexInArray, service) {
        let checkboxService = $(`input[value=${service.id}]`);
        if (checkboxService.prop("checked")) {
            services_ids.push(service.id);
        }
    });
    return services_ids;
}
/**
 * Refresh the services array after each matching.
 * @param {object} data response from the server that contains the refreshed services
 */
const refreshServices = (data)=>{
    services = data.services;
    checkServicesByRole($("select#role").val());
}
