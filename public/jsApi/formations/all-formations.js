/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var formations = null;
var formationToOperate = null;
var participants = [];
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("formations", getAllFormations);
    $("button#btn-edit-formation").click(editFormation);
    $("button#btn-delete-formation").click(deleteFormation);
    $("button#btn-add-participant").click(function (e) {
        e.preventDefault();
        debugger
        let action = $(this).data(`action`);
        let participant = createParticipantObject();
        if (action == "add") {
            addParticipant(participant);
        } else if (action == "edit") {
            editParticipant(participant, $(this).data(`participant-index`));
            $("button#btn-add-participant").text(`Ajouter participant`);
            $(this).data(`action`, `add`);
            $("button#btn-add-participant").data(`participant-index`, undefined);
            $("button#btn-show-modal-add-participant").trigger("click");
        }
        editFormationParticipants();
        $("form#form-participant input").val("");
    });
    $("button#btn-show-modal-add-participant").click(function (e) {
        e.preventDefault();
        debugger
        $("#participant-modal-title").text(`Ajouter participant`);
    });
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Edit formation
 * @param {Event} e Information about the event
 */
const editFormation = (e) => {
    e.preventDefault();
    let titleFormation = $("input#titre-formation").val();
    let dateFormation = $("input#date_formation").val();
    let heureFormation = $("input#heure_formation").val();
    let dureeFormation = $("input#duree_formation").val();
    let organismeFormation = $("input#organisme-formation").val();
    let formateur = $("input#formateur").val();
    let objet = $("input#objet").val();
    let dataToSend = {
        "formation_titre": titleFormation,
        "formation_date": dateFormation,
        "formation_heure": heureFormation,
        "formation_duree": dureeFormation,
        "organisme": organismeFormation,
        "formateur": formateur,
        "objet": objet,
        "participants": participants,
    }
    updateData(`formations/${formationToOperate.id}`, dataToSend, showDialogResponse);
}
/**
 * Delete formation
 * @param {Event} e Information about the event
 */
const deleteFormation = (e) => {
    e.preventDefault();
    deleteData(`formations/${formationToOperate.id}`, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains modified formation 
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let formation = data.result;
        let msg = data.msg;
        alertMsg(msg);
        $("tbody#tbl_formation").empty();
        getAllData("formations", getAllFormations);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
/**
 * Retrieve all formations from the server
 * @param {object} data response from the server that contains all formations
 */
const getAllFormations = (data) => {
    formations = data.formations;
    $.each(formations, function (indexInArray, formation) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);
        let tdTitreFormation = $("<td>");
        tdTitreFormation.text(formation.formation_titre);
        let tdDateFormation = $("<td>");
        tdDateFormation.text(formation.formation_date);
        let tdHeureFormation = $("<td>");
        tdHeureFormation.text(formation.formation_heure);
        let tdDureeFormation = $("<td>");
        tdDureeFormation.text(formation.formation_duree);
        let tdOrganismeFormation = $("<td>");
        tdOrganismeFormation.text(formation.organisme);
        let tdFormateur = $("<td>");
        tdFormateur.text(formation.formateur);
        let tdObjetFormation = $("<td>");
        tdObjetFormation.text(formation.objet);
        let tdEditFormation = $(`<td class="text-center">`);
        let btnEditFormation = $(`<button type='submit' class='btn btn-primary m-2' data-formation-id=${formation.id} data-bs-toggle='modal' data-bs-target='#modal_EditFormation'  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier Formation'>`);
        btnEditFormation.append("<i class='fas fa-edit me-2'></i>Modifier");
        btnEditFormation.click(function (e) {
            e.preventDefault();
            fillModalEditFormation($(this).data("formation-id"));
        });
        tdEditFormation.append(btnEditFormation);
        let tdDeleteFormation = $(`<td class="text-center">`);
        let btnDeleteFormation = $(`<button type="submit" class="btn btn-primary m-2" data-formation-id=${formation.id} data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation"  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer Formation'>`);
        btnDeleteFormation.append(`<i class="fas fa-trash me-2"></i>Supprimer`);
        btnDeleteFormation.click(function (e) {
            e.preventDefault();
            formationToOperate = formations.find(oneFormation => oneFormation.id == $(this).data("formation-id"));
        });
        tdDeleteFormation.append(btnDeleteFormation);
        let tdListeParticipants = $(`<td class="text-center">`);
        let btnListeParticipants = $(`<button type="submit" class="btn btn-primary m-2" data-formation-id=${formation.id} data-bs-toggle="modal" data-bs-target="#modal_ListePart"  data-bs-toggle='tooltip' data-bs-placement='top' title='Afficher les lieux'>`);
        btnListeParticipants.append(`<i class="fas fa-list me-2"></i>Liste</button>`);
        btnListeParticipants.click(function (e) {
            e.preventDefault();
            debugger
            formationToOperate = formations.find(oneFormation => oneFormation.id == $(this).data("formation-id"));
            participants = formationToOperate.participants;
            addParticipantToTable();
        });
        tdListeParticipants.append(btnListeParticipants);
        tr.append(tdNb, tdTitreFormation, tdDateFormation, tdHeureFormation, tdDureeFormation, tdOrganismeFormation, tdFormateur, tdObjetFormation, tdEditFormation, tdDeleteFormation, tdListeParticipants);
        $("tbody#tbl_formation").append(tr);
    });
}
/**
 * Fill all inputs to modify a formation
 * @param {int} index The index of the selected formation to be modified
 */
const fillModalEditFormation = (formationId) => {
    formationToOperate = formations.find(formation => formation.id == formationId);
    $("input#titre-formation").val(formationToOperate.formation_titre);
    $("input#date_formation").val(formationToOperate.formation_date);
    $("input#heure_formation").val(formationToOperate.formation_heure);
    $("input#duree_formation").val(formationToOperate.formation_duree);
    $("input#organisme-formation").val(formationToOperate.organisme);
    $("input#formateur").val(formationToOperate.formateur);
    $("input#objet").val(formationToOperate.objet);
}
/**
 * Add new participant to the formation
 * @param {object} participant The participant to be added
 */
const addParticipant = (participant) => {
    participants.push(participant);
    addParticipantToTable();
}
/**
 * Add the new participant to the table
 * @param {int} index The index of the new participant
 * @param {object} participant The participant to be added
 */
const addParticipantToTable = () => {
    $("tbody#tbl_participant").empty();
    $.each(participants, function (index, participant) {
        let tr = $(`<tr id=${index}>`);
        let tdNb = $("<td>");
        tdNb.text(index + 1);
        let tdNomParticipant = $(`<td>`);
        tdNomParticipant.text(participant.participant_nom);
        let tdPrenomParticipant = $(`<td>`);
        tdPrenomParticipant.text(participant.participant_prenom);
        let tdCinParticipant = $(`<td>`);
        tdCinParticipant.text(participant.participant_cin);
        let tdNumeroParticipant = $(`<td>`);
        tdNumeroParticipant.text(participant.participant_tele);
        let tdEditParticipant = $(`<td class="actionEdit">`);
        let btnEditParticipant = $(`<button type='submit' class='btn btn-sm btn-sm-square btn-primary m-2' data-participant-index=${index} data-bs-toggle='modal' data-bs-target='#modal_Editparticipant' data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier lieu'>`);
        btnEditParticipant.append(`<i class='fas fa-edit' data-participant-index=${index}></i>`);
        btnEditParticipant.click(function (e) {
            e.preventDefault();
            fillInputsWithSelectedParticipant($(this).data(`participant-index`));
            $("button#btn-add-participant").text(`Modifier participant`);
            $("button#btn-add-participant").data(`action`, `edit`);
            $("button#btn-add-participant").data(`participant-index`, $(this).data(`participant-index`));
            $("#participant-modal-title").text(`Modifier participant`);
        });
        tdEditParticipant.append(btnEditParticipant);
        let tdDeleteParticipant = $(`<td class="actionDelete">`);
        let btnDeleteParticipant = $(`<button type='submit' class='btn btn-sm btn-sm-square btn-primary m-2' data-participant-index=${index}  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer lieu'>`);
        btnDeleteParticipant.append(`<i class="fas fa-trash" data-participant-index=${index}></i>`);
        btnDeleteParticipant.click(function (e) {
            e.preventDefault();
            debugger
            participants = participants.filter((oneParticipant, indexParticipant) => {
                return indexParticipant != e.target.dataset.participantIndex;
            });
            editFormationParticipants();
            addParticipantToTable();
        });
        tdDeleteParticipant.append(btnDeleteParticipant);
        tr.append(tdNb, tdNomParticipant, tdPrenomParticipant, tdCinParticipant, tdNumeroParticipant, tdEditParticipant, tdDeleteParticipant);
        $("tbody#tbl_participant").append(tr);
    });
}
/**
 * Fill all inputs to modify a participant
 * @param {int} index The index of the selected participant to be modified
 */
const fillInputsWithSelectedParticipant = (index) => {
    let modifiedParticipant = participants[index];
    $("input#nom-participant").val(modifiedParticipant.participant_nom);
    $("input#prenom-participant").val(modifiedParticipant.participant_prenom);
    $("input#cin_participant").val(modifiedParticipant.participant_cin);
    $("input#numero-participant").val(modifiedParticipant.participant_tele);
}
/**
 * Edit a participant
 * @param {object} participant The participant to be modified
 * @param {int} index The index of the participant to be modified
 */
const editParticipant = (participant, index) => {
    participants[index] = participant;
    addParticipantToTable();
}
/**
 * Create participant object
 * @returns {Array} The new created participant
 */
const createParticipantObject = () => {
    let nomParticipant = $("input#nom-participant").val();
    let prenomParticipant = $("input#prenom-participant").val();
    let cinParticipant = $("input#cin_participant").val();
    let numeroParticipant = $("input#numero-participant").val();
    let participant = {
        "participant_nom": nomParticipant,
        "participant_prenom": prenomParticipant,
        "participant_cin": cinParticipant,
        "participant_tele": numeroParticipant,
    }
    return participant;
}
/**
 * Add/edit/remove tied participants with a formation
 */
function editFormationParticipants() {
    let dataToSend = {
        "participants": participants,
    }
    updateData(`link-participants-with-formation/${formationToOperate.id}`, dataToSend, (data) => {
        console.log(data);
        $("tbody#tbl_formation").empty();
        getAllData("formations", getAllFormations);
    });
}
