require('../bootstrap');
console.log(beneficiaire);
const baseUrl = "http://localhost:8000/"
function getData(endUrl) {
    debugger
    // $.ajax({
    //     type: "GET",
    //     url: baseUrl + endUrl,
    //     async: false,
    //     dataType: "json",
    //     success: (response) => {
    //         console.log(response);
    //         displayAllCouvertures(response.couvertures);
    //         if (response.couvertures.length > 0) {
    //             checkCouverturesByBeneficiaire(beneficiaire);
    //         }
    //     }
    // })
    axios.get(baseUrl + endUrl).then(response => {
        console.log(response);
        response = response.data;
        console.log(response);
        displayAllCouvertures(response.couvertures);
        if (response.couvertures.length > 0) {
            checkCouverturesByBeneficiaire(beneficiaire);
        }
    });
}
function displayAllCouvertures(couvertures) {
    let divPermissions = document.getElementById('couv-medic');
    couvertures.forEach(couverture => {
        let couverture_input = document.createElement('input');
        couverture_input.type = 'checkbox';
        couverture_input.name = 'couvertures[]';
        couverture_input.value = couverture.id;
        couverture_input.id = couverture.id;
        let couverture_label = document.createElement('label');
        couverture_label.htmlFor = couverture.id;
        couverture_label.textContent = couverture.couverture_nom;
        let divContainer = document.createElement('div');
        divContainer.className = 'couv';
        divContainer.appendChild(couverture_input);
        divContainer.appendChild(couverture_label);
        divPermissions.appendChild(divContainer);
    });

}
function checkCouverturesByBeneficiaire(beneficiaire) {
    beneficiaire.couvertures.forEach(couverture => {
        let couverture_input = document.getElementById(couverture.id);
        couverture_input.checked = true;
    });

}
$(document).ready(function(){
    // $.ajaxSetup({
    //     headers:{
    //         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    //     }
    // })
    debugger
    getData("all-couvertures");
    let btnMatchCouvertures = document.getElementById('btnMatchCouvertures');
    btnMatchCouvertures.addEventListener('click', function(e){
        debugger
        let selectedCouvertures = jQuery.grep($('input[name="couvertures[]"]'), function(couverture) {
            return couverture.checked;
        });
        if (selectedCouvertures.length > 0 && beneficiaire) {
            let couverturesIds = jQuery.map(selectedCouvertures, function(couverture){
                return couverture.id;
            });
            let endUrl = 'match-beneficiaire-couvertures/' + beneficiaire.id;
            // $.ajax({
            //     type: "POST",
            //     url: baseUrl + endUrl,
            //     async: false,
            //     dataType: "json",
            //     data:{
            //         couvertures : couverturesIds,
            //     },
            //     success: (role) => {
            //         debugger
            //         console.log(role);
            //         alert("Les changements sont bien effectués.");
            //     },
            //     error: function (xhr, ajaxOptions, thrownError) {
            //         debugger
            //         alert(xhr.status);
            //         alert(xhr.responseText);
            //     }
            // });
            axios.post(baseUrl + endUrl, {
                couvertures : couverturesIds,
            }).then((response) => {
                console.log(response);
                response = response.data;
                alert("Les changements sont bien effectués.");
            });
        }else{
            return;
        }
    })

})
