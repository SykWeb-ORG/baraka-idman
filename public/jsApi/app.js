// Variables Declarations
var baseUrl = `http://${location.host}/`;

// GET a SUNCTUM CSRF
$(document).ready(function(){
  axios.get('/sanctum/csrf-cookie');
});

// GET Function with Axios
function getAllData(endUrl,fctOutput) {
    axios
      .get(baseUrl+endUrl, {
        timeout: 5000
      })
      .then(res => fctOutput(res.data))
      .catch(err => {
        if (err.response) {
            // Server responded with a status other than 200 range
            fctOutput(err.response.status)
          }
    });
}

// POST Function Axois
function addData(endUrl,dataObject,fctOutput) {
    axios
      .post(baseUrl+endUrl, dataObject)
      .then(res => fctOutput(res.data))
      .catch(err => {
        if (err.response) {
            // Server responded with a status other than 200 range
            fctOutput(err.response.status)
          }
    });
}

// PUT Function Axois 
function updateData(endUrl,dataObject,fctOutput) {
    axios
      .put(baseUrl+endUrl, dataObject)
      .then(res => fctOutput(res.data))
      .catch(err => {
        if (err.response) {
            // Server responded with a status other than 200 range
            fctOutput(err.response.status)
          }
    });
}

// DELETE Function Axois
function deleteData(endUrl,fctOutput) {
    axios
      .delete(baseUrl+endUrl)
      .then(res => fctOutput(res.data))
      .catch(err => {
        if (err.response) {
            // Server responded with a status other than 200 range
            fctOutput(err.response.status)
          }
    });
}