/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("zones", fillSelectZones);
    getAllData("cas", createCheckboxesCasJuridiques);
    $("button#btn-add-beneficiaire").click(addBeneficiaire);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Add new beneficiaire
 * @param {Event} e Information about the event
 */
const addBeneficiaire = async (e) => {
    e.preventDefault();
    let dataToSend = {
        "prenom": $("input#first-name-benef").val(),
        "nom": $("input#last-name-benef").val(),
        "date_naissance": $("input#date-naissance-benef").val(),
        "adresse": $("input#adresse-benef").val(),
        "sexe": $(`input[name="sexe"][type="radio"]:checked`).val(),
        "cin": $("input#cin-benef").val(),
        "telephone": $("input#phone-number-benef").val(),
        // "type_travail": $("input#type-travail-benef").val(),
        "social_visite_date": $("input#social-appointment").val(),
        "niveau_scolaire": $(`input[name="niveau_scolaire"][type="radio"]:checked`).val(),
        "situation_familial": $(`input[name="situation_familial"][type="radio"]:checked`).val(),
        "orphelin": $(`input[name="orphelin"][type="radio"]:checked`).val(),
        "profession": $(`input[name="profession"][type="radio"]:checked`).val(),
        "zone_habitation": $(`select[name="zone_habitation"]`).val(),
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
    if ($("select#unite-addiction-benef").val()) {
        dataToSend["unite_addiction"] = $("select#unite-addiction-benef").val();
    }
    if (await checkOnlineStatus()) {
        addData("beneficiaires", dataToSend, showDialogResponse);
    } else {
        // open "baraka_idman" database with the version 1
        request = indexedDB.open("baraka_idman", 1);
        // handle the error event
        request.onerror = (event) => {
            console.error(`Database error: ${event.target.errorCode}`);
        };
        // handle the success event
        request.onsuccess = (event) => {
            db = event.target.result;
            insertBeneficiaire(dataToSend);
        };
    }
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new beneficiaire
 */
const showDialogResponse = (data) => {
    let msg = data.msg;
    if (data.status == 200) {
        let beneficiaire = data.result;
        attachCouverturesMedicales(beneficiaire);
        attachDrogueTypes(beneficiaire);
        attachServices(beneficiaire);
        attachSuicideCauses(beneficiaire);
        attachViolenceTypes(beneficiaire);
        attachCasJuridiques(beneficiaire);
        if (data.validate) {
            validationSociale(beneficiaire, data.validate);
        }
        alertMsg(msg);
        $(".form-benefaicaire").trigger("reset");
    } else if (data.status == 409) {
        alertMsg(msg, "danger");
    } else {
        let errors = data.errors;
        console.log(errors);
    }
    window.scrollTo(0, 0);
}
/**
 * Attach the checked couvertures with the new beneficiaire
 * @param {object} beneficiaire new beneficiaire
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
 * Attach the checked drogue types with the new beneficiaire
 * @param {object} beneficiaire new beneficiaire
 */
const attachDrogueTypes = (beneficiaire) => {
    let drogueTypes = {};
    $.each($(`input[name="drogue_types[]"]`), function (index, elem) {
        if (elem.checked) {
            drogueTypes[$(this).val()] = {
                'frequence' : $(`input[name="frequences[]"]`)[index].value,
                'unite_frequence' : $(`select[name="unite_frequences[]"]`)[index].value,
            };
        }
    });
    let dataToSend = {
        "drogue_types": drogueTypes,
    }
    updateData(`match-beneficiaire-drogue_types/${beneficiaire.id}`, dataToSend, (data) => { console.log(data); });
}
/**
 * Attach the checked drogue types with the new beneficiaire
 * @param {object} beneficiaire new beneficiaire
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
 * Attach the checked suicide causes with the new beneficiaire
 * @param {object} beneficiaire new beneficiaire
 */
const attachSuicideCauses = (beneficiaire) => {
    let dataToSend = {
        "suicide_causes": $("textarea#suicide_causes").val(),
    }
    updateData(`match-beneficiaire-suicide_causes/${beneficiaire.id}`, dataToSend, (data) => { console.log(data); });
}
/**
 * Attach the checked violence types with the new beneficiaire
 * @param {object} beneficiaire new beneficiaire
 */
const attachViolenceTypes = (beneficiaire) => {
    let violenceTypes = [];
    $.each($(`input[name="violence_types[]"][type="checkbox"]:checked`), function () {
        violenceTypes.push($(this).val());
    });
    let dataToSend = {
        "violence_types": violenceTypes,
    }
    updateData(`match-beneficiaire-violence_types/${beneficiaire.id}`, dataToSend, (data) => { console.log(data);});
}
/**
 * Validation sociale
 * @param {Object} beneficiaire new beneficiaire
 * @param {int} validatorUser social assistant that will validate the beneficiaire
 */
const validationSociale = (beneficiaire, validatorUser) => {
    updateData(`validation-state/${beneficiaire.id}/${validatorUser}/`, {}, (data) => { console.log(data);});
}
/**
 * Fill the select field with all zones
 * @param {object} data response from the server that contains all zones
 */
const fillSelectZones = (data) => {
    let zones = data.zones;
    $.each(zones, function (indexInArray, zone) {
        let option = $("<option>");
        option.text(zone.zone_nom);
        option.val(zone.id);
        $("select#zone").append(option);
    });
    // $("select#zone").select2({
    //     placeholder: 'Séléctionner un zone ...',
    // });
}
/**
 * Create checkboxes for each cas juridique
 * @param {object} cas contains the cas juridiques
 */
const createCheckboxesCasJuridiques = (data) => {
    let cas = data.cases;
    let divCheckboxesCasJuridiques = $("div#cas_juridique_check");
    $.each(cas, function (indexInArray, oneCas) {
        let divContainerCasJuridique = $("<div class=perm>");
        let checkboxCasJuridique = $("<input name='cas_juridiques[]' type=checkbox class='form-check-input'>");
        checkboxCasJuridique.val(oneCas.id);
        let labelCasJuridique = $("<label>");
        labelCasJuridique.text(oneCas.cas_nom);
        divContainerCasJuridique.append(checkboxCasJuridique, labelCasJuridique);
        divCheckboxesCasJuridiques.append(divContainerCasJuridique);
    });
}
/**
 * Attach the checked cas juridiques with the new beneficiaire
 * @param {object} beneficiaire new beneficiaire
 */
const attachCasJuridiques = (beneficiaire) => {
    let casJuridique = [];
    $.each($(`input[name="cas_juridiques[]"][type="checkbox"]:checked`), function () {
        casJuridique.push($(this).val());
    });
    let dataToSend = {
        "cas": casJuridique,
    }
    updateData(`match-beneficiaire-cas/${beneficiaire.id}`, dataToSend, (data) => { console.log(data);});
}
