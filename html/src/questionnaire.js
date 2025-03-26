
"strict mode"
// document.addEventListener('DOMContentLoaded', function() {
   





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

   
    if (runOrNot == 1) {
               
            
            

            var numeral;

            if (arr.hasOwnProperty('info')) {

                

                // //console.log(arr['runs']-1);

            //console.log(arr.length);
                let counter = 0;
                for (let i = 0 ; i < arry.length; i++ ) {
                
           
                    if (arr['runs'] < arr['maxNumeral'][i] + 1) {
                        numeral = 'a' + i;

                        arry[numeral][arr['runs']-1] = arr['info'][counter];
                        
                        counter++
                    } else {
                        counter++
                    }
                }

            } 
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
var functionObj = {};
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
      
}
if (runOrNot == 0) {
 
 if (localStorage.hasOwnProperty('obj'+pg)) {
    var arry = JSON.parse(localStorage.getItem('obj'+pg));
    
    } 
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
                    }
            } 
        }
    }

  

}





//   }
// ) ;
 




var addRequest = window.indexedDB.open("MyDatabase", 1);
let data = arry;
// var addRequest = storagePlace.add(data);

addRequest.onsuccess = function(event) {
    let db = event.target.result;
  let data = arry;
  let transaction = db.transaction("MyObjectStore", "readwrite");
  let objectStore = transaction.objectStore("MyObjectStore");
  let addRequest = objectStore.put(data, 1);
    addRequest.onsuccess = function(event) {
  //console.log('success in put')
        // Data added successfully
  };
};

addRequest.onerror = function(event) {

}

