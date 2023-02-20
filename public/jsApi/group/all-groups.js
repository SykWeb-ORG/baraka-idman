/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var groupes = null;
var groupToOperate = null;
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("ateliers", getAllAteliers);
    getAllData("groupes", getAllGroups);
    $("button#btn-edit-group").click(editGroup);
    $("button#btn-delete-group").click(deleteGroup);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Edit groupe
 * @param {Event} e Information about the event
 */
const editGroup = (e) => {
    e.preventDefault();
    let nomGroup = $("input#nom-group").val();
    let atelierId = $("select#atelier").val();
    let dataToSend = {
        "groupe_nom": nomGroup,
        "atelier": atelierId,
    }
    updateData(`groupes/${groupToOperate.id}`, dataToSend, showDialogResponse);
}
/**
 * Delete groupe
 * @param {Event} e Information about the event
 */
const deleteGroup = (e) => {
    e.preventDefault();
    deleteData(`groupes/${groupToOperate.id}`, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new groupe
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let group = data.result;
        let msg = data.msg;
        alertMsg(msg);
        $("tbody#tbl_group").empty();
        getAllData("groupes", getAllGroups);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
/**
 * Retrieve all groupes from the server
 * @param {object} data response from the server that contains all groupes
 */
const getAllGroups = (data)=>{
    groupes = data.groupes;
    $.each(groupes, function (indexInArray, group) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);
        let tdNameGroup = $("<td>");
        tdNameGroup.text(group.groupe_nom);
        let tdAtelier = $("<td>");
        tdAtelier.text(group.atelier.atelier_nom);
        let tdEditGroup = $(`<td class="text-center">`);
        let btnEditGroup = $(`<button type='submit' class='btn btn-sm btn-sm-square btn-primary m-2' data-group-id=${group.id} data-bs-toggle='modal' data-bs-target='#modal_EditGrp'  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier Groupe'>`);
        btnEditGroup.append("<i class='fas fa-edit'></i>");
        btnEditGroup.click(function (e) { 
            e.preventDefault();
            fillModalEditGroup($(this).data("group-id"));
        });
        tdEditGroup.append(btnEditGroup);
        let tdDeleteGroup = $(`<td class="text-center">`);
        let btnDeleteGroup = $(`<button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2" data-group-id=${group.id} data-bs-toggle="modal" data-bs-target="#modal_DeleteGrp"  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer Groupe'>`);
        btnDeleteGroup.append(`<i class="fas fa-trash"></i>`);
        btnDeleteGroup.click(function (e) {
            e.preventDefault();
            groupToOperate = groupes.find(oneGroup => oneGroup.id == $(this).data("group-id"));
        });
        tdDeleteGroup.append(btnDeleteGroup);
        tr.append(tdNb, tdNameGroup, tdAtelier, tdEditGroup, tdDeleteGroup);
        $("tbody#tbl_group").append(tr);
    });
}
const fillModalEditGroup = (groupId) => {
    groupToOperate = groupes.find(oneGroup => oneGroup.id == groupId);
    $("input#nom-group").val(groupToOperate.groupe_nom);
    $("select#atelier").val(groupToOperate.atelier_id);
}
/**
 * Retrieve all ateliers from the server
 * @param {object} data response from the server that contains all ateliers
 */
const getAllAteliers = (data) => {
    let ateliers = data.ateliers;
    $.each(ateliers, function (indexInArray, atelier) {
        let option = $("<option>");
        option.text(atelier.atelier_nom);
        option.val(atelier.id);
        $("select#atelier").append(option);
    });
}
