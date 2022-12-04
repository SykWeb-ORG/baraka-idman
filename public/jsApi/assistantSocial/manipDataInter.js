// Declaration 
const url = "http://127.0.0.1:8000/beneficiaires"
const divMessage = $('#message-alert');

// Functions
//--> Post user informations
function postDataBenefs() {
    const sexeVal = $('#sexe-benef').find('input:checked').val();
    $.ajax({
        type: "POST",
        url: url,
        async: false,
        data: {
            code : $('#code-benef').val(),
            prenom : $('#first-name-benef').val(),
            nom : $('#last-name-benef').val(),
            adresse : $('#adresse-benef').val(),
            sexe : sexeVal,
            cin : $('#cin-benef').val(),
            telephone : $('#phone-number-benef').val(),
            type_travail : $('#type-travail-benef').val(),
            intervenant_id : $('#intervenant-benef').val(),
            
        },
        dataType: "json",
        success: (response) => {
            divMessage.html(messageComponants("Utilisateur ajouter avec success", "success", "fa-check"));
            clearInputs();
        },
        error: (xhr, status, error) => {
            var err = JSON.parse(xhr.responseText);
            divMessage.html(messageComponants(err.message, "danger", "fa-times"));
        }
    })

}

//--> Vider les champs du formulaire
function clearInputs() {
    $('#code-benef').val("")
    $('#first-name-benef').val("")
    $('#last-name-benef').val("")
    $('#adresse-benef').val("")
    $('#cin-benef').val("")
    $('#phone-number-benef').val("")
    $('#type-travail-benef').val("")
    $('#intervenant-benef').val("")
}

//Events
//--> Submit Form
$( ".form-benefaicaire" ).submit(function( event ) {
    event.preventDefault();
    postDataBenefs();
}) 
