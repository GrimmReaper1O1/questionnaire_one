/* Script written by Adam Khoury @ DevelopPHP.com */
// utilized a tutorial

function _(el) {
    return document.getElementById(el);
  }
  
  function uploadFile() {

    var file = _("file").files[0];
   
    var alt = document.getElementById('alt').value;
    if ((file.type == 'audio/mpeg') && (((file.size / 1024) / 1024) < 100)) {
    // alert(file.name+" | "+file.size+" | "+file.type);
    var formdata = new FormData();
    formdata.append("file", file);
    formdata.append("alt", alt);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", "audioParser.php"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
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
	_("progressBar").value = 0;//wil clear progress bar after successful upload
   
  if (event != 'error') {
   
    window.location.replace('uploadAudio.php?success=yes'); 
  }
  }
  
  function errorHandler(event) {
    _("status").innerHTML = "Upload Failed. Please try again and ensure the file is a mp3 file and is less than 100 MB.";
  }
  
  function abortHandler(event) {
    _("status").innerHTML = "Upload Aborted";
  }

