$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
})

const baseUrl = "https://www.breakingbadapi.com/api/"
function getData(endUrl) {
    $.ajax({
        type: "GET",
        url: baseUrl + endUrl,
        dataType: "json",
        success: (response) => {
            var tbodyData = ""
            $.each(response, function (key, val) {
                tbodyData += `<tr>
                    <td>${val.name}</td>
                    <td>${val.name}</td>
                    <td>${val.name}</td>
                    <td>${val.name}</td>
                    <td>${val.name}</td>
                    <td>${val.name}</td>
                </tr>`
            });    
            $('#tablebenificiere tbody').html(tbodyData);
        }
    })
}

getData("characters")