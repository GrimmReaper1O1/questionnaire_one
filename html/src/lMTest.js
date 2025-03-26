
async function loadFromIndexedDB(storeName, id, database){
    return new Promise(
      function(resolve, reject) {
        var dbRequest = indexedDB.open(database);
  
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


  function h4 (text) {
    var elemented = "<h4>" + text + "</h4>";
    return elemented;
  }
  function paragraph(text) {
    var para = "<p>"+text+"</p>";
    para.textContent = text;
    return para;
  }
  function paragraphs(text) {
  var paragraphs = text.split(/\r\r|\r\n/);
  
  var htmlParagraphs = [];
  
  paragraphs.forEach(function(paragraphText) {
    paragraphText = paragraphText.trim();
  
    var htmlParagraph = "<p>" + paragraphText + "</p>";
  
    htmlParagraphs.push(htmlParagraph);
  });
  
  var htmlOutput = htmlParagraphs.join("");
  
    
    return htmlOutput;
  }
  
  
  function countValues(obj) {
    let count = 0;
    
    for (let key in obj) {
      
        count++;
      }
    
    return count;
  }
  
     
      function runOne (arr, arry) {
                 
              
              
  
            
              if (arry.hasOwnProperty('numeral')) {
              arry['numeral'] = arr['numeral'];
              arry['numberOfRem'] = arr['numberOfRem'];
  
              } else {
                  arry['numeral'] = {};
                  arry['numberOfRem'] = {};
              }
              
                  //  //console.log(arry); 
         if (arry.hasOwnProperty('qr')) {
          var qr = arry['qr'];
          } else {
          var qr = {};
          for (var i = 0 ; i < arr.length ; i++ ) {
          qr['a'+i] = 0;
          }
          }
          
            document.addEventListener("DOMContentLoaded", function() {
          const radioGroup = {}
          for (var i = 0 ; i < arry.length ; i++) {
          radioGroup[i] = { 
              init: function() {
                  const radioButtons = document.querySelectorAll('.r'+i+'adio-button');
          
                  radioButtons.forEach(function(radioButton) {
                      radioButton.addEventListener('click', function() {
                          // Disable all other radio buttons
                          radioButtons.forEach(function(rb) {
                              if (rb !== radioButton) {
                                  rb.disabled = true;
                              }
                          });
                      });
                  });
              },
          }
          radioGroup[i].init()
      }
  
      })
  
  
  //console.log(arry);
  //console.log(arr.numeral)
   var text = '';
  var newtext = '';
  var finalText = '';
  
  for (let i = 0 ; i < arr.length ; i++) {
      // sessionStorage.setItem('correct' + i, arry['a' + i][arr['numeral'][i]]['correct']);
    var div1 = document.getElementById('a'+i); 
      if (arry) {
          //console.log(arry);
          //console.log(arr);
      }       var key = {}
              key[i] = 'a' + i;
              //console.log(key);
              //console.log(qr);
      if (arry['numberOfRem']-1 >= qr[key[i]]) {
   
  
          text = arry['a' + i][arr['numeral'][i]]['question']; // not defined on the fifth
   newtext = paragraphs(text);
    
  
  
      
      finalText = "Question: " + newtext;
      
      for (let c = 1 ; c < 9 ; c++) {
  
  
  
         
  
  
  var keyzero = {}
      keyzero[c] = 'pa' + c;
  if (arry['a' + i][arr['numeral'][i]][keyzero[c]] != 'empty') {
  
      
      var text = arry['a' + i][arr['numeral'][i]][keyzero[c]];
  
   newtext = paragraphs(text);
  
  finalText += '<input type="radio" name="' + i + 'a' + c + '" class="r'+i+'adio-button" onclick="radioGroup['+i+']">' + "Answer: " + newtext;
  var keyone = {}
              keyone[c] = 'hint' + c;
  if (arry['a' + i][arr['numeral'][i]][keyone[c]] != 'empty') {
  
      
      text = arry['a' + i ][arr['numeral'][i]][keyone[c]];
  
   newtext = paragraphs(text);
  
  finalText += "Hint: " + newtext;
                      }
  
                  }
              }
          } else {
              div1.innerHTML += "QUESTION COMPLETE!";
  
          }
          div1.innerHTML += finalText;
      }
        return arry;
  }
  function runTwo (arry, posted) {
   
    if (arry.hasOwnProperty('qr')) {
      var qr = arry['qr'];
      } else {
      var qr = {};
      for (var i = 0 ; i < arry.length ; i++ ) {
      qr['a'+i] = 0;
      }
      }      
  var replyDiv = document.getElementById('reply');
  var qn = {}
  for (var i = 0 ; i < arry.length; i++ ) {
      
      for (var c = 1 ; c < 9 ; c++ ) {
         if (posted[i+'a'+c] === 'on') {
             qn = i;     
      }
  }
  for (var c = 1 ; c < 9 ; c++ ) {
  

          if (posted[i+'a'+c] == 'on') {
  var text1 = arry['a' + i][arry['numeral'][i]]['question'];
  var text2 = arry['a' + i][arry['numeral'][i]]['answ' + c];
  var text3 = arry['a' + i][arry['numeral'][i]]['hint' + c];
  var breakLine = '<br><br>';
  
  replyDiv.innerHTML += breakLine;
 
 var finalText = '<div style="background-color: white;  border-radius: 75px; border: 5px solid black; padding: 50px; margin: auto auto;" >' +
  'Question: <br>' + paragraphs(text1) + "Reply: <br>" + paragraphs(text2);

   //console.log(posted);
  
  
  if (arry['a' + i][arry['numeral'][i]]['hint' + i] != 'empty') {

      finalText += "Hint give: <br>" + paragraphs(text3) + '</div>';
  
              } else {
                  finalText += '</div>';

              }
              //console.log(posted[i+'a'+c]);
              //console.log(arry);
      replyDiv.innerHTML += finalText;
   
      if (arry['a' + qn][arry['numeral'][i]]['correct'] === 'answ'+ c && posted[i+'a'+c] === 'on' ) {	
          qr['a' + qn]++;		// goes above
          console.log('here');
                  }
          } 
      }
  }
  return arry;
  }
  function saveToIndexedDB(storeName, object, key, databaseName, version){
    return new Promise(
      function(resolve, reject) {
        if (object.id === undefined) reject(Error('object has no id.'));
        var dbRequest = indexedDB.open(databaseName, version);
  
        dbRequest.onerror = function(event) {
          reject(Error("IndexedDB database error"));
        };
  
        dbRequest.onupgradeneeded = function(event) {
          var database    = event.target.result;
          var objectStore = database.createObjectStore(storeName, {autoincrement: true});
        };
  
        dbRequest.onsuccess = function(event) {
          var database      = event.target.result;
          var transaction   = database.transaction([storeName], 'readwrite');
          var objectStore   = transaction.objectStore(storeName);
          var objectRequest = objectStore.put(object, key); // Overwrite if exists
  
          objectRequest.onerror = function(event) {
            reject(Error('Error text'));
          };
  
          objectRequest.onsuccess = function(event) {
            resolve('Data saved OK');
          };
        };
      }
    );
  };

  function openDB(storeName, databaseName){
        var dbRequest = indexedDB.open(databaseName);
  
        dbRequest.onupgradeneeded = function(event) {
          var database    = event.target.result;
          var objectStore = database.createObjectStore(storeName, {autoincrement: true});
          alert('created');
        };
  
        dbRequest.onsuccess = function(event) {
        }
  
        dbRequest.onerror = function(event) {
            reject(Error('Error text'));
          };
  
        };
  export {loadFromIndexedDB, saveToIndexedDB, openDB, runTwo, runOne};