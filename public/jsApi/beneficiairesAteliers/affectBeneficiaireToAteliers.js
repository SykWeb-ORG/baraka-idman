console.log(beneficiaire);
/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var ateliers = null;
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    debugger
    // fill the select field with ateliers:
    getAllData("ateliers", fillSelectAteliers);
    $("select#atelier").change(function (e) {
        e.preventDefault();
        $(`input[type=checkbox]`).prop("checked", false);
        $("div#group_check").html("");
        if ($(this).val() != "") {
            let selectedAtelier = ateliers.find(atelier => atelier.id == $(this).val());
            createCheckboxesGroupes(selectedAtelier);
        }
    });
    $("button#btnMatchGroupBenef").click(function (e) {
        e.preventDefault();
        debugger
        let groupes_ids = getSelectedGroupes();
        let groupes_ids_detach = getUnselectedGroupes();
        let dataToSend = {
            "groupesToAttach": groupes_ids,
            "groupesToDetach": groupes_ids_detach,
        }
        updateData(`match-beneficiaire-ateliers/${beneficiaire.id}`, dataToSend, attachGroupesToBeneficiaire);
    });
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Fill the select field of ateliers from server
 * @param {object} data response from the server that contains ateliers
 */
const fillSelectAteliers = (data) => {
    ateliers = data.ateliers;
    $.each(ateliers, function (indexInArray, atelier) {
        let option = $("<option>");
        option.text(atelier.atelier_nom);
        option.val(atelier.id);
        $("select#atelier").append(option);
    });
    if (ateliers.length > 0) {
        if ($("select#atelier").val() != "") {
            let selectedAtelier = ateliers.find(atelier => atelier.id == $("select#atelier").val());
            createCheckboxesGroupes(selectedAtelier);
        }
    }
}
/**
 * Create checkboxes for each groupe in the selected atelier
 * @param {object} atelier contains the selected atelier
 */
const createCheckboxesGroupes = (atelier) => {
    let groupes = atelier.groupes;
    let divCheckboxesGroupes = $("div#group_check");
    $.each(groupes, function (indexInArray, groupe) {
        let divContainerGroupe = $("<div class=perm>");
        let checkboxGroupe = $("<input type=checkbox class='form-check-input'>");
        let labelGroupe = $("<label>");
        labelGroupe.text(groupe.groupe_nom);
        checkboxGroupe.val(groupe.id);
        divContainerGroupe.append(checkboxGroupe, labelGroupe);
        divCheckboxesGroupes.append(divContainerGroupe);
    });
    checkGroupesByBeneficiaire(beneficiaire);
}
/**
 * check all groupes of the selected beneficiaire
 * @param {object} beneficiaire selected beneficiaire
 */
const checkGroupesByBeneficiaire = (beneficiaire) => {
    $.each(beneficiaire.groupes, function (indexInArray, groupe) {
        let selectedAtelier = $("select#atelier").val();
        if (groupe.atelier.id == selectedAtelier) {
            let checkboxGroupe = $(`input[value=${groupe.id}]`);
            checkboxGroupe.prop("checked", true);
        }
    });
}
/**
 * Match groupes with the selected beneficiaire (used for adding & editing)
 * @param {object} data response from the server that contains the beneficiaire with new attached groupes
 */
const attachGroupesToBeneficiaire = (data) => {
    beneficiaire = data.result;
    alert(data.msg);
}
/**
 * get all selected groupes to attach them to the beneficiaire
 * @returns {arr[]} selected groupes
 */
const getSelectedGroupes = () => {
    let groupes_ids = [];
    $("input[type=checkbox]").each(function (index, element) {
        if (element.checked) {
            groupes_ids.push(element.value);
        }
    });
    return groupes_ids;
}
/**
 * get all unselected groupes to detach them from the beneficiaire
 * @returns {arr[]} unselected groupes
 */
const getUnselectedGroupes = ()=>{
    let groupes_ids = [];
    $("input[type=checkbox]").each(function (index, element) {
        if (!element.checked) {
            groupes_ids.push(element.value);
        }
    });
    return groupes_ids;
}
