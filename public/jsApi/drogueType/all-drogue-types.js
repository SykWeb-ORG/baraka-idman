/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var drogueTypes = null;
var drogueTypeToOperate = null;
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("drogueTypes", getAllDrogueType);
    $("button#btn-edit-drogue-type").click(editDrogueType);
    $("button#btn-delete-drogue-type").click(deleteDrogueType);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Edit drogue 
 * @param {Event} e Information about the event
 */
const editDrogueType = (e) => {
    e.preventDefault();
    let nomDrogueType = $("input#nom-drogue-type").val();
    let dataToSend = {
        "drogue_nom": nomDrogueType,
    }
    updateData(`drogueTypes/${drogueTypeToOperate.id}`, dataToSend, showDialogResponse);
}
/**
 * Delete drogue 
 * @param {Event} e Information about the event
 */
const deleteDrogueType = (e) => {
    e.preventDefault();
    deleteData(`drogueTypes/${drogueTypeToOperate.id}`, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new drogue 
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let drogueType = data.result;
        let msg = data.msg;
        alertMsg(msg);
        $("tbody#tbl_drogue_types").empty();
        getAllData("drogueTypes", getAllDrogueType);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
/**
 * Retrieve all drogues from the server
 * @param {object} data response from the server that contains all drogues
 */
const getAllDrogueType = (data)=>{
    drogueTypes = data.drogue_types;
    $.each(drogueTypes, function (indexInArray, drogueType) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);
        let tdNameDrogueType = $("<td>");
        tdNameDrogueType.text(drogueType.drogue_nom);
        let tdEditDrogueType = $(`<td class="text-center">`);
        let btnEditDrogueType = $(`<button type='submit' class='btn btn-primary m-2' data-drogue-type-id=${drogueType.id} data-bs-toggle='modal' data-bs-target='#modal_EditTypeDrogue'  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier drogue'>`);
        btnEditDrogueType.append("<i class='fas fa-edit'></i>Modifier");
        btnEditDrogueType.click(function (e) { 
            e.preventDefault();
            fillModalEditDrogueType($(this).data("drogue-type-id"));
        });
        tdEditDrogueType.append(btnEditDrogueType);
        let tdDeleteDrogueType = $(`<td class="text-center">`);
        let btnDeleteDrogueType = $(`<button type="submit" class="btn btn-primary m-2" data-drogue-type-id=${drogueType.id} data-bs-toggle="modal" data-bs-target="#modal_DeleteTypeDrogue"  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer drogue'>`);
        btnDeleteDrogueType.append(`<i class="fas fa-trash"></i>Supprimer`);
        btnDeleteDrogueType.click(function (e) {
            e.preventDefault();
            drogueTypeToOperate = drogueTypes.find(oneDrogueType => oneDrogueType.id == $(this).data("drogue-type-id"));
        });
        tdDeleteDrogueType.append(btnDeleteDrogueType);
        tr.append(tdNb, tdNameDrogueType, tdEditDrogueType, tdDeleteDrogueType);
        $("tbody#tbl_drogue_types").append(tr);
    });
}
const fillModalEditDrogueType = (drogueTypeId) => {
    drogueTypeToOperate = drogueTypes.find(drogueType => drogueType.id == drogueTypeId);
    $("input#nom-drogue-type").val(drogueTypeToOperate.drogue_nom);
}
