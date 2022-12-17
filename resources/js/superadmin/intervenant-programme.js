require('../bootstrap');
console.log(intervenant);
const baseUrl = "http://localhost:8000/";
function getData(endUrl) {
    debugger
    axios.get(baseUrl + endUrl).then(response => {
        console.log(response);
        programmes = response.data;
        displayAllProgrammes(programmes);
        if (programmes.length > 0) {
            checkIntervenantProgrammes(intervenant.programmes);
        }
    });
}
function displayAllProgrammes(programmes) {
    let divProgrammes = document.getElementById('programme_check');
    programmes.forEach(programme => {
        let programme_input = document.createElement('input');
        programme_input.type = 'checkbox';
        programme_input.name = 'programmes[]';
        programme_input.classList.add("form-check-input");
        programme_input.value = programme.id;
        programme_input.id = programme.id;
        let programme_label = document.createElement('label');
        programme_label.htmlFor = programme.id;
        programme_label.textContent = programme.programme_nom;
        let divContainer = document.createElement('div');
        divContainer.className = 'programme';
        divContainer.appendChild(programme_input);
        divContainer.appendChild(programme_label);
        divProgrammes.appendChild(divContainer);
    });
}
function checkIntervenantProgrammes(programmes) {
    programmes.forEach(programme => {
        let programme_input = document.getElementById(programme.id);
        programme_input.checked = true;
    });
}
$(document).ready(function(){
    axios.get('/sanctum/csrf-cookie').then(response => {
        console.log(response);
    });
    getData("programmes");
    let btnMatchIntervenantProgrammes = document.getElementById('btnMatchIntervenantProgrammes');
    btnMatchIntervenantProgrammes.addEventListener('click', function(e){
        debugger
        let selectedProgrammes = jQuery.grep($('input[name="programmes[]"]'), function(programme) {
            return programme.checked;
        });
        if (intervenant) {
            let programmesIds = jQuery.map(selectedProgrammes, function(programme){
                return programme.id;
            });
            let endUrl = 'match-intervenant-programmes/' + intervenant.id;
            axios.post(baseUrl + endUrl, {
                    programmes: programmesIds,
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
