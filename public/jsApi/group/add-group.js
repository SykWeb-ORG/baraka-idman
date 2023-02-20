/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("ateliers", getAllAteliers);
    $("button#btn-add-group").click(addGroup);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Add new group
 * @param {Event} e Information about the event
 */
const addGroup = (e) => {
    e.preventDefault();
    let nomGroup = $("input#nom-group").val();
    let atelierId = $("select#atelier").val();
    let dataToSend = {
        "groupe_nom": nomGroup,
        "atelier": atelierId,
    }
    addData("groupes", dataToSend, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new group
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let group = data.result;
        let msg = data.msg;
        alertMsg(msg);
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
    let ateliers = data.ateliers;
    $.each(ateliers, function (indexInArray, atelier) {
        let option = $("<option>");
        option.text(atelier.atelier_nom);
        option.val(atelier.id);
        $("select#atelier").append(option);
    });
}
