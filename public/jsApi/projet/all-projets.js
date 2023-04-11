/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var projets = null;
var projetToOperate = null;
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("projets", getAllProjets);
    getAllData("partenaires", fillSelectPartenaires);
    $("button#btn-edit-projet").click(editProjet);
    $("button#btn-delete-projet").click(deleteProjet);
    $("select#filter-value").change(getProgressBarParameters);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Edit projet
 * @param {Event} e Information about the event
 */
const editProjet = (e) => {
    e.preventDefault();
    let numConcentionProjet = $("input#projet-num-concention").val();
    let titreProjet = $("input#projet-titre").val();
    let periodeProjet = $("input#projet-periode").val();
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
    if (periodeProjet) {
        dataToSend["projet_periode"] = periodeProjet;
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
    updateData(`projets/${projetToOperate.id}`, dataToSend, showDialogResponse);
}
/**
 * Delete projet
 * @param {Event} e Information about the event
 */
const deleteProjet = (e) => {
    e.preventDefault();
    deleteData(`projets/${projetToOperate.id}`, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains modified projet 
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let projet = data.result;
        let msg = data.msg;
        alertMsg(msg);
        $("tbody#tbl_projet").empty();
        getAllData("projets", getAllProjets);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
/**
 * Retrieve all projets from the server
 * @param {object} data response from the server that contains all projets
 */
const getAllProjets = (data) => {
    projets = data.projets;
    $.each(projets, function (indexInArray, projet) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);
        let tdNumConcentionProjet = $("<td>");
        tdNumConcentionProjet.text(projet.projet_num_concention);
        let tdTitreProjet = $("<td>");
        tdTitreProjet.text(projet.projet_titre);
        let tdPeriodeProjet = $("<td>");
        tdPeriodeProjet.text(projet.projet_periode);
        let tdDescriptionProjet = $("<td>");
        tdDescriptionProjet.text(projet.projet_description);
        let tdObjectifHomme = $("<td>");
        tdObjectifHomme.text(projet.projet_objectif_homme);
        let tdObjectifFemme = $("<td>");
        tdObjectifFemme.text(projet.projet_objectif_femme);
        let tdObjectif15 = $("<td>");
        tdObjectif15.text(projet.projet_objectif_15);
        let tdObjectif1518 = $("<td>");
        tdObjectif1518.text(projet.projet_objectif_15_18);
        let tdObjectif18 = $("<td>");
        tdObjectif18.text(projet.projet_objectif_18);
        let tdStatusProjet = $("<td>");
        tdStatusProjet.html(`<input type="checkbox" ${projet.projet_status == "termine" ? "checked" : ""} data-projet-id="${projet.id}" data-toggle="toggle" data-onstyle="success" data-offstyle="warning" data-on="Terminé" data-off="En cours...">`);
        let tdPartenaire = $("<td>");
        tdPartenaire.text(projet.partenaire ? projet.partenaire.partenaire_nom : "");
        let tdEditProjet = $(`<td class="text-center">`);
        let btnEditProjet = $(`<button type='submit' class='btn btn-primary m-2' data-projet-id=${projet.id} data-bs-toggle='modal' data-bs-target='#modal_Editprojet'  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier Projet'>`);
        btnEditProjet.append("<i class='fas fa-edit me-2'></i>Modifier");
        btnEditProjet.click(function (e) {
            e.preventDefault();
            fillModalEditProjet($(this).data("projet-id"));
        });
        tdEditProjet.append(btnEditProjet);
        let tdDeleteProjet = $(`<td class="text-center">`);
        let btnDeleteProjet = $(`<button type="submit" class="btn btn-primary m-2" data-projet-id=${projet.id} data-bs-toggle="modal" data-bs-target="#modal_DeleteProjet"  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer Projet'>`);
        btnDeleteProjet.append(`<i class="fas fa-trash me-2"></i>Supprimer`);
        btnDeleteProjet.click(function (e) {
            e.preventDefault();
            projetToOperate = projets.find(oneProjet => oneProjet.id == $(this).data("projet-id"));
        });
        tdDeleteProjet.append(btnDeleteProjet);
        let tdProgressionProjet = $(`<td class="text-center">`);
        let btnProgressionProjet = $(`<button type="submit" class="btn btn-primary m-2" data-projet-id=${projet.id} data-bs-toggle="modal" data-bs-target="#modal_Progress"  data-bs-toggle='tooltip' data-bs-placement='top' title='Progression du Projet'>`);
        btnProgressionProjet.append(`<i class="fas fa-spinner me-2"></i>Progression`);
        btnProgressionProjet.click(function (e) {
            e.preventDefault();
            projetToOperate = projets.find(oneProjet => oneProjet.id == $(this).data("projet-id"));
            getProgressBarParameters(e);
        });
        tdProgressionProjet.append(btnProgressionProjet);
        tr.append(tdNb, tdPartenaire, tdNumConcentionProjet, tdTitreProjet, tdPeriodeProjet, tdDescriptionProjet, tdObjectifHomme, tdObjectifFemme, tdObjectif15, tdObjectif1518, tdObjectif18, tdStatusProjet, tdEditProjet, tdDeleteProjet, tdProgressionProjet);
        $("tbody#tbl_projet").append(tr);
    });
    $('input[type=checkbox][data-toggle^=toggle]').bootstrapToggle(); // to apply the library of toggle button.
    $("div.toggle").click(changeProjetStatus);
}
/**
 * Fill all inputs to modify a projet
 * @param {int} index The index of the selected projet to be modified
 */
const fillModalEditProjet = (projetId) => {
    projetToOperate = projets.find(projet => projet.id == projetId);
    $("input#projet-num-concention").val(projetToOperate.projet_num_concention);
    $("input#projet-titre").val(projetToOperate.projet_titre);
    $("input#projet-periode").val(projetToOperate.projet_periode);
    $("textarea#projet-description").val(projetToOperate.projet_description);
    $("input#projet-objectif-homme").val(projetToOperate.projet_objectif_homme);
    $("input#projet-objectif-femme").val(projetToOperate.projet_objectif_femme);
    $("input#projet-objectif-15").val(projetToOperate.projet_objectif_15);
    $("input#projet-objectif-15-18").val(projetToOperate.projet_objectif_15_18);
    $("input#projet-objectif-18").val(projetToOperate.projet_objectif_18);
    $("select#projet-partenaire").val(projetToOperate.partenaire ? projetToOperate.partenaire.id : "");
    $("select#projet-partenaire").trigger('change');
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
        dropdownParent: $('.modal-bodyEdit'),
    });
}
/**
 * Change the projet status of the selected projet
 * @param {Event} e Information about the event
 */
const changeProjetStatus = (e) => {
    debugger
    let toggleInp = $(e.target).parents("td").find("input[type=checkbox]");
    let dataToSend = {
        "projet_status": (!toggleInp.prop("checked")) ? "termine" : "en cours",
    }
    updateData(`status-projet/${toggleInp.data(`projet-id`)}`, dataToSend, showDialogResponse);
}
/**
 * Get all parameters of the progess bar
 * @param {Event} e Information about the event
 */
const getProgressBarParameters = (e) => {
    let dataToSend = {
        "start_date": projetToOperate.projet_periode,
    };
    let filter = $("select#filter-value option:selected").data('filter');
    if (filter) {
        filterValue = $("select#filter-value").val();
        dataToSend[filter] = filterValue;
    }
    getAllData(`dashboard/per-all`, showProjetProgression, dataToSend);
}
/**
 * Show the progression of the selected projet
 * @param {Event} e Information about the event
 */
const showProjetProgression = (data, dataObject) => {
    let nb_beneficiaires = data.nb_beneficiaires_all;
    console.log(nb_beneficiaires);
    let nb_beneficiaires_total = 0;
    if (filterValue == `Homme`) {
        nb_beneficiaires_total = projetToOperate.projet_objectif_homme;
    } else if (filterValue == `Femme`) {
        nb_beneficiaires_total = projetToOperate.projet_objectif_femme;
    } else if (filterValue == `-15`) {
        nb_beneficiaires_total = projetToOperate.projet_objectif_15;
    } else if (filterValue == `15-18`) {
        nb_beneficiaires_total = projetToOperate.projet_objectif_15_18;
    } else if (filterValue == `+18`) {
        nb_beneficiaires_total = projetToOperate.projet_objectif_18;
    }
    if (!nb_beneficiaires_total) {
        configureProgressBar(0);
    }else{
        let nb_beneficiaires_percentage = Math.round(nb_beneficiaires * 100 / nb_beneficiaires_total);
        configureProgressBar(nb_beneficiaires_percentage);
    }
}
