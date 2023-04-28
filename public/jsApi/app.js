// Variables Declarations
var baseUrl = `http://${location.host}/`;

// GET a SUNCTUM CSRF
$(document).ready(function(){
  axios.get('/sanctum/csrf-cookie');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
});

// GET Function with Axios
function getAllData(endUrl,fctOutput, dataObject = {}) {
    axios
      .get(baseUrl+endUrl, {
        // timeout: 5000,
        params:dataObject,
      })
      .then(res => fctOutput(res.data, dataObject))
      .catch(err => {
        console.log(err);
        fctOutput(err.response.data);
    });
}

// POST Function Axois
function addData(endUrl,dataObject,fctOutput) {
    axios
      .post(baseUrl+endUrl, dataObject)
      .then(res => fctOutput(res.data, dataObject))
      .catch(err => {
        fctOutput(err.response.data);
    });
}

// PUT Function Axois 
function updateData(endUrl,dataObject,fctOutput) {
    axios
      .put(baseUrl+endUrl, dataObject)
      .then(res => fctOutput(res.data))
      .catch(err => {
        fctOutput(err.response.data);
    });
}

// DELETE Function Axois
function deleteData(endUrl,fctOutput) {
    axios
      .delete(baseUrl+endUrl)
      .then(res => fctOutput(res.data))
      .catch(err => {
        fctOutput(err.response.data);
    });
}

// To upload files with Axois
function uploading(endUrl, dataObject, fctOutput) {
  axios({
    method: 'post',
    url: baseUrl + endUrl,
    data: dataObject,
  })
    .then(res => fctOutput(res.data))
    .catch(err => {
      fctOutput(err.response.data);
    });
}
// GET Function with Axios (For Dashboard)
function getAllDataForDashboard(endUrl, dataObject) {
  try {
    let nbBeneficiairesObject = null;
    $.ajax({
      type: "get",
      url: baseUrl + endUrl,
      data: dataObject,
      async:false,
      success: function (response) {
        nbBeneficiairesObject = response
      },
      error: function (error) {
        console.log(error);
      },
    });
    return nbBeneficiairesObject;
  } catch (error) {
    console.log(error);
  }
}
const checkOnlineStatus = async () => {
  try {
    const online = await fetch(`/img/testimonial-1.jpg`);
    return online.status >= 200 && online.status < 300; // either true or false
  } catch (err) {
    return false; // definitely offline
  }
};
setInterval(async () => {
  const result = await checkOnlineStatus();
  if (result) {
    // open "baraka_idman" database with the version 1
    request = indexedDB.open("baraka_idman", 1);
    // handle the error event
    request.onerror = (event) => {
      console.error(`Database error: ${event.target.errorCode}`);
    };
    // create beneficiaires object store (called only one time, when the first connection with the DB)
    request.onupgradeneeded = (event) => {
      let db = event.target.result;
      // create "beneficiaires" object store with auto-increment id (As beneficiaires table)
      let beneficiaires_table = db.createObjectStore('beneficiaires', {
        autoIncrement: true,
      });
    };
    // handle the success event
    request.onsuccess = (event) => {
      db = event.target.result;
      getAllBeneficiaires();
    };
  }
}, 3000); // probably too often, try 30000 for every 30 seconds
