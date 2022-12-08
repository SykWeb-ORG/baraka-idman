require('../bootstrap');
console.log(beneficiaire);
const baseUrl = "http://localhost:8000/";
function getDataServices(endUrl) {
    debugger
    // $.ajax({
    //     type: "GET",
    //     url: baseUrl + endUrl,
    //     async: false,
    //     dataType: "json",
    //     success: (response) => {
    //         console.log(response);
    //         displayAllServices(response.services);
    //         if (response.services.length > 0) {
    //             debugger
    //             checkServicesByBeneficiaire(beneficiaire);
    //         }
    //     }
    // })
    axios.get(baseUrl + endUrl).then(response => {
        console.log(response);
        response = response.data;
        displayAllServices(response.services);
        if (response.services.length > 0) {
            debugger
            checkServicesByBeneficiaire(beneficiaire);
        }
    });
}
function displayAllServices(services) {
    let tbodyServices = document.getElementById('tbodyServices');
    services.forEach(service => {
        let service_input = document.createElement('input');
        service_input.type = 'checkbox';
        service_input.name = 'services[]';
        service_input.value = service.id;
        service_input.id = service.id;
        let tdServiceInp = document.createElement('td');
        tdServiceInp.appendChild(service_input);
        let tdServiceLabel = document.createElement('td');
        tdServiceLabel.textContent = service.service_nom;
        let trContainer = document.createElement('tr');
        trContainer.appendChild(tdServiceInp);
        trContainer.appendChild(tdServiceLabel);
        tbodyServices.appendChild(trContainer);
    });

}
function checkServicesByBeneficiaire(beneficiaire) {
    console.log(beneficiaire);
    beneficiaire.services.forEach(violence_type => {
        let violence_type_input = document.getElementById(violence_type.id);
        violence_type_input.checked = true;
    });

}
$(document).ready(function(){
    // $.ajaxSetup({
    //     headers:{
    //         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    //     }
    // })
    debugger
    getDataServices("all-services");
    let btnMatchServices = document.getElementById('btnMatchServices');
    btnMatchServices.addEventListener('click', function(e){
        debugger
        let selectedServices = jQuery.grep($('input[name="services[]"]'), function(service) {
            return service.checked;
        });
        if (beneficiaire) {
            let servicesIds = jQuery.map(selectedServices, function(service){
                return service.value;
            });
            let endUrl = 'match-beneficiaire-services/' + beneficiaire.id;
            // $.ajax({
            //     type: "POST",
            //     url: baseUrl + endUrl,
            //     async: false,
            //     dataType: "json",
            //     data:{
            //         services : servicesIds,
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
                services : servicesIds,
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
