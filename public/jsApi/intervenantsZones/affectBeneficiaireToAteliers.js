console.log(intervenant);
/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var zones = null;
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    debugger
    // create checkboxes for each zone:
    getAllData("zones", createCheckboxesZones);
    $("button#btnMatchIntervenantZones").click(function (e) {
        e.preventDefault();
        debugger
        let zones_ids = getSelectedZones();
        let dataToSend = {
            "zones": zones_ids,
        }
        updateData(`match-intervenant-zones/${intervenant.id}`, dataToSend, attachZonesToIntervenant);
    });
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Create checkboxes for each zone in the selected zone
 * @param {object} zone contains the selected atelier
 */
const createCheckboxesZones = (data) => {
    let zones = data.zones;
    let divCheckboxesZones = $("div#zone_check");
    $.each(zones, function (indexInArray, zone) {
        let divContainerZone = $("<div class=perm>");
        let checkboxZone = $("<input type=checkbox class='form-check-input'>");
        let labelZone = $("<label>");
        labelZone.text(zone.zone_nom);
        checkboxZone.val(zone.id);
        divContainerZone.append(checkboxZone, labelZone);
        divCheckboxesZones.append(divContainerZone);
    });
    checkZonesByIntervenant(intervenant);
}
/**
 * check all zones of the selected intervenant
 * @param {object} intervenant selected intervenant
 */
const checkZonesByIntervenant = (intervenant) => {
    $.each(intervenant.zones, function (indexInArray, zone) {
        let checkboxZone = $(`input[value=${zone.id}]`);
        checkboxZone.prop("checked", true);
    });
}
/**
 * Match zones with the selected intervenant (used for adding & editing)
 * @param {object} data response from the server that contains the intervenant with new attached zones
 */
const attachZonesToIntervenant = (data) => {
    intervenant = data.result;
    alert(data.msg);
}
/**
 * get all selected zones to attach them to the intervenant
 * @returns {arr[]} selected zones
 */
const getSelectedZones = () => {
    let zones_ids = [];
    $("input[type=checkbox]").each(function (index, element) {
        if (element.checked) {
            zones_ids.push(element.value);
        }
    });
    return zones_ids;
}
