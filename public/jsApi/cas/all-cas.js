/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var cas = null;
var casToOperate = null;
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
    updateData(`cas/${casToOperate.id}`, dataToSend, showDialogResponse);
}
/**
 * Delete Cas juridique
 * @param {Event} e Information about the event
 */
const deleteCas = (e) => {
    e.preventDefault();
    deleteData(`cas/${casToOperate.id}`, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new cas juridique
 */
const showDialogResponse = (data) => {
    debugger
    let cas = data.result;
    let msg = data.msg;
    alert(msg);
    if (data.status == 200) {
        $("tbody#tbl_cas_juridique").empty();
        getAllData("cas", getAllCas);
    }
}
/**
 * Retrieve all cas juridiques from the server
 * @param {object} data response from the server that contains all cas juridiques
 */
const getAllCas = (data)=>{
    cas = data.cases;
    $.each(cas, function (indexInArray, oneCas) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);
        let tdNameCas = $("<td>");
        tdNameCas.text(oneCas.cas_nom);
        let tdEditCas = $(`<td class="text-center">`);
        let btnEditCas = $(`<button type='submit' class='btn btn-sm btn-sm-square btn-primary m-2' data-cas-id=${oneCas.id} data-bs-toggle='modal' data-bs-target='#modal_Edit'  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier Cas Juridique'>`);
        btnEditCas.append("<i class='fas fa-edit'></i>");
        btnEditCas.click(function (e) { 
            e.preventDefault();
            fillModalEditCas($(this).data("cas-id"));
        });
        tdEditCas.append(btnEditCas);
        let tdDeleteCas = $(`<td class="text-center">`);
        let btnDeleteCas = $(`<button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2" data-cas-id=${oneCas.id} data-bs-toggle="modal" data-bs-target="#modal_Delete"  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer Cas Juridique'>`);
        btnDeleteCas.append(`<i class="fas fa-trash"></i>`);
        btnDeleteCas.click(function (e) {
            e.preventDefault();
            casToOperate = cas.find(oneCas => oneCas.id == $(this).data("cas-id"));
        });
        tdDeleteCas.append(btnDeleteCas);
        tr.append(tdNb, tdNameCas, tdEditCas, tdDeleteCas);
        $("tbody#tbl_cas_juridique").append(tr);
    });
}
const fillModalEditCas = (casId) => {
    casToOperate = cas.find(oneCas => oneCas.id == casId);
    $("input#nom-cas").val(casToOperate.cas_nom);
}
