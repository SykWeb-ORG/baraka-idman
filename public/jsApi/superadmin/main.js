//const baseUrl = ""
$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
})

function postData() {
    debugger
    $.ajax({
        type: "POST",
        url: "/users",
        async: false,
        data: {
            first_name : $('#first-name-user').val(),
            last_name : $('#last-name-user').val(),
            cin : $('#cin-user').val(),
            phone_number : $('#adresse-user').val(),
            birthday_date : $('#phone-number-user').val(),
            email : $('#email-user').val(),
            role : $('#roles-user').val(),
        },
        dataType: "json",
        success: (response) => {
            console.log(response);
        },
        error: (error) => {
            console.log(error)
        }
    })

}
