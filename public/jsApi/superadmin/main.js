const baseUrl = ""
function postData(endUrl) {
    $.ajax({
        type: "POST",
        url: baseUrl + endUrl,
        data: {

        },
        dataType: "json",
        success: (response) => {

        },
        error: (error) => {
            
        }
    })
}