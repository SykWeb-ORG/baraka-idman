/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var zones = null;
var zoneToOperate = null;
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("zones", getAllZones);
    $("button#btn-edit-zone").click(editZone);
    $("button#btn-delete-zone").click(deleteZone);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Edit zone
 * @param {Event} e Information about the event
 */
const editZone = (e) => {
    e.preventDefault();
    let nomZone = $("input#nom-zone").val();
    let dataToSend = {
        "zone_nom": nomZone,
    }
    updateData(`zones/${zoneToOperate.id}`, dataToSend, showDialogResponse);
}
/**
 * Delete zone
 * @param {Event} e Information about the event
 */
const deleteZone = (e) => {
    e.preventDefault();
    deleteData(`zones/${zoneToOperate.id}`, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains modified zone 
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let zone = data.result;
        let msg = data.msg;
        alertMsg(msg);
        $("tbody#tbl_zone").empty();
        getAllData("zones", getAllZones);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
/**
 * Retrieve all zones from the server
 * @param {object} data response from the server that contains all zones
 */
const getAllZones = (data)=>{
    zones = data.zones;
    $.each(zones, function (indexInArray, zone) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);
        let tdNameZone = $("<td>");
        tdNameZone.text(zone.zone_nom);
        let tdEditZone = $(`<td class="text-center">`);
        let btnEditZone = $(`<button type='submit' class='btn btn-sm btn-sm-square btn-primary m-2' data-zone-id=${zone.id} data-bs-toggle='modal' data-bs-target='#modal_EditZone'  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier Zone'>`);
        btnEditZone.append("<i class='fas fa-edit'></i>");
        btnEditZone.click(function (e) { 
            e.preventDefault();
            fillModalEditZone($(this).data("zone-id"));
        });
        tdEditZone.append(btnEditZone);
        let tdDeleteZone = $(`<td class="text-center">`);
        let btnDeleteZone = $(`<button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2" data-zone-id=${zone.id} data-bs-toggle="modal" data-bs-target="#modal_DeleteZone"  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer Zone'>`);
        btnDeleteZone.append(`<i class="fas fa-trash"></i>`);
        btnDeleteZone.click(function (e) {
            e.preventDefault();
            zoneToOperate = zones.find(oneZone => oneZone.id == $(this).data("zone-id"));
        });
        tdDeleteZone.append(btnDeleteZone);
        tr.append(tdNb, tdNameZone, tdEditZone, tdDeleteZone);
        $("tbody#tbl_zone").append(tr);
    });
}
const fillModalEditZone = (zoneId) => {
    zoneToOperate = zones.find(zone => zone.id == zoneId);
    $("input#nom-zone").val(zoneToOperate.zone_nom);
}
