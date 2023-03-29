/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var programmes = null;
var programmeToOperate = null;
var places = [];
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("programmes", getAllProgrammes);
    getAllData("programmeTypes", fillSelectProgrammeTypes);
    getAllData("partenaires", fillSelectPartenaires);
    $("button#btn-edit-program").click(editProgramme);
    $("button#btn-delete-program").click(deleteProgramme);
    $("button#btn-add-place").click(function (e) {
        e.preventDefault();
        debugger
        let action = $(this).data(`action`);
        let place = createPlaceObject();
        if (action == "add") {
            addPlace(place);
        } else if (action == "edit") {
            editPlace(place, $(this).data(`place-index`));
            $("button#btn-add-place").text(`Ajouter place`);
            $(this).data(`action`, `add`);
            $("button#btn-add-place").data(`place-index`, undefined);
            $("button#btn-show-modal-add-place").trigger("click");
        }
        editProgrammePlaces();
        $("form#form-place input").val("");
    });
    $("button#btn-show-modal-add-place").click(function (e) {
        e.preventDefault();
        debugger
        $("#place-modal-title").text(`Ajouter place`);
    });
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Edit programme
 * @param {Event} e Information about the event
 */
const editProgramme = (e) => {
    e.preventDefault();
    let nomProgramme = $("input#nom-program").val();
    let typeProgramme = $("select#type-programme").val();
    let partenaire = $("select#partenaire").val();
    let dataToSend = {
        "programme_nom": nomProgramme,
        "programme_type": typeProgramme,
        "partenaire": partenaire,
    }
    updateData(`programmes/${programmeToOperate.id}`, dataToSend, showDialogResponse);
}
/**
 * Delete programme
 * @param {Event} e Information about the event
 */
const deleteProgramme = (e) => {
    e.preventDefault();
    deleteData(`programmes/${programmeToOperate.id}`, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains modified programme 
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let programme = data.result;
        let msg = data.msg;
        alertMsg(msg);
        $("tbody#tbl_programme").empty();
        getAllData("programmes", getAllProgrammes);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
}
/**
 * Retrieve all programmes from the server
 * @param {object} data response from the server that contains all programmes
 */
const getAllProgrammes = (data) => {
    programmes = data.programmes;
    $.each(programmes, function (indexInArray, programme) {
        let tr = $("<tr>");
        let tdNb = $("<td>");
        tdNb.text(indexInArray + 1);
        let tdNameProgramme = $("<td>");
        tdNameProgramme.text(programme.programme_nom);
        let tdTypeProgramme = $("<td>");
        tdTypeProgramme.text(programme.programme_type ? programme.programme_type.programme_type_nom : "");
        let tdPartenaire = $("<td>");
        tdPartenaire.text(programme.partenaire ? programme.partenaire.partenaire_nom : "");
        let tdEditProgramme = $(`<td class="text-center">`);
        let btnEditProgramme = $(`<button type='submit' class='btn btn-sm btn-sm-square btn-primary m-2' data-programme-id=${programme.id} data-bs-toggle='modal' data-bs-target='#modal_EditPrgrm'  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier Programme'>`);
        btnEditProgramme.append("<i class='fas fa-edit'></i>");
        btnEditProgramme.click(function (e) { 
            e.preventDefault();
            fillModalEditProgramme($(this).data("programme-id"));
        });
        tdEditProgramme.append(btnEditProgramme);
        let tdDeleteProgramme = $(`<td class="text-center">`);
        let btnDeleteProgramme = $(`<button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2" data-programme-id=${programme.id} data-bs-toggle="modal" data-bs-target="#modal_DeleteProgram"  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer Programme'>`);
        btnDeleteProgramme.append(`<i class="fas fa-trash"></i>`);
        btnDeleteProgramme.click(function (e) {
            e.preventDefault();
            programmeToOperate = programmes.find(oneProgramme => oneProgramme.id == $(this).data("programme-id"));
        });
        tdDeleteProgramme.append(btnDeleteProgramme);
        let tdListePlaces = $(`<td class="text-center">`);
        let btnListePlaces = $(`<button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2" data-programme-id=${programme.id} data-bs-toggle="modal" data-bs-target="#modal_ListePlace"  data-bs-toggle='tooltip' data-bs-placement='top' title='Afficher les lieux'>`);
        btnListePlaces.append(`<i class="fas fa-list"></i>`);
        btnListePlaces.click(function (e) {
            e.preventDefault();
            debugger
            programmeToOperate = programmes.find(oneProgramme => oneProgramme.id == $(this).data("programme-id"));
            places = programmeToOperate.places;
            addPlaceToTable();
        });
        tdListePlaces.append(btnListePlaces);
        tr.append(tdNb, tdNameProgramme, tdTypeProgramme, tdPartenaire, tdEditProgramme, tdDeleteProgramme, tdListePlaces);
        $("tbody#tbl_programme").append(tr);
    });
}
/**
 * Fill all inputs to modify a programme
 * @param {int} index The index of the selected programme to be modified
 */
const fillModalEditProgramme = (programmeId) => {
    programmeToOperate = programmes.find(programme => programme.id == programmeId);
    $("input#nom-program").val(programmeToOperate.programme_nom);
    $("select#type-programme").val(programmeToOperate.programme_type ? programmeToOperate.programme_type.id : "");
    $("select#type-programme").trigger('change');
    $("select#partenaire").val(programmeToOperate.partenaire ? programmeToOperate.partenaire.id : "");
    $("select#partenaire").trigger('change');
}
/**
 * Add new place to the programme
 * @param {object} place The place to be added
 */
const addPlace = (place) => {
    places.push(place);
    addPlaceToTable();
}
/**
 * Add the new place to the table
 * @param {int} index The index of the new place
 * @param {object} place The place to be added
 */
const addPlaceToTable = () => {
    $("tbody#tbl_place").empty();
    $.each(places, function (index, place) {
        let tr = $(`<tr id=${index}>`);
        let tdNb = $("<td>");
        tdNb.text(index + 1);
        let tdNomPlace = $(`<td>`);
        tdNomPlace.text(place.lieu);
        let tdDateProgramme = $(`<td>`);
        tdDateProgramme.text(place.programme_date);
        let tdResultatProgramme = $(`<td>`);
        tdResultatProgramme.text(place.programme_resultat);
        let tdEditPlace = $(`<td>`);
        let btnEditPlace = $(`<button type='submit' class='btn btn-sm btn-sm-square btn-primary m-2' data-place-index=${index} data-bs-toggle='modal' data-bs-target='#modal_EditPlace' data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier lieu'>`);
        btnEditPlace.append(`<i class='fas fa-edit' data-place-index=${index}></i>`);
        btnEditPlace.click(function (e) {
            e.preventDefault();
            fillInputsWithSelectedPlace($(this).data(`place-index`));
            $("button#btn-add-place").text(`Modifier place`);
            $("button#btn-add-place").data(`action`, `edit`);
            $("button#btn-add-place").data(`place-index`, $(this).data(`place-index`));
            $("#place-modal-title").text(`Modifier place`);
        });
        tdEditPlace.append(btnEditPlace);
        let tdDeletePlace = $(`<td>`);
        let btnDeletePlace = $(`<button type='submit' class='btn btn-sm btn-sm-square btn-primary m-2' data-place-index=${index}  data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer lieu'>`);
        btnDeletePlace.append(`<i class="fas fa-trash" data-place-index=${index}></i>`);
        btnDeletePlace.click(function (e) {
            e.preventDefault();
            debugger
            places = places.filter((onePlace, indexPlace) => {
                return indexPlace != e.target.dataset.placeIndex;
            });
            editProgrammePlaces();
            addPlaceToTable();
        });
        tdDeletePlace.append(btnDeletePlace);
        tr.append(tdNb, tdNomPlace, tdDateProgramme, tdResultatProgramme, tdEditPlace, tdDeletePlace);
        $("tbody#tbl_place").append(tr);
    });
}
/**
 * Fill all inputs to modify a place
 * @param {int} index The index of the selected place to be modified
 */
const fillInputsWithSelectedPlace = (index) => {
    let modifiedPlace = places[index];
    $("input#nom-place").val(modifiedPlace.lieu);
    $("input#date-programme").val(modifiedPlace.programme_date);
    $("input#resultat-programme").val(modifiedPlace.programme_resultat);
}
/**
 * Edit a place
 * @param {object} place The place to be modified
 * @param {int} index The index of the place to be modified
 */
const editPlace = (place, index) => {
    places[index] = place;
    addPlaceToTable();
}
/**
 * Create place object
 * @returns {Array} The new created place
 */
const createPlaceObject = () => {
    let lieu = $("input#nom-place").val();
    let dateProgramme = $("input#date-programme").val();
    let resultatProgramme = $("input#resultat-programme").val();
    let place = {
        "lieu": lieu,
        "programme_date": dateProgramme,
        "programme_resultat": resultatProgramme,
    }
    return place;
}
/**
 * Add/edit/remove tied places with a programme
 */
function editProgrammePlaces() {
    let dataToSend = {
        "places": places,
    }
    updateData(`link-places-with-programme/${programmeToOperate.id}`, dataToSend, (data)=>{console.log(data);});
}
/**
 * Fill the select field with all programme types
 * @param {object} data response from the server that contains all programme types
 */
const fillSelectProgrammeTypes = (data)=>{
    let programme_types = data.programme_types;
    $.each(programme_types, function (indexInArray, programme_type) {
        let option = $("<option>");
        option.text(programme_type.programme_type_nom);
        option.val(programme_type.id);
        $("select#type-programme").append(option);
    });
    $("select#type-programme").select2({
        placeholder: 'Séléctionner un type programme...',
    });
}
/**
 * Fill the select field with all partenaires
 * @param {object} data response from the server that contains all partenaires
 */
const fillSelectPartenaires = (data)=>{
    let partenaires = data.partenaires;
    $.each(partenaires, function (indexInArray, partenaire) {
        let option = $("<option>");
        option.text(partenaire.partenaire_nom);
        option.val(partenaire.id);
        $("select#partenaire").append(option);
    });
    $("select#partenaire").select2({
        placeholder: 'Séléctionner un partenaire...',
    });
}
