/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("all-affected-zones", getAllZones);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Retrieve all affected zones from the server
 * @param {object} data response from the server that contains all affected zones
 */
const getAllZones = (data) => {
    zones = data.zones;
    $.each(zones, function (indexInArray, zone) {
        let li = $(`<li>${zone.zone_nom}</li>`);
        $("ul#list-zones").append(li);
    });
}
