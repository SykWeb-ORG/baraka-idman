/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var participants = [];
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    $("button#btn-add-formation").click(addFormation);
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
        }
        $("div.participant input").val("");
    });
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Add new formation
 * @param {Event} e Information about the event
 */
const addFormation = (e) => {
    e.preventDefault();
    debugger
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
    addData("formations", dataToSend, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new formations
 */
const showDialogResponse = (data) => {
    let formation = data.result;
    let msg = data.msg;
    alert(msg);
}
/**
 * Add new participant to the programme
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
        let tdEditParticipant = $(`<td>`);
        let btnEditParticipant = $(`<button type='submit' class='btn btn-sm btn-sm-square btn-primary m-2' data-participant-index=${index}  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier participant'>`);
        btnEditParticipant.append(`<i class='fas fa-edit' data-participant-index=${index}></i>`);
        btnEditParticipant.click(function (e) {
            e.preventDefault();
            fillInputsWithSelectedParticipant($(this).data(`participant-index`));
            $("button#btn-add-participant").text(`Modifier participant`);
            $("button#btn-add-participant").data(`action`, `edit`);
            $("button#btn-add-participant").data(`participant-index`, $(this).data(`participant-index`));
        });
        tdEditParticipant.append(btnEditParticipant);
        let tdDeleteParticipant = $(`<td>`);
        let btnDeleteParticipant = $(`<button type='submit' class='btn btn-sm btn-sm-square btn-primary m-2' data-participant-index=${index}  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer participant'>`);
        btnDeleteParticipant.append(`<i class="fas fa-trash" data-participant-index=${index}></i>`);
        btnDeleteParticipant.click(function (e) {
            e.preventDefault();
            debugger
            participants = participants.filter((oneParticipant, indexParticipant) => {
                return indexParticipant != e.target.dataset.participantIndex;
            });
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
