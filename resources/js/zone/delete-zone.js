require('./bootstrap');
const baseUrl = "http://localhost:8000/";
$(document).ready(function(){
    axios.get('/sanctum/csrf-cookie').then(response => {
        console.log(response);
    });
    let btnDeleteZone = document.getElementById('btnDeleteZone');
    btnDeleteZone.addEventListener('click', function(e){
        debugger;
        let endUrl = "zones/" + beneficiaire.id;
        axios.delete(baseUrl + endUrl)
        .then((response) => {
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
