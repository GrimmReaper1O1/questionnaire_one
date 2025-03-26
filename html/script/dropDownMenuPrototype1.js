(function() {
  
  let $mainMenuButton = $('#mainMenuButton');
  let $mainMenuDiv = $('#mainMenuDiv')
  let $adminMenuDiv = $('#adminMenuDiv');
  let $adminClassesDiv = $('#adminClassesDiv');
  let $adminPageDiv = $('#adminPageDiv');
  let $administerAdminsDiv = $('#administerAdminsDiv');
  let $admin = $('#admin');
  let $adminClasses = $('#adminClasses');
    let $administerClasses = $('#administerClasses');
  let $adminPage = $('#adminPage');
  let $adminAdmins = $('#adminAdmins');
  let tMMB = 0;
  let tAMD = 0;
  let tACD = 0;
  let tAPD = 0;
  let tAAD = 0;
  let $classes = $('#classes');
  let $results = $('#results');
  let $studentsLibrary = $('#studentsLibrary');
  let $mathematics = $('#mathematics');
  let $adminLibrary = $('#adminLibrary');
  let $createClass = $('#createClass');
  let $deleteDocument = $('#deleteDocument');
  let $searchForStudents = $('#searchForStudents');
  let $uploadToLibrary = $('#uploadToLibrary');
  let $alterStyle = $('#alterStyle');
  let $createStyle = $('#createStyle');
  let $createAdminAccount = $('#createAdminAccount');
  let $showAdministrators = $('#showAdministrators');
  let $settings = $('#settings');
  let $contactUs = $('#contactUs');
console.log($menuDivArray);


  $mainMenuButton.click(function(e){
    e.preventDefault();
    console.log(tMMB);
    if (tMMB == 0) {
      // $mainMenuDiv.addClass('visible');
      $mainMenuDiv.toggle(200, 'swing').animate({opacity: 1}, 200);
    console.log($mainMenuDiv);
      console.log('here');
    } else {
      $mainMenuDiv.animate({opacity: 0}, 200).toggle(200, 'swing');
    }


  });
  $admin.click(function(e){
    e.preventDefault();
    console.log(tMMB);
    if (tAMD == 0) {
      // $mainMenuDiv.addClass('visible');
      $adminMenuDiv.toggle(200, 'swing').animate({opacity: 1}, 200);
    console.log($mainMenuDiv);
      console.log('here');
    } else {
      $adminMenuDiv.animate({opacity: 0}, 200).toggle(200, 'swing');
    }


  });

  $adminClasses.click(function(e){
    e.preventDefault();
    console.log(tMMB);
    if (tACD == 0) {
      // $mainMenuDiv.addClass('visible');
      $adminClassesDiv.toggle(200, 'swing').animate({opacity: 1}, 200);
    console.log($mainMenuDiv);
      console.log('here');
    } else {
      $adminClassesDiv.animate({opacity: 0}, 200).toggle(200, 'swing');
    }


  });

  $adminPage.click(function(e){
    e.preventDefault();
    console.log(tMMB);
    if (tAPD == 0) {
      // $mainMenuDiv.addClass('visible');
      $adminPageDiv.toggle(200, 'swing').animate({opacity: 1}, 200);
    console.log($mainMenuDiv);
      console.log('here');
    } else {
      $adminPageDiv.animate({opacity: 0}, 200).toggle(200, 'swing');
    }


  });

  $adminAdmins.click(function(e){
    e.preventDefault();
    console.log(tMMB);
    if (tAAD == 0) {
      // $mainMenuDiv.addClass('visible');
      $administerAdminsDiv.toggle(200, 'swing').animate({opacity: 1}, 200);
    console.log($mainMenuDiv);
      console.log('here');
    } else {
      $administerAdminsDiv.animate({opacity: 0}, 200).toggle(200, 'swing');
    }


  });

  $classes.click(function(e){
    window.location.replace('./classes.php?reset=yes');
  });
  $results.click(function(e){
    window.location.replace('./bioOne.php');
  });
  $studentsLibrary.click(function(e){
    window.location.replace('./library/library.php');
  });
  $mathematics.click(function(e){
    window.location.replace('./enterMathematics.php');
  });
  $adminLibrary.click(function(e){
    window.location.replace('./admin/adminLibrary/adminLibrary.php?unset=yes');
  });
  $administerClasses.click(function(e){
    window.location.replace('./admin/classes.php');
  });
  $adminLibrary.click(function(e){
    window.location.replace('./admin/adminLibrary/adminLibrary.php?unset=yes');
  });
  $createClass.click(function(e){
    window.location.replace('./admin/userAdmin/create_new_class.php');
  });
  $deleteDocument.click(function(e){
    window.location.replace('./admin/adminLibrary/delete_document.php?unset=yes');
  });
  $searchForStudents.click(function(e){
    window.location.replace('./admin/userAdmin/search_via_email.php');
  });
  $uploadToLibrary.click(function(e){
    window.location.replace('./admin/adminLibrary/upload_pdf.php');
  });
  $alterStyle.click(function(e){
    window.location.replace('./admin/chooseProfile.php');
  });
  $createStyle.click(function(e){
    window.location.replace('./admin/colourChangePage.php?reset=yes');
  });
  $createAdminAccount.click(function(e){
    window.location.replace('./admin/userAdmin/createAdministrator.php');
  });
  $showAdministrators.click(function(e){
    window.location.replace('./admin/userAdmin/show_all_administrators.php');
  });
  $settings.click(function(e){
    window.location.replace('./changeInfo.php');
  });
  $contactUs.click(function(e){
    window.location.replace('./contactUs.php');
  });








}())
