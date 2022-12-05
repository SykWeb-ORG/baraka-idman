// $.ajaxSetup({
//     headers:{
//         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
//     }
// })

// Declaration 
//const url = "http://127.0.0.1:8000/users"
const divMessage = $('#message-alert');
const currentUrl = $(location).attr('href');
let urlSplited = currentUrl.split("/");
var currentUserId = urlSplited.length == 5 ? urlSplited[4] : '';
const formUser = $( ".form-user" );
const btnFormUser = $('#btn-manip-user');


// Functions
//--> Post user informations
function postDataUser(url) {
    $.ajax({
        type: "POST",
        url: url,
        async: false,
        data: {
            first_name : $('#first-name-user').val(),
            last_name : $('#last-name-user').val(),
            cin : $('#cin-user').val(),
            phone_number : $('#phone-number-user').val(),
            birthday_date : $('#birtday-user').val(),
            email : $('#email-user').val(),
            role : $('#roles-user').val(),
            
        },
        dataType: "json",
        success: (response) => {
            divMessage.html(messageComponants("Utilisateur ajouter avec success", "success", "fa-check"));
        },
        error: (xhr, status, error) => {
            var err = JSON.parse(xhr.responseText);
            divMessage.html(messageComponants(err.message, "danger", "fa-times"));
        }
    })

}

function getDataUser(user) {
    let userRole = "";
    if(user.admin != null) {
        userRole = "admin"
    }
    else if(user.intervenant != null) {
        userRole = "intervenant"
    }
    else if(user.social_assistant != null) {
        userRole = "social assistant"
    }
    else {
        userRole = "medical assistant"
    }

    $('#first-name-user').val(user.first_name)
    $('#last-name-user').val(user.last_name)
    $('#cin-user').val(user.cin)
    $('#phone-number-user').val(user.phone_number)
    $('#birtday-user').val(user.birthday_date)
    $('#email-user').val(user.email)
    $('#roles-user').val(userRole)
    btnFormUser.html('Modifier')
    $('#title-form').html('Modifier Utilisateur')
}

fetch(currentUrl+"/edit")
    .then(response => response.json())
    .then(data => getDataUser(data))

//Events
//--> Submit Form
formUser.submit(function( event ) {
    event.preventDefault();
    var actionForm = btnFormUser.html()
    if(actionForm == "Ajouter") {
        postDataUser(currentUrl);
    }
    else {
        
    }
}) 
