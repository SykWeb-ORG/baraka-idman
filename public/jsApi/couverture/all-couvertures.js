/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var couvertures = null;
var couvertureToOperate = null;
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("couvertures", getAllCouvertures);
    $("button#btn-edit-couv-medicale").click(editCouverture);
    $("button#btn-delete-CouvMedicale").click(deleteCouverture);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Edit couverture
 * @param {Event} e Information about the event
 */
const editCouverture = (e) => {
    e.preventDefault();
    let nomCouverture = $("input#nom-couv-medicale").val();
    let dataToSend = {
        "couverture_nom": nomCouverture,
    }
    updateData(`couvertures/${couvertureToOperate.id}`, dataToSend, showDialogResponse);
}
/**
 * Delete couverture
 * @param {Event} e Information about the event
 */
const deleteCouverture = (e) => {
    e.preventDefault();
    deleteData(`couvertures/${couvertureToOperate.id}`, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new couverture 
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let couverture = data.result;
        let msg = data.msg;
        alertMsg(msg);
        $("tbody#tbl_couverture_medicale").empty();
        getAllData("couvertures", getAllCouvertures);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
/**
 * Retrieve all couvertures from the server
 * @param {object} data response from the server that contains all couvertures
 */
const getAllCouvertures = (data)=>{
    couvertures = data.couvertures;
    $.each(couvertures, function (indexInArray, couverture) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);
        let tdNameCouverture = $("<td>");
        tdNameCouverture.text(couverture.couverture_nom);
        let tdEditCouverture = $(`<td class="text-center">`);
        let btnEditCouverture = $(`<button type='submit' class='btn btn-sm btn-sm-square btn-primary m-2' data-couverture-id=${couverture.id} data-bs-toggle='modal' data-bs-target='#modal_EditCouvMedicale'  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier couverture médicale'>`);
        btnEditCouverture.append("<i class='fas fa-edit'></i>");
        btnEditCouverture.click(function (e) { 
            e.preventDefault();
            fillModalEditCouverture($(this).data("couverture-id"));
        });
        tdEditCouverture.append(btnEditCouverture);
        let tdDeleteCouverture = $(`<td class="text-center">`);
        let btnDeleteCouverture = $(`<button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2" data-couverture-id=${couverture.id} data-bs-toggle="modal" data-bs-target="#modal_DeleteCouvMedicale"  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer couverture médicale'>`);
        btnDeleteCouverture.append(`<i class="fas fa-trash"></i>`);
        btnDeleteCouverture.click(function (e) {
            e.preventDefault();
            couvertureToOperate = couvertures.find(oneCouverture => oneCouverture.id == $(this).data("couverture-id"));
        });
        tdDeleteCouverture.append(btnDeleteCouverture);
        tr.append(tdNb, tdNameCouverture, tdEditCouverture, tdDeleteCouverture);
        $("tbody#tbl_couverture_medicale").append(tr);
    });
}
const fillModalEditCouverture = (couvertureId) => {
    couvertureToOperate = couvertures.find(couverture => couverture.id == couvertureId);
    $("input#nom-couv-medicale").val(couvertureToOperate.couverture_nom);
}
