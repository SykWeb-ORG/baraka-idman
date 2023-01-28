console.log(beneficiaire);
/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    debugger
    getAllData("cas", createCheckboxesCasJuridiques);
    $("button#btnMatchCasJuridiqueBenef").click(function (e) {
        e.preventDefault();
        debugger
        let cas_ids = getSelectedCasJuridiques();
        let dataToSend = {
            "cas": cas_ids,
        }
        updateData(`match-beneficiaire-cas/${beneficiaire.id}`, dataToSend, attachCasJuridiquesToBeneficiaire);
    });
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Create checkboxes for each cas juridique in the selected cas juridique
 * @param {object} cas contains the selected cas juridique
 */
const createCheckboxesCasJuridiques = (data) => {
    let cas = data.cases;
    let divCheckboxesCasJuridiques = $("div#cas_juridique_check");
    $.each(cas, function (indexInArray, oneCas) {
        let divContainerCasJuridique = $("<div class=perm>");
        let checkboxCasJuridique = $("<input type=checkbox class='form-check-input'>");
        checkboxCasJuridique.val(oneCas.id);
        let labelCasJuridique = $("<label>");
        labelCasJuridique.text(oneCas.cas_nom);
        divContainerCasJuridique.append(checkboxCasJuridique, labelCasJuridique);
        divCheckboxesCasJuridiques.append(divContainerCasJuridique);
    });
    checkCasJuridiquesByBeneficiaire(beneficiaire);
}
/**
 * check all cas juridiques of the selected beneficiaire
 * @param {object} beneficiaire selected beneficiaire
 */
const checkCasJuridiquesByBeneficiaire = (beneficiaire) => {
    $.each(beneficiaire.cas, function (indexInArray, oneCas) {
        let checkboxCasJuridique = $(`input[value=${oneCas.id}]`);
        checkboxCasJuridique.prop("checked", true);
    });
}
/**
 * Match cas juridiques with the selected beneficiaire (used for adding & editing)
 * @param {object} data response from the server that contains the beneficiaire with new attached cas juridiques
 */
const attachCasJuridiquesToBeneficiaire = (data) => {
    beneficiaire = data.result;
    alert(data.msg);
}
/**
 * get all selected cas juridiques to attach them to the beneficiaire
 * @returns {arr[]} selected cas juridiques
 */
const getSelectedCasJuridiques = () => {
    let cas_ids = [];
    $("input[type=checkbox]").each(function (index, element) {
        if (element.checked) {
            cas_ids.push(element.value);
        }
    });
    return cas_ids;
}
