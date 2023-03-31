/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var ateliers = null;
var atelierToOperate = null;
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("ateliers", getAllAteliers);
    $("button#btn-edit-atelier").click(editAtelier);
    $("button#btn-delete-atelier").click(deleteAtelier);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Edit atelier
 * @param {Event} e Information about the event
 */
const editAtelier = (e) => {
    e.preventDefault();
    let nomAtelier = $("input#nom-atelier").val();
    let dataToSend = {
        "atelier_nom": nomAtelier,
    }
    updateData(`ateliers/${atelierToOperate.id}`, dataToSend, showDialogResponse);
}
/**
 * Delete atelier
 * @param {Event} e Information about the event
 */
const deleteAtelier = (e) => {
    e.preventDefault();
    deleteData(`ateliers/${atelierToOperate.id}`, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new atelier 
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let atelier = data.result;
        let msg = data.msg;
        alertMsg(msg);
        $("tbody#tbl_atelier").empty();
        getAllData("ateliers", getAllAteliers);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
/**
 * Retrieve all ateliers from the server
 * @param {object} data response from the server that contains all ateliers
 */
const getAllAteliers = (data)=>{
    ateliers = data.ateliers;
    $.each(ateliers, function (indexInArray, atelier) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);
        let tdNameAtelier = $("<td>");
        tdNameAtelier.text(atelier.atelier_nom);
        let tdEditAtelier = $(`<td class="text-center">`);
        let btnEditAtelier = $(`<button type='submit' class='btn btn-primary m-2' data-atelier-id=${atelier.id} data-bs-toggle='modal' data-bs-target='#modal_EditAtelier'  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier Atelier'>`);
        btnEditAtelier.append("<i class='fas fa-edit'></i>Modifier");
        btnEditAtelier.click(function (e) { 
            e.preventDefault();
            fillModalEditAtelier($(this).data("atelier-id"));
        });
        tdEditAtelier.append(btnEditAtelier);
        let tdDeleteAtelier = $(`<td class="text-center">`);
        let btnDeleteAtelier = $(`<button type="submit" class="btn btn-primary m-2" data-atelier-id=${atelier.id} data-bs-toggle="modal" data-bs-target="#modal_DeleteAtelier"  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer Atelier'>`);
        btnDeleteAtelier.append(`<i class="fas fa-trash"></i>Supprimer`);
        btnDeleteAtelier.click(function (e) {
            e.preventDefault();
            atelierToOperate = ateliers.find(oneAtelier => oneAtelier.id == $(this).data("atelier-id"));
        });
        tdDeleteAtelier.append(btnDeleteAtelier);
        tr.append(tdNb, tdNameAtelier, tdEditAtelier, tdDeleteAtelier);
        $("tbody#tbl_atelier").append(tr);
    });
}
const fillModalEditAtelier = (atelierId) => {
    atelierToOperate = ateliers.find(atelier => atelier.id == atelierId);
    $("input#nom-atelier").val(atelierToOperate.atelier_nom);
}
