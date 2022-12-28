// Declaration 
const endUrl = "beneficiaires";
const divMessage = $('#message-alert');
const sexeVal = $('#sexe-benef').find('input:checked').val();
const dataBenefs = {
    code : $('#code-benef').val(),
    prenom : $('#first-name-benef').val(),
    nom : $('#last-name-benef').val(),
    adresse : $('#adresse-benef').val(),
    sexe : sexeVal,
    cin : $('#cin-benef').val(),
    telephone : $('#phone-number-benef').val(),
    type_travail : $('#type-travail-benef').val(),
    intervenant_id : $('#intervenant-benef').val(),
}

//Events
//--> Submit Form
$( ".form-benefaicaire" ).submit(function( event ) {
    event.preventDefault();
    if(is_add_btn) {
        addData(endUrl, dataBenefs, showOutput)
    }
    else {
        updateData(endUrl, dataBenefs, showOutput)
    }
}) 

// Functions
function showOutput(res) {
    // divMessage.html(messageComponants("Utilisateur ajouter avec success", "success", "fa-check"));
    // clearInputs();
    // divMessage.html(messageComponants(err.message, "danger", "fa-times"));
    console.log(res);
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
