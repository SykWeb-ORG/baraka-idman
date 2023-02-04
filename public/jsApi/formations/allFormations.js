/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var formations = null;
var formationToOperate = null;

/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("formations", getAllFormations);
});

/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************

/**
 * Retrieve all services from the server
 * @param {object} data response from the server that contains all services
 */
const getAllFormations = (data) => {
    formation = data.formations;
    $.each(formation, function(indexInArray, oneFormation) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);

        let tdTitleFormation = $("<td>");
        tdTitleFormation.text(oneFormation.formation_titre);
        let tdDateFormation = $("<td>");
        tdDateFormation.text(oneFormation.formation_date);
        let tdHeureFormation = $("<td>");
        tdHeureFormation.text(oneFormation.formation_heure);
        let tdDureeFormation = $("<td>");
        tdDureeFormation.text(oneFormation.formation_duree);
        let tdOrganizme = $("<td>");
        tdOrganizme.text(oneFormation.organisme);
        let tdFormateurFormation = $("<td>");
        tdFormateurFormation.text(oneFormation.formateur);
        let tdObjetFormation = $("<td>");
        tdObjetFormation.text(oneFormation.objet);

        let tdListPart = $(`<td class="text-center">`);
        let btnListPart = $(`<button type='button' class='btn btn-sm btn-sm-square btn-primary m-2' data-formation-id=${oneFormation.id} data-bs-toggle='modal' data-bs-target='#modal_ListePart'  data-bs-toggle='tooltip' data-bs-placement='top' title='Listes des participants'>`);
        btnListPart.append("<i class='fas fa-list'></i>");
        btnListPart.click(function (e) { 
            e.preventDefault();
            fillModalListPartFormation($(this).data("formation-id"));
        });
        tdListPart.append(btnListPart);

        let tdEditFormation = $(`<td class="text-center">`);
        let btnEditFormation = $(`<button type='submit' class='btn btn-sm btn-sm-square btn-primary m-2' data-formation-id=${oneFormation.id} data-bs-toggle='modal' data-bs-target='#modal_ListePart'  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier Service'>`);
        btnEditFormation.append("<i class='fas fa-edit'></i>");
        btnEditFormation.click(function (e) { 
            e.preventDefault();
            fillModalEditFormation($(this).data("formation-id"));
        });
        tdEditFormation.append(btnEditFormation);

        let tdDeleteFormation = $(`<td class="text-center">`);
        let btnDeleteFormation = $(`<button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2" data-formation-id=${oneFormation.id} data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation"  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer Formation'>`);
        btnDeleteFormation.append(`<i class="fas fa-trash"></i>`);
        btnDeleteFormation.click(function (e) {
            e.preventDefault();
            formationToOperate = formations.find(oneFormation => oneFormation.id == $(this).data("formation-id"));
        });
        tdDeleteFormation.append(btnDeleteFormation);

        tr.append(tdNb, tdTitleFormation, tdDateFormation, tdDureeFormation, tdOrganizme, tdFormateurFormation, tdObjetFormation, tdEditFormation, tdDeleteFormation);
        $("tbody#tbl_formation").append(tr);
    });
}

const fillModalEditFormation = (formationId) => {
    formationToOperate = formations.find(oneFormation => oneFormation.id == formationId);
    $("input#service_nom").val(formationToOperate.formation_titre);
}