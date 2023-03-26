/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var programmeTypes = null;
var programmeTypeToOperate = null;
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("programmeTypes", getAllProgrammeType);
    $("button#btn-edit-programme-type").click(editProgrammeType);
    $("button#btn-delete-programme-type").click(deleteProgrammeType);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Edit programme type
 * @param {Event} e Information about the event
 */
const editProgrammeType = (e) => {
    e.preventDefault();
    let nomProgrammeType = $("input#nom-programme-type").val();
    let dataToSend = {
        "programme_type_nom": nomProgrammeType,
    }
    updateData(`programmeTypes/${programmeTypeToOperate.id}`, dataToSend, showDialogResponse);
}
/**
 * Delete programme type
 * @param {Event} e Information about the event
 */
const deleteProgrammeType = (e) => {
    e.preventDefault();
    deleteData(`programmeTypes/${programmeTypeToOperate.id}`, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new programme type 
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let programmeType = data.result;
        let msg = data.msg;
        alertMsg(msg);
        $("tbody#tbl_programme_types").empty();
        getAllData("programmeTypes", getAllProgrammeType);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
/**
 * Retrieve all programme types from the server
 * @param {object} data response from the server that contains all programme types
 */
const getAllProgrammeType = (data)=>{
    programmeTypes = data.programme_types;
    $.each(programmeTypes, function (indexInArray, programmeType) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);
        let tdNameProgrammeType = $("<td>");
        tdNameProgrammeType.text(programmeType.programme_type_nom);
        let tdEditProgrammeType = $(`<td class="text-center">`);
        let btnEditProgrammeType = $(`<button type='submit' class='btn btn-sm btn-sm-square btn-primary m-2' data-programme-type-id=${programmeType.id} data-bs-toggle='modal' data-bs-target='#modal_EditProgrammeType'  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier type de programme'>`);
        btnEditProgrammeType.append("<i class='fas fa-edit'></i>");
        btnEditProgrammeType.click(function (e) { 
            e.preventDefault();
            fillModalEditProgrammeType($(this).data("programme-type-id"));
        });
        tdEditProgrammeType.append(btnEditProgrammeType);
        let tdDeleteProgrammeType = $(`<td class="text-center">`);
        let btnDeleteProgrammeType = $(`<button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2" data-programme-type-id=${programmeType.id} data-bs-toggle="modal" data-bs-target="#modal_DeleteProgrammeType"  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer type de programme'>`);
        btnDeleteProgrammeType.append(`<i class="fas fa-trash"></i>`);
        btnDeleteProgrammeType.click(function (e) {
            e.preventDefault();
            programmeTypeToOperate = programmeTypes.find(oneProgrammeType => oneProgrammeType.id == $(this).data("programme-type-id"));
        });
        tdDeleteProgrammeType.append(btnDeleteProgrammeType);
        tr.append(tdNb, tdNameProgrammeType, tdEditProgrammeType, tdDeleteProgrammeType);
        $("tbody#tbl_programme_types").append(tr);
    });
}
const fillModalEditProgrammeType = (programmeTypeId) => {
    programmeTypeToOperate = programmeTypes.find(programmeType => programmeType.id == programmeTypeId);
    $("input#nom-programme-type").val(programmeTypeToOperate.programme_type_nom);
}
