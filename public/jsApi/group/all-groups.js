/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("ateliers", getAllAteliers);
    $("button#btn-edit-atelier").click(editAtelier);
    $("button#btn-delete-atelier").click(deleteCas);
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
    updateData(`ateliers/${e.target.dataset.atelierId}`, dataToSend, showDialogResponse);
}
/**
 * Delete atelier
 * @param {Event} e Information about the event
 */
const deleteCas = (e) => {
    e.preventDefault();
    deleteData(`ateliers/${e.target.dataset.atelierId}`, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new atelier juridique
 */
const showDialogResponse = (data) => {
    let atelier = data.result;
    let msg = data.msg;
    alert(msg);
    getAllData("ateliers", getAllAteliers);
}
/**
 * Retrieve all ateliers from the server
 * @param {object} data response from the server that contains all ateliers
 */
const getAllAteliers = (data)=>{
    let ateliers = data.ateliers;
    $.each(ateliers, function (indexInArray, atelier) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);
        let tdNameAtelier = $("<td>");
        tdNameAtelier.text(atelier.atelier_nom);
        tr.append(tdNb, tdNameAtelier);
        $("tbody#tbl_atelier_juridique").append(tr);
    });
}
