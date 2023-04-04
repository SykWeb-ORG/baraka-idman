console.log(intervenant);
/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var programmes = null;
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    debugger
    // create checkboxes for each programme:
    getAllData("programmes", createCheckboxesProgrammes);
    $("button#btnMatchIntervenantProgrammes").click(function (e) {
        e.preventDefault();
        debugger
        let programmes_ids = getSelectedProgrammes();
        let dataToSend = {
            "programmes": programmes_ids,
        }
        updateData(`match-intervenant-programmes/${intervenant.id}`, dataToSend, attachProgrammesToIntervenant);
    });
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Create checkboxes for each programme
 * @param {object} data contains all programmes
 */
const createCheckboxesProgrammes = (data) => {
    let programmes = data.programmes;
    let divCheckboxesProgrammes = $("div#programme_check");
    $.each(programmes, function (indexInArray, programme) {
        let divContainerProgramme = $("<div class=perm>");
        let checkboxProgramme = $("<input type=checkbox class='form-check-input'>");
        let labelProgramme = $("<label>");
        labelProgramme.text(programme.programme_nom);
        checkboxProgramme.val(programme.id);
        divContainerProgramme.append(checkboxProgramme, labelProgramme);
        divCheckboxesProgrammes.append(divContainerProgramme);
    });
    checkProgrammesByIntervenant(intervenant);
}
/**
 * check all programmes of the selected intervenant
 * @param {object} intervenant selected intervenant
 */
const checkProgrammesByIntervenant = (intervenant) => {
    $.each(intervenant.programmes, function (indexInArray, programme) {
        let checkboxProgramme = $(`input[value=${programme.id}]`);
        checkboxProgramme.prop("checked", true);
    });
}
/**
 * Match programmes with the selected intervenant (used for adding & editing)
 * @param {object} data response from the server that contains the intervenant with new attached programmes
 */
const attachProgrammesToIntervenant = (data) => {
    intervenant = data.result;
    if (data.status == 200) {
        alertMsg(data.msg);
    } else {
        console.log(data);
    }
}
/**
 * get all selected programmes to attach them to the intervenant
 * @returns {arr[]} selected programmes
 */
const getSelectedProgrammes = () => {
    let programmes_ids = [];
    $("input[type=checkbox]").each(function (index, element) {
        if (element.checked) {
            programmes_ids.push(element.value);
        }
    });
    return programmes_ids;
}
