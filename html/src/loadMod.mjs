
async function loadFromIndexedDB(storeName, id){
    return new Promise(
      await function(resolve, reject) {
        var dbRequest = indexedDB.open(storeName);
  
        dbRequest.onerror = function(event) {
          reject(Error("Error text"));
        }
  
        dbRequest.onupgradeneeded = function(event) {
          // Objectstore does not exist. Nothing to load
          event.target.transaction.abort();
          reject(Error('Not found'));
        }
  
        dbRequest.onsuccess = function(event) {
          var database      = event.target.result;
          var transaction   = database.transaction([storeName]);
          var objectStore   = transaction.objectStore(storeName);
          var objectRequest = objectStore.get(id);
  
          objectRequest.onerror = function(event) {
            reject(Error('Error text'));
          }
  
          objectRequest.onsuccess = function(event) {
            if (objectRequest.result) resolve(objectRequest.result);
            else reject(Error('object not found'));
          }
        }
      }
    )

  }
  export {loadFromIndexedDB};