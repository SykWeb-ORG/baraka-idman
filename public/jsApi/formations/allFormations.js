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
 * Retrieve all formations from the server
 * @param {object} data response from the server that contains all formations
 */
const getAllFormations = (data) => {
    formations = data.formations;
    $.each(formations, function(indexInArray, formation) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);

        let tdTitleFormation = $("<td>");
        tdTitleFormation.text(formation.formation_titre);
        let tdDateFormation = $("<td>");
        tdDateFormation.text(formation.formation_date);
        let tdHeureFormation = $("<td>");
        tdHeureFormation.text(formation.formation_heure);
        let tdDureeFormation = $("<td>");
        tdDureeFormation.text(formation.formation_duree);
        let tdOrganizme = $("<td>");
        tdOrganizme.text(formation.organisme);
        let tdFormateurFormation = $("<td>");
        tdFormateurFormation.text(formation.formateur);
        let tdObjetFormation = $("<td>");
        tdObjetFormation.text(formation.objet);

        let tdListPart = $(`<td class="text-center">`);
        let btnListPart = $(`<button type='button' class='btn btn-sm btn-sm-square btn-primary m-2' data-formation-id=${formation.id} data-bs-toggle='modal' data-bs-target='#modal_ListePart'  data-bs-toggle='tooltip' data-bs-placement='top' title='Listes des participants'>`);
        btnListPart.append("<i class='fas fa-list'></i>");
        btnListPart.click(function (e) { 
            e.preventDefault();
            fillModalListPartFormation($(this).data("formation-id"));
        });
        tdListPart.append(btnListPart);

        let tdEditFormation = $(`<td class="text-center">`);
        let btnEditFormation = $(`<button type='submit' class='btn btn-sm btn-sm-square btn-primary m-2' data-formation-id=${formation.id} data-bs-toggle='modal' data-bs-target='#modal_EditFormation'  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier Service'>`);
        btnEditFormation.append("<i class='fas fa-edit'></i>");
        btnEditFormation.click(function (e) { 
            e.preventDefault();
            fillModalEditFormation($(this).data("formation-id"));
        });
        tdEditFormation.append(btnEditFormation);

        let tdDeleteFormation = $(`<td class="text-center">`);
        let btnDeleteFormation = $(`<button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2" data-formation-id=${formation.id} data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation"  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer Formation'>`);
        btnDeleteFormation.append(`<i class="fas fa-trash"></i>`);
        btnDeleteFormation.click(function (e) {
            e.preventDefault();
            formationToOperate = formations.find(formation => formation.id == $(this).data("formation-id"));
        });
        tdDeleteFormation.append(btnDeleteFormation);

        tr.append(tdNb, tdTitleFormation, tdDateFormation, tdDureeFormation, tdOrganizme, tdFormateurFormation, tdObjetFormation, tdListPart, tdEditFormation, tdDeleteFormation);
        $("tbody#tbl_formation").append(tr);
    });
}

const fillModalEditFormation = (formationId) => {
    formationToOperate = formations.find(formation => formation.id == formationId);
    $("input#service_nom").val(formationToOperate.formation_titre);
}