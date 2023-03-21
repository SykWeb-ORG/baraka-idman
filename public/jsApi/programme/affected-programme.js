/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var programmes = [];
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("all-affected-programmes", getAllProgrammes);
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Retrieve all affected programmes from the server
 * @param {object} data response from the server that contains all affected programmes
 */
const getAllProgrammes = (data) => {
    programmes = data.programmes;
    $.each(programmes, function (indexInArray, programme) {
        let li = $(`<li><button type="submit" class="btn btn-prgm p-0" data-programme-id="${programme.id}" data-bs-toggle="modal" data-bs-target="#modal_ListePlacePrgm" data-bs-placement="top" title="Afficher les lieux">${programme.programme_nom}</button></li>`);
        $("ul#list-programmes").append(li);
    });
    $("button.btn-prgm").bind('click', showPlaces);
}
/**
 * Display selected programme's places
 * @param {Event} e Information about the event
 */
const showPlaces = (e) => {
    e.preventDefault();
    let places = programmes.find((programme, index) => programme.id == e.target.dataset.programmeId).places;
    addPlaceToTable(places);
}
/**
 * Display places into the table
 * @param {Array} places The places to be added
 */
const addPlaceToTable = (places) => {
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
        // let tdEditPlace = $(`<td>`);
        // let btnEditPlace = $(`<button type='submit' class='btn btn-sm btn-sm-square btn-primary m-2' data-place-index=${index}  data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier lieu'>`);
        // btnEditPlace.append(`<i class='fas fa-edit' data-place-index=${index}></i>`);
        // btnEditPlace.click(function (e) {
        //     e.preventDefault();
        //     fillInputsWithSelectedPlace($(this).data(`place-index`));
        // });
        // tdEditPlace.append(btnEditPlace);
        tr.append(tdNb, tdNomPlace, tdDateProgramme, tdResultatProgramme/*, tdEditPlace */);
        $("tbody#tbl_place").append(tr);
    });
}
