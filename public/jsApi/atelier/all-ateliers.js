/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("cas", getAllCas);
    $("button#btn-edit-cas").click(editCas);
    $("button#btn-delete-cas").click(deleteCas);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Edit Cas juridique
 * @param {Event} e Information about the event
 */
const editCas = (e) => {
    e.preventDefault();
    let nomCas = $("input#nom-cas").val();
    let dataToSend = {
        "cas_nom": nomCas,
    }
    updateData(`cas/${e.target.dataset.casId}`, dataToSend, showDialogResponse);
}
/**
 * Delete Cas juridique
 * @param {Event} e Information about the event
 */
const deleteCas = (e) => {
    e.preventDefault();
    deleteData(`cas/${e.target.dataset.casId}`, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new cas juridique
 */
const showDialogResponse = (data) => {
    let cas = data.result;
    let msg = data.msg;
    alert(msg);
    getAllData("cas", getAllCas);
}
/**
 * Retrieve all cas juridiques from the server
 * @param {object} data response from the server that contains all cas juridiques
 */
const getAllCas = (data)=>{
    let cas = data.cases;
    $.each(cas, function (indexInArray, oneCas) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);
        let tdNameCas = $("<td>");
        tdNameCas.text(oneCas.cas_nom);
        tr.append(tdNb, tdNameCas);
        $("tbody#tbl_cas_juridique").append(tr);
    });
}