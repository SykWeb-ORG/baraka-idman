require('./bootstrap');
const baseUrl = "http://localhost:8000/";
$(document).ready(function(){
    axios.get('/sanctum/csrf-cookie').then(response => {
        console.log(response);
    });
    let btnEditZone = document.getElementById('btnEditZone');
    btnEditZone.addEventListener('click', function(e){
        debugger;
        let endUrl = "zones/" + beneficiaire.id;
        axios.put(baseUrl + endUrl, {
            zone_nom: document.getElementById('zone-nom').value,
        }).then((response) => {
            console.log(response);
            response = response.data;
            if (response.result) {
                alert(response.msg);
            } else {
                alert(response.msg);
            }
        });
    })
})
