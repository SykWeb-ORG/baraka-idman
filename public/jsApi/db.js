var request = null;
var db = null;
(function () {
    // check for IndexedDB support
    if (!window.indexedDB) {
        console.log(`Your browser doesn't support IndexedDB`);
        return;
    }
})();
function insertBeneficiaire(beneficiaire) {
    // create a new transaction
    const txn = db.transaction('beneficiaires', 'readwrite');
    // get beneficiaires object store
    const store = txn.objectStore('beneficiaires');
    // add new beneficiaires
    let query = store.put(beneficiaire);
    // handle success case
    query.onsuccess = function (event) {
        console.log(event);
    };
    // handle the error case
    query.onerror = function (event) {
        console.log(event.target.errorCode);
    }
    // close the database once the transaction completes
    txn.oncomplete = function () {
        db.close();
    };
}
function getBeneficiaireById(id) {
    const txn = db.transaction('beneficiaires', 'readonly');
    const store = txn.objectStore('beneficiaires');
    let query = store.get(id);
    query.onsuccess = (event) => {
        if (!event.target.result) {
            console.log(`The contact with ${id} not found`);
        } else {
            console.table(event.target.result);
        }
    };
    query.onerror = (event) => {
        console.log(event.target.errorCode);
    }
    txn.oncomplete = function () {
        db.close();
    };
};
function getAllBeneficiaires() {
    const txn = db.transaction('beneficiaires', "readonly");
    const objectStore = txn.objectStore('beneficiaires');
    objectStore.openCursor().onsuccess = (event) => {
        let beneficiaires = event.target.result;
        if (beneficiaires) {
            do {
                let beneficiaire = beneficiaires.value;
                beneficiaire["key"] = beneficiaires.key;
                addData("beneficiaires", beneficiaire, (data, jsBenefaicaire) => {
                    deleteBeneficiaire(jsBenefaicaire.key);
                });
                console.log(beneficiaire);
            } while (beneficiaires.continue()); // continue next record
        }
    };
    // close the database connection
    txn.oncomplete = function () {
        db.close();
    };
}
function deleteBeneficiaire(id) {
    // create a new transaction
    const txn = db.transaction('beneficiaires', 'readwrite');
    // get beneficiaires object store
    const store = txn.objectStore('beneficiaires');
    // delete beneficiaire
    let query = store.delete(id);
    // handle the success case
    query.onsuccess = function (event) {
        console.log(event);
    };
    // handle the error case
    query.onerror = function (event) {
        console.log(event.target.errorCode);
    }
    // close the database once the transaction completes
    txn.oncomplete = function () {
        db.close();
    };
}
