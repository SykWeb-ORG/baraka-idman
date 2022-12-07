function getDataDrogueTypes(endUrl) {
    debugger
    $.ajax({
        type: "GET",
        url: baseUrl + endUrl,
        async: false,
        dataType: "json",
        success: (response) => {
            console.log(response);
            displayAllDrogueTypes(response.drogue_types);
            if (response.drogue_types.length > 0) {
                debugger
                checkDrogueTypesByBeneficiaire(beneficiaire);
            }
        }
    })
    
}
function displayAllDrogueTypes(drogue_types) {
    let tbodyDrogueTypes = document.getElementById('tbodyDrogueTypes');
    drogue_types.forEach(drogueType => {
        let drogueType_input = document.createElement('input');
        drogueType_input.type = 'checkbox';
        drogueType_input.name = 'drogue_types[]';
        drogueType_input.value = drogueType.id;
        drogueType_input.id = 'dt' + drogueType.id;
        let tdDrogueTypeInp = document.createElement('td');
        tdDrogueTypeInp.appendChild(drogueType_input);
        let drogueType_label = document.createElement('label');
        drogueType_label.htmlFor = drogueType.id;
        drogueType_label.textContent = drogueType.service_nom;
        tdDrogueTypeInp.appendChild(drogueType_label);
        let frequence_input = document.createElement('input');
        frequence_input.name = 'frequences[]';
        frequence_input.id = 'frq' + drogueType.id;
        let tdFrequence = document.createElement('td');
        tdFrequence.appendChild(frequence_input);
        let trContainer = document.createElement('tr');
        trContainer.appendChild(tdDrogueTypeInp);
        trContainer.appendChild(tdFrequence);
        tbodyDrogueTypes.appendChild(trContainer);
    });

}
function checkDrogueTypesByBeneficiaire(beneficiaire) {
    console.log(beneficiaire);
    beneficiaire.drogue_types.forEach(drogue_type => {
        let drogue_type_input = document.getElementById('dt' + drogue_type.id);
        drogue_type_input.checked = true;
        let frequence_input = document.getElementById('frq' + drogue_type.id);
        frequence_input.value = drogue_type.beneficiaire_drogue_type.frequence;
    });

}
$(document).ready(function(){
    debugger
    getDataDrogueTypes("all-drogue_types");
    let btnMatchDrogueTypes = document.getElementById('btnMatchDrogueTypes');
    btnMatchDrogueTypes.addEventListener('click', function(e){
        debugger
        let selectedDrogueTypes = jQuery.grep($('input[name="drogue_types[]"]'), function(drogueType) {
            return drogueType.checked;
        });
        let frequences = [];
        debugger
        jQuery.each(selectedDrogueTypes, function(index, drogueTypeElem){
            let frequence = drogueTypeElem.parentElement.nextElementSibling.children[0].value;
            frequences.push(frequence);
        })
        if (selectedDrogueTypes.length > 0 && beneficiaire) {
            let drogueTypesIds = jQuery.map(selectedDrogueTypes, function(drogueType){
                return drogueType.value;
            });
            let endUrl = 'match-beneficiaire-drogue_types/' + beneficiaire.id;
            $.ajax({
                type: "POST",
                url: baseUrl + endUrl,
                async: false,
                dataType: "json",
                data:{
                    drogue_types : drogueTypesIds,
                    frequences : frequences,
                },
                success: (beneficiaire) => {
                    debugger
                    console.log(beneficiaire);
                    alert("Les changements sont bien effectués.");
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    debugger
                    alert(xhr.status);
                    alert(xhr.responseText);
                }
            });
        }else{
            return;
        }
    })

})
