/* Script written by Adam Khoury @ DevelopPHP.com */
// utilized a tutorial

function _(el) {
    return document.getElementById(el);
  }
  
  function uploadFile() {
let types = ['image/jpeg', 'image/gif', 'image/png',];
    var file = _("file").files[0];
    
    var alt = _('alt').value;
    var floatNum = _('floatNum').value;
    if ((types.includes(file.type)) && (((file.size / 1024) / 1024) < 3) && (floatNum != '')) {
    // alert(file.name+" | "+file.size+" | "+file.type);
    var formdata = new FormData();
    formdata.append("file", file);
    formdata.append("floatNum", floatNum);
    formdata.append("alt", alt);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", "apendixParser.php"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
    //use file_upload_parser.php from above url
    ajax.send(formdata);
  } else {
    errorHandler('Bad size or type.');
  }
  
}

function progressHandler(event) {
  _("loaded").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
  var percent = (event.loaded / event.total) * 100;
  _("progressBar").value = Math.round(percent);
  _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
}

function completeHandler(event) {
  _("status").innerHTML = event.target.responseText;
	_("progressBar").value = 0;
  if (event != 'error') {
    window.location.replace('uploadApendix.php?success=yes'); //wil clear progress bar after successful upload
  }
  }
  
  function errorHandler(event) {
    _("status").innerHTML = "Upload Failed. Failed, please ensure file is a jpg, gif, or png and no greater than 3 MB. The position number must also be filled.";
  }
  
  function abortHandler(event) {
    _("status").innerHTML = "Upload Aborted";
  }

