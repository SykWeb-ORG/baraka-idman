require('../bootstrap');
console.log(beneficiaire);
const baseUrl = "http://localhost:8000/";
function getDataViolenceTypes(endUrl) {
    debugger
    // $.ajax({
    //     type: "GET",
    //     url: baseUrl + endUrl,
    //     async: false,
    //     dataType: "json",
    //     success: (response) => {
    //         console.log(response);
    //         displayAllViolenceTypes(response.violence_types);
    //         if (response.violence_types.length > 0) {
    //             debugger
    //             checkViolenceTypesByBeneficiaire(beneficiaire);
    //             beneficiaireViolated(beneficiaire);
    //         }
    //     }
    // })
    axios.get(baseUrl + endUrl).then(response => {
        console.log(response);
        response = response.data;
        displayAllViolenceTypes(response.violence_types);
        if (response.violence_types.length > 0) {
            debugger
            checkViolenceTypesByBeneficiaire(beneficiaire);
            beneficiaireViolated(beneficiaire);
        }
    });
}
function displayAllViolenceTypes(violence_types) {
    let tbodyViolenceTypes = document.getElementById('tbodyViolenceTypes');
    violence_types.forEach(violenceType => {
        let violenceType_input = document.createElement('input');
        violenceType_input.type = 'checkbox';
        violenceType_input.name = 'violence_types[]';
        violenceType_input.value = violenceType.id;
        violenceType_input.id = violenceType.id;
        let tdViolenceTypeInp = document.createElement('td');
        tdViolenceTypeInp.appendChild(violenceType_input);
        let tdViolenceTypeLabel = document.createElement('td');
        tdViolenceTypeLabel.textContent = violenceType.violence_nom;
        let trContainer = document.createElement('tr');
        trContainer.appendChild(tdViolenceTypeInp);
        trContainer.appendChild(tdViolenceTypeLabel);
        tbodyViolenceTypes.appendChild(trContainer);
    });

}
function checkViolenceTypesByBeneficiaire(beneficiaire) {
    console.log(beneficiaire);
    beneficiaire.violence_types.forEach(violence_type => {
        let violence_type_input = document.getElementById(violence_type.id);
        violence_type_input.checked = true;
    });

}
function beneficiaireViolated(beneficiaire) {
    if (beneficiaire.violence_types.length > 0) {
        document.getElementById('oui').checked = true;
        document.getElementById('non').checked = false;
    } else {
        document.getElementById('non').checked = true;
        document.getElementById('oui').checked = false;
    }
}
$(document).ready(function(){
    // $.ajaxSetup({
    //     headers:{
    //         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    //     }
    // })
    debugger
    getDataViolenceTypes("all-violence_types");
    let btnMatchViolenceTypes = document.getElementById('btnMatchViolenceTypes');
    btnMatchViolenceTypes.addEventListener('click', function(e){
        debugger
        let selectedViolenceTypes = jQuery.grep($('input[name="violence_types[]"]'), function(violenceType) {
            return violenceType.checked;
        });
        if (beneficiaire) {
            let violenceTypesIds = jQuery.map(selectedViolenceTypes, function(violenceType){
                return violenceType.value;
            });
            let endUrl = 'match-beneficiaire-violence_types/' + beneficiaire.id;
            // $.ajax({
            //     type: "POST",
            //     url: baseUrl + endUrl,
            //     async: false,
            //     dataType: "json",
            //     data:{
            //         violence_types : violenceTypesIds,
            //     },
            //     success: (beneficiaire) => {
            //         debugger
            //         console.log(beneficiaire);
            //         beneficiaireViolated(beneficiaire);
            //         alert("Les changements sont bien effectués.");
            //     },
            //     error: function (xhr, ajaxOptions, thrownError) {
            //         debugger
            //         alert(xhr.status);
            //         alert(xhr.responseText);
            //     }
            // });
            axios.post(baseUrl + endUrl, {
                violence_types : violenceTypesIds,
            }).then((response) => {
                console.log(response);
                beneficiaire = response.data;
                beneficiaireViolated(beneficiaire);
                alert("Les changements sont bien effectués.");
            });
        }else{
            return;
        }
    })

})
