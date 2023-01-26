/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
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
    updateData(`groupes/${e.target.dataset.groupId}`, dataToSend, showDialogResponse);
}
/**
 * Delete groupe
 * @param {Event} e Information about the event
 */
const deleteGroup = (e) => {
    e.preventDefault();
    deleteData(`groupes/${e.target.dataset.groupId}`, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new groupe
 */
const showDialogResponse = (data) => {
    let group = data.result;
    let msg = data.msg;
    alert(msg);
    getAllData("groupes", getAllGroups);
}
/**
 * Retrieve all groupes from the server
 * @param {object} data response from the server that contains all groupes
 */
const getAllGroups = (data)=>{
    let groupes = data.groupes;
    $.each(groupes, function (indexInArray, group) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);
        let tdNameGroup = $("<td>");
        tdNameGroup.text(group.groupe_nom);
        let tdAtelier = $("<td>");
        tdAtelier.text(group.atelier.atelier_nom);
        tr.append(tdNb, tdNameGroup, tdAtelier);
        $("tbody#tbl_group").append(tr);
    });
}
