/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("partenaires", fillSelectPartenaires);
    $("button#btn-add-projet").click(addProjet);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Add new projet 
 * @param {Event} e Information about the event
 */
const addProjet = (e) => {
    e.preventDefault();
    let numConcentionProjet = $("input#projet-num-concention").val();
    let titreProjet = $("input#projet-titre").val();
    let descriptionProjet = $("textarea#projet-description").val();
    let objectifHomme = $("input#projet-objectif-homme").val();
    let objectifFemme = $("input#projet-objectif-femme").val();
    let objectif15 = $("input#projet-objectif-15").val();
    let objectif1518 = $("input#projet-objectif-15-18").val();
    let objectif18 = $("input#projet-objectif-18").val();
    let partenaire = $("select#projet-partenaire").val();
    let dataToSend = {
        "projet_num_concention": numConcentionProjet,
        "projet_titre": titreProjet,
    }
    if (descriptionProjet) {
        dataToSend["projet_description"] = descriptionProjet;
    }
    if (objectifHomme) {
        dataToSend["projet_objectif_homme"] = objectifHomme;
    }
    if (objectifFemme) {
        dataToSend["projet_objectif_femme"] = objectifFemme;
    }
    if (objectif15) {
        dataToSend["projet_objectif_15"] = objectif15;
    }
    if (objectif1518) {
        dataToSend["projet_objectif_15_18"] = objectif1518;
    }
    if (objectif18) {
        dataToSend["projet_objectif_18"] = objectif18;
    }
    if (partenaire) {
        dataToSend["projet_partenaire"] = partenaire;
    }
    addData("projets", dataToSend, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new projet 
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let projet = data.result;
        let msg = data.msg;
        alertMsg(msg);
        $(".form-projet").trigger("reset");
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
/**
 * Fill the select field with all partenaires
 * @param {object} data response from the server that contains all partenaires
 */
const fillSelectPartenaires = (data) => {
    let partenaires = data.partenaires;
    $.each(partenaires, function (indexInArray, partenaire) {
        let option = $("<option>");
        option.text(partenaire.partenaire_nom);
        option.val(partenaire.id);
        $("select#projet-partenaire").append(option);
    });
    $("select#projet-partenaire").select2({
        placeholder: 'Séléctionner un partenaire...',
    });
}
