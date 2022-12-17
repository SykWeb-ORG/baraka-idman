require('../bootstrap');
console.log(intervenant);
const baseUrl = "http://localhost:8000/";
function getData(endUrl) {
    debugger
    axios.get(baseUrl + endUrl).then(response => {
        console.log(response);
        zones = response.data;
        displayAllZones(zones);
        if (zones.length > 0) {
            checkIntervenantZones(intervenant.zones);
        }
    });
}
function displayAllZones(zones) {
    let divZones = document.getElementById('zone_check');
    zones.forEach(zone => {
        let zone_input = document.createElement('input');
        zone_input.type = 'checkbox';
        zone_input.name = 'zones[]';
        zone_input.classList.add("form-check-input");
        zone_input.value = zone.id;
        zone_input.id = zone.id;
        let zone_label = document.createElement('label');
        zone_label.htmlFor = zone.id;
        zone_label.textContent = zone.zone_nom;
        let divContainer = document.createElement('div');
        divContainer.className = 'zone';
        divContainer.appendChild(zone_input);
        divContainer.appendChild(zone_label);
        divZones.appendChild(divContainer);
    });
}
function checkIntervenantZones(zones) {
    zones.forEach(zone => {
        let zone_input = document.getElementById(zone.id);
        zone_input.checked = true;
    });
}
$(document).ready(function(){
    axios.get('/sanctum/csrf-cookie').then(response => {
        console.log(response);
    });
    getData("zones");
    let btnMatchIntervenantZones = document.getElementById('btnMatchIntervenantZones');
    btnMatchIntervenantZones.addEventListener('click', function(e){
        debugger
        let selectedZones = jQuery.grep($('input[name="zones[]"]'), function(zone) {
            return zone.checked;
        });
        if (intervenant) {
            let zonesIds = jQuery.map(selectedZones, function(zone){
                return zone.id;
            });
            let endUrl = 'match-intervenant-zones/' + intervenant.id;
            axios.post(baseUrl + endUrl, {
                    zones: zonesIds,
            }).then((response) => {
                debugger
                console.log(response);
                response = response.data;
                intervenant = response.result;
                alert(response.msg);
            });
        }else{
            return;
        }
    })
})
