require('./bootstrap');
const baseUrl = "http://localhost:8000/";
$(document).ready(function(){
    axios.get('/sanctum/csrf-cookie').then(response => {
        console.log(response);
    });
    let endUrl = "zones";
    axios.get(baseUrl + endUrl)
    .then((response) => {
        debugger
        console.log(response);
        response = response.data;
        if (response.result) {
            alert(response.msg);
        } else {
            alert(response.msg);
        }
    });
})
