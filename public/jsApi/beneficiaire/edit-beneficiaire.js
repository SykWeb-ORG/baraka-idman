console.log(beneficiaire);
/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    $("button#btn-edit-beneficiaire").click(editBeneficiaire);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Edit beneficiaire
 * @param {Event} e Information about the event
 */
const editBeneficiaire = (e) => {
    e.preventDefault();
    let dataToSend = {
        "prenom": $("input#first-name-benef").val(),
        "nom": $("input#last-name-benef").val(),
        "adresse": $("input#adresse-benef").val(),
        "sexe": $(`input[name="sexe"][type="radio"]:checked`).val(),
        "cin": $("input#cin-benef").val(),
        "telephone": $("input#phone-number-benef").val(),
        "type_travail": $("input#type-travail-benef").val(),
        "social_visite_date": $("input#social-appointment").val(),
        "niveau_scolaire": $(`input[name="niveau_scolaire"][type="radio"]:checked`).val(),
        "situation_familial": $(`input[name="situation_familial"][type="radio"]:checked`).val(),
        "orphelin": $(`input[name="orphelin"][type="radio"]:checked`).val(),
        "profession": $(`input[name="profession"][type="radio"]:checked`).val(),
        "zone_habitation": $(`input[name="zone_habitation"][type="radio"]:checked`).val(),
        "localisation": $(`input[name="localisation"][type="radio"]:checked`).val(),
        "famille_informee": $(`input[name="famille_informee"][type="radio"]:checked`).val(),
        "famille_integre": $(`input[name="famille_integre"][type="radio"]:checked`).val(),
        "addiction_cause": $(`input[name="addiction_cause"][type="radio"]:checked`).val(),
        "age_debut_addiction": $(`input[name="age_debut_addiction"][type="radio"]:checked`).val(),
        "duree_addiction": $("input#duree-addiction-benef").val(),
        "ts": $(`input[name="ts"][type="radio"]:checked`).val(),
    }
    if ($(`input[name="registred_date"]`).val()) {
        dataToSend["created_at"] = $(`input[name="registred_date"]`).val();
    }
    if ($("input#matricule-benef").val()) {
        dataToSend["nb_dossier"] = $("input#matricule-benef").val();
    }
    updateData(`beneficiaires/${beneficiaire.id}`, dataToSend, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains modified beneficiaire
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let beneficiaire = data.result;
        let msg = data.msg;
        attachCouverturesMedicales(beneficiaire);
        attachDrogueTypes(beneficiaire);
        attachServices(beneficiaire);
        attachSuicideCauses(beneficiaire);
        attachViolenceTypes(beneficiaire);
        alertMsg(msg);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
    window.scrollTo(0, 0);
}
/**
 * Attach the checked couvertures with the modified beneficiaire
 * @param {object} beneficiaire modified beneficiaire
 */
const attachCouverturesMedicales = (beneficiaire) => {
    let couvertures = [];
    $.each($(`input[name="couvertures[]"][type="checkbox"]:checked`), function () {
        couvertures.push($(this).val());
    });
    let dataToSend = {
        "couvertures": couvertures,
    }
    updateData(`match-beneficiaire-couvertures/${beneficiaire.id}`, dataToSend, (data) => { console.log(data); });
}
/**
 * Attach the checked drogue types with the modified beneficiaire
 * @param {object} beneficiaire modified beneficiaire
 */
const attachDrogueTypes = (beneficiaire) => {
    let drogueTypes = {};
    $.each($(`input[name="drogue_types[]"]`), function (index, elem) {
        if (elem.checked) {
            drogueTypes[$(this).val()] = {'frequence' : $(`input[name="frequences[]"]`)[index].value};
        }
    });
    let dataToSend = {
        "drogue_types": drogueTypes,
    }
    updateData(`match-beneficiaire-drogue_types/${beneficiaire.id}`, dataToSend, (data) => { console.log(data); });
}
/**
 * Attach the checked drogue types with the modified beneficiaire
 * @param {object} beneficiaire modified beneficiaire
 */
const attachServices = (beneficiaire) => {
    let services = {};
    $.each($(`input[name="services[]"]`), function (index, elem) {
        if (elem.checked) {
            services[$(this).val()] = {'user_id' : $(`select[name="poles[]"]`)[index].value};
        }
    });
    let dataToSend = {
        "services": services,
    }
    updateData(`match-beneficiaire-services/${beneficiaire.id}`, dataToSend, (data) => { console.log(data); });
}
/**
 * Attach the checked suicide causes with the modified beneficiaire
 * @param {object} beneficiaire modified beneficiaire
 */
const attachSuicideCauses = (beneficiaire) => {
    let dataToSend = {
        "suicide_causes": $("textarea#suicide_causes").val(),
    }
    updateData(`match-beneficiaire-suicide_causes/${beneficiaire.id}`, dataToSend, (data) => { console.log(data); });
}
/**
 * Attach the checked violence types with the modified beneficiaire
 * @param {object} beneficiaire modified beneficiaire
 */
const attachViolenceTypes = (beneficiaire) => {
    let violenceTypes = [];
    $.each($(`input[name="violence_types[]"][type="checkbox"]:checked`), function () {
        violenceTypes.push($(this).val());
    });
    let dataToSend = {
        "violence_types": violenceTypes,
    }
    updateData(`match-beneficiaire-violence_types/${beneficiaire.id}`, dataToSend, (data) => { console.log(data); });
}
