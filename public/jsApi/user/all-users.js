/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    $("div.toggle").click(changeActiveStatus);
    getAllData(`all-roles`, fillSelectRoles);
    getAllData(`zones`, fillSelectZones);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains modified user
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let user = data.result;
        let msg = data.msg;
        alertMsg(msg);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
/**
 * Change the active status of the selected user
 * @param {Event} e Information about the event
 */
const changeActiveStatus = (e) => {
    let toggleInp = $(e.target).parents("td").find("input[type=checkbox]");
    let dataToSend = {
        "active": !toggleInp.prop("checked"),
    }
    updateData(`activation-account-user/${toggleInp.data(`user-id`)}`, dataToSend, showDialogResponse);
}
/**
 * Fill the select field with all roles
 * @param {object} data response from the server that contains all roles
 */
const fillSelectRoles = (data) => {
    let roles = data.result;
    $.each(roles, function (indexInArray, role) {
        let option = $("<option>");
        option.text(role.role_nom);
        option.val(role.role_nom);
        $("select#role").append(option);
    });
    $("select#role").select2({
        placeholder: 'Séléctionner un role ...',
        dropdownParent: $('.modal-bodyF'),
    });
}
/**
 * Fill the select field with all zones
 * @param {object} data response from the server that contains all zones
 */
const fillSelectZones = (data) => {
    let zones = data.zones;
    $.each(zones, function (indexInArray, zone) {
        let option = $("<option>");
        option.text(zone.zone_nom);
        option.val(zone.id);
        $("select#zone").append(option);
    });
    $("select#zone").select2({
        placeholder: 'Séléctionner un zone ...',
        dropdownParent: $('.modal-bodyF'),
    });
}
