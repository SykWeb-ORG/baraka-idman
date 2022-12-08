/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************************************!*\
  !*** ./resources/js/intervenant/drogueType-beneficiaire.js ***!
  \*************************************************************/
var baseUrl = "http://localhost:8000/";
function getDataDrogueTypes(endUrl) {
  debugger;
  // $.ajax({
  //     type: "GET",
  //     url: baseUrl + endUrl,
  //     async: false,
  //     dataType: "json",
  //     success: (response) => {
  //         console.log(response);
  //         displayAllDrogueTypes(response.drogue_types);
  //         if (response.drogue_types.length > 0) {
  //             debugger
  //             checkDrogueTypesByBeneficiaire(beneficiaire);
  //         }
  //     }
  // })
  axios.get(baseUrl + endUrl).then(function (response) {
    console.log(response);
    response = response.data;
    displayAllDrogueTypes(response.drogue_types);
    if (response.drogue_types.length > 0) {
      debugger;
      checkDrogueTypesByBeneficiaire(beneficiaire);
    }
  });
}
function displayAllDrogueTypes(drogue_types) {
  var tbodyDrogueTypes = document.getElementById('tbodyDrogueTypes');
  drogue_types.forEach(function (drogueType) {
    var drogueType_input = document.createElement('input');
    drogueType_input.type = 'checkbox';
    drogueType_input.name = 'drogue_types[]';
    drogueType_input.value = drogueType.id;
    drogueType_input.id = 'dt' + drogueType.id;
    var tdDrogueTypeInp = document.createElement('td');
    tdDrogueTypeInp.appendChild(drogueType_input);
    var drogueType_label = document.createElement('label');
    drogueType_label.htmlFor = drogueType.id;
    drogueType_label.textContent = drogueType.service_nom;
    tdDrogueTypeInp.appendChild(drogueType_label);
    var frequence_input = document.createElement('input');
    frequence_input.name = 'frequences[]';
    frequence_input.id = 'frq' + drogueType.id;
    var tdFrequence = document.createElement('td');
    tdFrequence.appendChild(frequence_input);
    var trContainer = document.createElement('tr');
    trContainer.appendChild(tdDrogueTypeInp);
    trContainer.appendChild(tdFrequence);
    tbodyDrogueTypes.appendChild(trContainer);
  });
}
function checkDrogueTypesByBeneficiaire(beneficiaire) {
  console.log(beneficiaire);
  beneficiaire.drogue_types.forEach(function (drogue_type) {
    var drogue_type_input = document.getElementById('dt' + drogue_type.id);
    drogue_type_input.checked = true;
    var frequence_input = document.getElementById('frq' + drogue_type.id);
    frequence_input.value = drogue_type.beneficiaire_drogue_type.frequence;
  });
}
$(document).ready(function () {
  debugger;
  getDataDrogueTypes("all-drogue_types");
  var btnMatchDrogueTypes = document.getElementById('btnMatchDrogueTypes');
  btnMatchDrogueTypes.addEventListener('click', function (e) {
    debugger;
    var selectedDrogueTypes = jQuery.grep($('input[name="drogue_types[]"]'), function (drogueType) {
      return drogueType.checked;
    });
    var frequences = [];
    debugger;
    jQuery.each(selectedDrogueTypes, function (index, drogueTypeElem) {
      var frequence = drogueTypeElem.parentElement.nextElementSibling.children[0].value;
      frequences.push(frequence);
    });
    if (selectedDrogueTypes.length > 0 && beneficiaire) {
      var drogueTypesIds = jQuery.map(selectedDrogueTypes, function (drogueType) {
        return drogueType.value;
      });
      var endUrl = 'match-beneficiaire-drogue_types/' + beneficiaire.id;
      // $.ajax({
      //     type: "POST",
      //     url: baseUrl + endUrl,
      //     async: false,
      //     dataType: "json",
      //     data:{
      //         drogue_types : drogueTypesIds,
      //         frequences : frequences,
      //     },
      //     success: (beneficiaire) => {
      //         debugger
      //         console.log(beneficiaire);
      //         alert("Les changements sont bien effectués.");
      //     },
      //     error: function (xhr, ajaxOptions, thrownError) {
      //         debugger
      //         alert(xhr.status);
      //         alert(xhr.responseText);
      //     }
      // });
      axios.post(baseUrl + endUrl, {
        drogue_types: drogueTypesIds,
        frequences: frequences
      }).then(function (response) {
        console.log(response);
        response = response.data;
        alert("Les changements sont bien effectués.");
      });
    } else {
      return;
    }
  });
});
/******/ })()
;