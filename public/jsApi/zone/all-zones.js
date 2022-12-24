// Variables 
const endUrl = "zones";

// Eventes
$(document).ready(function(){
    getAllData(endUrl,showOutput)

    const dataZone = {
      zone_nom: "ZONE 4"
    }
    $('#add-btn').on('click', function() {
      deleteData(endUrl, showOutput)
    });
})

// Functions
function showOutput(res) {
    console.log(res);
}