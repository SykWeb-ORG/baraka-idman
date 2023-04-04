/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    // $("button#btn-date-filter").click(filterPerDates);
    $("button#btn-filter").click(filterPerDates);
    getAllData("programmes", getAllProgrammes);
    getAllData("intervenants", getAllIntervenants);
    getAllData("couvertures", getAllCouvertures);
    getAllData("drogueTypes", getAllDrogueTypes);
    getAllData("services", getAllServices);
    getAllData("intervenants", fillSelectIntervenants);
    getAllData("couvertures", fillSelectCouvertures);
    getAllData("drogueTypes", fillSelectDrogueTypes);
    getAllData("services", fillSelectServices);
    getNbBeneficiairesPerAge();
    getNbBeneficiairesPerGender();
    getNbBeneficiairesPerCIN();
    getLocalisations();
    getSituations();
    getNbBeneficiairesPerScolarisation();
    getNbBeneficiairesPerVisitesSocialesPresence();
    getNbBeneficiairesPerVisitesMedicalesPresence();
    getNbBeneficiairesPerCauseAddiction();
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Filter nb beneficiaires
 * @param {Event} e Informations about the event
 */
const filterPerDates = (e) => {
    let dataToSend = {}
    let startDate = $("input#start-date").val();
    if (startDate) {
        dataToSend["start_date"] = startDate;
    }
    let endDate = $("input#end-date").val();
    if (endDate) {
        dataToSend["end_date"] = endDate;
    }
    let perAge = $(`select#age`).val();
    if (perAge) {
        dataToSend["age"] = perAge;
        $(`div#age_stats`).addClass('d-none');
    } else {
        $(`div#age_stats`).removeClass('d-none');
    }
    let perIntervenant = $(`select#intervenants`).val();
    if (perIntervenant) {
        dataToSend["intervenant"] = perIntervenant;
        $(`div#intervenant_stats`).addClass('d-none');
    } else {
        $(`div#intervenant_stats`).removeClass('d-none');
    }
    let perGender = $(`select#gender`).val();
    if (perGender) {
        dataToSend["gender"] = perGender;
        $(`div#gender_stats`).addClass('d-none');
    } else {
        $(`div#gender_stats`).removeClass('d-none');
    }
    let perLocalisation = $(`select#localisation`).val();
    if (perLocalisation) {
        dataToSend["localisation"] = perLocalisation;
        $(`div#localisation_stats`).addClass('d-none');
    } else {
        $(`div#localisation_stats`).removeClass('d-none');
    }
    let perCIN = $(`select#cin`).val();
    if (perCIN) {
        dataToSend["cin"] = perCIN;
        $(`div#cin_stats`).addClass('d-none');
    } else {
        $(`div#cin_stats`).removeClass('d-none');
    }
    let perCouverture = $(`select#couvertures`).val();
    if (perCouverture) {
        dataToSend["couvertures"] = perCouverture;
        $(`div#couverture_stats`).addClass('d-none');
    } else {
        $(`div#couverture_stats`).removeClass('d-none');
    }
    let perSituation = $(`select#situation-familiale`).val();
    if (perSituation) {
        dataToSend["situation_familiale"] = perSituation;
        $(`div#situation_stats`).addClass('d-none');
    } else {
        $(`div#situation_stats`).removeClass('d-none');
    }
    let perScolarite = $(`select#scolarite`).val();
    if (perScolarite) {
        dataToSend["scolarite"] = perScolarite;
        $(`div#scolarisation_stats`).addClass('d-none');
    } else {
        $(`div#scolarisation_stats`).removeClass('d-none');
    }
    let perCauseAddiction = $(`select#cause-addiction`).val();
    if (perCauseAddiction) {
        dataToSend["cause_addiction"] = perCauseAddiction;
        $(`div#cause_addiction_stats`).addClass('d-none');
    } else {
        $(`div#cause_addiction_stats`).removeClass('d-none');
    }
    let perDrogueType = $(`select#drogue-types`).val();
    if (perDrogueType) {
        dataToSend["drogue_type"] = perDrogueType;
        $(`div#drogue_type_stats`).addClass('d-none');
    } else {
        $(`div#drogue_type_stats`).removeClass('d-none');
    }
    let perService = $(`select#services`).val();
    if (perService) {
        dataToSend["service"] = perService;
        $(`div#service_stats`).addClass('d-none');
    } else {
        $(`div#service_stats`).removeClass('d-none');
    }
    // if the user selects all fields to filter result...
    if (perAge && perIntervenant && perAge && perGender && perLocalisation && perDrogueType && perService && perCauseAddiction && perScolarite && perSituation && perCouverture) {
        $(`div#all-stats`).removeClass('d-none');
        getNbBeneficiairesPerAll(dataToSend);
    } else {
        $(`div#all-stats`).addClass('d-none');
        getAllData("intervenants", getAllIntervenants, dataToSend);
        getAllData("couvertures", getAllCouvertures, dataToSend);
        getAllData("drogueTypes", getAllDrogueTypes, dataToSend);
        getAllData("services", getAllServices, dataToSend);
        getNbBeneficiairesPerAge(dataToSend);
        getNbBeneficiairesPerGender(dataToSend);
        getNbBeneficiairesPerCIN(dataToSend);
        getLocalisations(dataToSend);
        getSituations(dataToSend);
        getNbBeneficiairesPerScolarisation(dataToSend);
        getNbBeneficiairesPerVisitesSocialesPresence(dataToSend);
        getNbBeneficiairesPerVisitesMedicalesPresence(dataToSend);
        getNbBeneficiairesPerCauseAddiction(dataToSend);
    }
    // if the user selects at least one field from those in the modal, hide the programme stats...
    if (perAge || perIntervenant || perAge || perGender || perLocalisation || perDrogueType || perService || perCauseAddiction || perScolarite || perSituation || perCouverture) {
        $(`div#programme_stats`).addClass('d-none');
    } else {
        $(`div#programme_stats`).removeClass('d-none');
        getAllData("programmes-per-dates", getAllProgrammes, dataToSend);
    }
}
/**
 * Retrieve all programmes from the server
 * @param {object} data response from the server that contains all programmes
 * @param {object} dataObject data used for filtering
 */
const getAllProgrammes = (data, dataObject = {}) => {
    programmes = data.programmes;
    $("tbody#tbl_programme").empty();
    $.each(programmes, function (indexInArray, programme) {
        // debugger
        let tr = $("<tr>");
        let tdProgramme = $("<td>");
        tdProgramme.text(programme.programme_nom);
        let tdNbBeneficiaires = $("<td>");
        tdNbBeneficiaires.text(getNbBeneficiairesPerProgramme(programme, dataObject));
        let tdNbBeneficiairesPercentage = $("<td>");
        tdNbBeneficiairesPercentage.text("");
        tr.append(tdProgramme, tdNbBeneficiaires, tdNbBeneficiairesPercentage);
        $("tbody#tbl_programme").append(tr);
    });
}
/**
 * Retrieve all intervenants from the server
 * @param {object} data response from the server that contains all intervenants
 * @param {object} dataObject data used for filtering
 */
const getAllIntervenants = (data, dataObject) => {
    intervenants = data.intervenants;
    $("tbody#tbl_intervenant").empty();
    $.each(intervenants, function (indexInArray, intervenant) {
        // debugger
        let tr = $("<tr>");
        let tdIntervenant = $("<td>");
        tdIntervenant.text(`${intervenant.user.first_name} ${intervenant.user.last_name}`);
        let tdNbBeneficiaires = $("<td>");
        tdNbBeneficiaires.text(getNbBeneficiairesPerIntervenant(intervenant, dataObject));
        let tdNbBeneficiairesPercentage = $("<td>");
        tdNbBeneficiairesPercentage.text("");
        tr.append(tdIntervenant, tdNbBeneficiaires, tdNbBeneficiairesPercentage);
        $("tbody#tbl_intervenant").append(tr);
    });
}
/**
 * Fill the select field with all intervenants
 * @param {object} data response from the server that contains all intervenants
 */
const fillSelectIntervenants = (data) => {
    intervenants = data.intervenants;
    // $("select#intervenants").empty();
    $.each(intervenants, function (indexInArray, intervenant) {
        let option = $("<option>");
        option.text(`${intervenant.user.first_name} ${intervenant.user.last_name}`);
        option.val(intervenant.id);
        $("select#intervenants").append(option);
    });
}
/**
 * Fill the select field with all couvertures
 * @param {object} data response from the server that contains all couvertures
 */
const fillSelectCouvertures = (data) => {
    couvertures = data.couvertures;
    // $("select#couvertures").empty();
    $.each(couvertures, function (indexInArray, couverture) {
        let option = $("<option>");
        option.text(`${couverture.couverture_nom}`);
        option.val(couverture.id);
        $("select#couvertures").append(option);
    });
}
/**
 * Fill the select field with all services
 * @param {object} data response from the server that contains all services
 */
const fillSelectServices = (data) => {
    services = data.services;
    // $("select#services").empty();
    $.each(services, function (indexInArray, service) {
        let option = $("<option>");
        option.text(`${service.service_nom}`);
        option.val(service.id);
        $("select#services").append(option);
    });
}
/**
 * Fill the select field with all drogue types
 * @param {object} data response from the server that contains all drogue types
 */
const fillSelectDrogueTypes = (data) => {
    drogueTypes = data.drogue_types;
    // $("select#drogue-types").empty();
    $.each(drogueTypes, function (indexInArray, drogueType) {
        let option = $("<option>");
        option.text(`${drogueType.drogue_nom}`);
        option.val(drogueType.id);
        $("select#drogue-types").append(option);
    });
}
/**
 * Retrieve all couvertures from the server
 * @param {object} data response from the server that contains all couvertures
 * @param {object} dataObject data used for filtering
 */
const getAllCouvertures = (data, dataObject = {}) => {
    couvertures = data.couvertures;
    $("tbody#tbl_couverture").empty();
    $.each(couvertures, function (indexInArray, couverture) {
        // debugger
        let tr = $("<tr>");
        let tdCouverture = $("<td>");
        tdCouverture.text(couverture.couverture_nom);
        let tdNbBeneficiaires = $("<td>");
        tdNbBeneficiaires.text(getNbBeneficiairesPerCouverture(couverture, dataObject));
        let tdNbBeneficiairesPercentage = $("<td>");
        tdNbBeneficiairesPercentage.text("");
        tr.append(tdCouverture, tdNbBeneficiaires, tdNbBeneficiairesPercentage);
        $("tbody#tbl_couverture").append(tr);
    });
}
/**
 * Retrieve all services from the server
 * @param {object} data response from the server that contains all services
 * @param {object} dataObject data used for filtering
 */
const getAllServices = (data, dataObject = {}) => {
    services = data.services;
    $("tbody#tbl_service").empty();
    $.each(services, function (indexInArray, service) {
        // debugger
        let tr = $("<tr>");
        let tdService = $("<td>");
        tdService.text(service.service_nom);
        let tdNbBeneficiaires = $("<td>");
        tdNbBeneficiaires.text(getNbBeneficiairesPerService(service, dataObject));
        let tdNbBeneficiairesPercentage = $("<td>");
        tdNbBeneficiairesPercentage.text("");
        tr.append(tdService, tdNbBeneficiaires, tdNbBeneficiairesPercentage);
        $("tbody#tbl_service").append(tr);
    });
}
/**
 * Retrieve all drogue types from the server
 * @param {object} data response from the server that contains all drogue types
 * @param {object} dataObject data used for filtering
 */
const getAllDrogueTypes = (data, dataObject = {}) => {
    drogueTypes = data.drogue_types;
    myChartTypedrg.data.labels = [];
    myChartTypedrg.data.datasets[0].data = [];
    $.each(drogueTypes, function (indexInArray, drogueType) {
        // debugger
        myChartTypedrg.data.labels.push(`${drogueType.drogue_nom}`);
        myChartTypedrg.data.datasets[0].data.push(getNbBeneficiairesPerTypeDrogue(drogueType, dataObject));
    });
    myChartTypedrg.update();
}
/**
 * Create table for localisations
 */
const getLocalisations = (dataObject = {}) => {
    let localisations = Object.values(getNbBeneficiairesPerLocalisations(dataObject));
    $("tbody#tbl_localisation").empty();
    $.each([`A l'intérieur de la clôture`, `A l'extérieur de la clôture`], function (indexInArray, localisation) {
        // debugger
        let tr = $("<tr>");
        let tdLocalisation = $("<td>");
        tdLocalisation.text(`${localisation}`);
        let tdNbBeneficiaires = $("<td>");
        tdNbBeneficiaires.text(localisations[indexInArray]);
        let tdNbBeneficiairesPercentage = $("<td>");
        tdNbBeneficiairesPercentage.text("");
        tr.append(tdLocalisation, tdNbBeneficiaires, tdNbBeneficiairesPercentage);
        $("tbody#tbl_localisation").append(tr);
    });
}
/**
 * Create table for situations familiales
 */
const getSituations = (dataObject = {}) => {
    let situations = Object.values(getNbBeneficiairesPerSituations(dataObject));
    $("tbody#tbl_situation").empty();
    $.each([`Célibataire`, `marié`, `divorcé`, `veuf`], function (indexInArray, situation) {
        // debugger
        let tr = $("<tr>");
        let tdSituation = $("<td>");
        tdSituation.text(`${situation}`);
        let tdNbBeneficiaires = $("<td>");
        tdNbBeneficiaires.text(situations[indexInArray]);
        let tdNbBeneficiairesPercentage = $("<td>");
        tdNbBeneficiairesPercentage.text("");
        tr.append(tdSituation, tdNbBeneficiaires, tdNbBeneficiairesPercentage);
        $("tbody#tbl_situation").append(tr);
    });
}
const getNbBeneficiairesPerProgramme = (programme, dataObject = {}) => {
    let nbBeneficiairesObject = getAllDataForDashboard(`dashboard/per-programme/${programme.id}`, dataObject);
    return nbBeneficiairesObject.nb_beneficiaires;
}
const getNbBeneficiairesPerIntervenant = (intervenant, dataObject = {}) => {
    let nbBeneficiairesObject = getAllDataForDashboard(`dashboard/per-intervenant/${intervenant.id}`, dataObject);
    return nbBeneficiairesObject.nb_beneficiaires;
}
const getNbBeneficiairesPerCouverture = (couverture, dataObject = {}) => {
    let nbBeneficiairesObject = getAllDataForDashboard(`dashboard/per-couverture-medicale/${couverture.id}`, dataObject);
    return nbBeneficiairesObject.nb_beneficiaires;
}
const getNbBeneficiairesPerAge = (dataObject = {}) => {
    // debugger
    let nbBeneficiairesObject = getAllDataForDashboard(`dashboard/per-age`, dataObject);
    myChart.data.datasets[0].data = Object.values(nbBeneficiairesObject);
    myChart.update();
}
const getNbBeneficiairesPerGender = (dataObject = {}) => {
    // debugger
    let nbBeneficiairesObject = getAllDataForDashboard(`dashboard/per-gender`, dataObject);
    myChartG.data.datasets[0].data = Object.values(nbBeneficiairesObject);
    myChartG.update();
}
const getNbBeneficiairesPerCIN = (dataObject = {}) => {
    // debugger
    let nbBeneficiairesObject = getAllDataForDashboard(`dashboard/per-cin`, dataObject);
    myChartCIN.data.datasets[0].data = Object.values(nbBeneficiairesObject);
    myChartCIN.update();
}
const getNbBeneficiairesPerScolarisation = (dataObject = {}) => {
    // debugger
    let nbBeneficiairesObject = getAllDataForDashboard(`dashboard/per-scolarisation`, dataObject);
    myChartScol.data.datasets[0].data = Object.values(nbBeneficiairesObject);
    myChartScol.update();
}
const getNbBeneficiairesPerVisitesSocialesPresence = (dataObject = {}) => {
    let nbBeneficiairesObject = getAllDataForDashboard(`dashboard/per-visites-sociales-presence`, dataObject);
    myChartpresenceSocial.data.datasets[0].data = Object.values(nbBeneficiairesObject);
    myChartpresenceSocial.update();
}
const getNbBeneficiairesPerVisitesMedicalesPresence = (dataObject = {}) => {
    let nbBeneficiairesObject = getAllDataForDashboard(`dashboard/per-visites-medicales-presence`, dataObject);
    myChartpresenceMed.data.datasets[0].data = Object.values(nbBeneficiairesObject);
    myChartpresenceMed.update();
}
const getNbBeneficiairesPerLocalisations = (dataObject = {}) => {
    let nbBeneficiairesObject = getAllDataForDashboard(`dashboard/per-localisation`, dataObject);
    return nbBeneficiairesObject;
}
const getNbBeneficiairesPerSituations = (dataObject = {}) => {
    let nbBeneficiairesObject = getAllDataForDashboard(`dashboard/per-situation-familiale`, dataObject);
    return nbBeneficiairesObject;
}
const getNbBeneficiairesPerTypeDrogue = (drogueType, dataObject = {}) => {
    let nbBeneficiairesObject = getAllDataForDashboard(`dashboard/per-drogue-type/${drogueType.id}`, dataObject);
    return nbBeneficiairesObject.nb_beneficiaires;
}
const getNbBeneficiairesPerService = (service, dataObject = {}) => {
    let nbBeneficiairesObject = getAllDataForDashboard(`dashboard/per-service/${service.id}`, dataObject);
    return nbBeneficiairesObject.nb_beneficiaires;
}
const getNbBeneficiairesPerCauseAddiction = (dataObject = {}) => {
    // debugger
    let nbBeneficiairesObject = getAllDataForDashboard(`dashboard/per-cause-addiction`, dataObject);
    for (const key in nbBeneficiairesObject) {
        $(`#${key}`).text(nbBeneficiairesObject[key]);
    }
}
const getNbBeneficiairesPerAll = (dataObject = {}) => {
    let nbBeneficiairesObject = getAllDataForDashboard(`dashboard/per-all`, dataObject);
    for (const key in nbBeneficiairesObject) {
        $(`#${key}`).text(nbBeneficiairesObject[key]);
    }
}
