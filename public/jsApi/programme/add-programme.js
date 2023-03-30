/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var places = [];
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("programmeTypes", fillSelectProgrammeTypes);
    $("button#btn-add-programme").click(addProgramme);
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
        }
        $("div.place input").val("");
    });
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Add new Programme 
 * @param {Event} e Information about the event
 */
const addProgramme = (e) => {
    e.preventDefault();
    let nomProgramme = $("input#nom-programme").val();
    let typeProgramme = $("select#type-programme").val();
    let dataToSend = {
        "programme_nom": nomProgramme,
        "programme_type": typeProgramme,
        "places": places,
    }
    addData("programmes", dataToSend, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new programme 
 */
const showDialogResponse = (data) => {
    if (data.status == 200) {
        let programme = data.result;
        let msg = data.msg;
        alertMsg(msg);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
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
        let btnEditPlace = $(`<button type='submit' class='btn btn-sm btn-sm-square btn-primary m-2' data-place-index=${index}  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier lieu'>`);
        btnEditPlace.append(`<i class='fas fa-edit' data-place-index=${index}></i>`);
        btnEditPlace.click(function (e) {
            e.preventDefault();
            fillInputsWithSelectedPlace($(this).data(`place-index`));
            $("button#btn-add-place").text(`Modifier place`);
            $("button#btn-add-place").data(`action`, `edit`);
            $("button#btn-add-place").data(`place-index`, $(this).data(`place-index`));
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
