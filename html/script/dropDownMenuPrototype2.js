(function() {


  var root = location.protocol + '//' + location.host;


  let $menuDivArray = [];

  $menuDivArray[0] = $('#mainMenuDiv')
  $menuDivArray[1] = $('#adminMenuDiv');
  $menuDivArray[2] = $('#adminClassesDiv');
  $menuDivArray[3] = $('#adminPageDiv');
  $menuDivArray[4] = $('#administerAdminsDiv');
  let $menuSelectorArray = [];
  $menuSelectorArray[0] = $('#mainMenuButton');
  $menuSelectorArray[1] = $('#admin');
  $menuSelectorArray[2] = $('#adminClasses');
  $menuSelectorArray[3] = $('#adminPage');
  $menuSelectorArray[4] = $('#adminAdmins');
  let toggles = [];
  toggles[0] = 0;
  toggles[1] = 0;
  toggles[2] = 0;
  toggles[3] = 0;
  toggles[4] = 0;
  let $links = [];
  $links[0] = $('#classes');
  $links[1] = $('#results');
  $links[2] = $('#studentsLibrary');
  $links[3] = $('#mathematics');
  $links[4] = $('#adminLibrary');
  $links[5] = $('#createClass');
  $links[6] = $('#deleteDocument');
  $links[7] = $('#searchForStudents');
  $links[8] = $('#uploadToLibrary');
  $links[9] = $('#alterStyle');
  $links[10] = $('#createStyle');
  $links[11] = $('#createAdminAccount');
  $links[12] = $('#showAdministrators');
  $links[13] = $('#settings');
  $links[14] = $('#contactUs');
  $links[15] = $('#administerClasses')
  let href = [];
  href[0] = '/classes.php?reset=yes';
  href[1] = '/bioOne.php';
  href[2] = '/library/library.php';
  href[3] = '/enterMathematics.php';
  href[4] = '/admin/adminLibrary/adminLibrary.php?unset=yes';
  href[5] = '/admin/userAdmin/create_new_class.php';
  href[6] = '/admin/adminLibrary/delete_document.php?unset=yes';
  href[7] = '/admin/userAdmin/search_via_email.php';
  href[8] = '/admin/adminLibrary/upload_pdf.php';
  href[9] = '/admin/chooseProfile.php';
  href[10] = '/admin/colourChangePage.php?reset=yes';
  href[11] = '/admin/userAdmin/createAdministrator.php';
  href[12] = '/admin/userAdmin/show_all_administrators.php';
  href[13] = '/changeInfo.php';
  href[14] = '/contactUs.php';
  href[15] = '/admin/classes.php'

  for (let i = 0; i < $menuSelectorArray.length; i++) {

    if (typeof $menuSelectorArray[i] != 'undefined') {
      $menuSelectorArray[i].click(function(e){
        e.preventDefault();

        if (toggles[0] == 0) {
          console.log('open');    // $mainMenuDiv.addClass('visible');
          $menuDivArray[i].toggle(200, 'swing').animate({opacity: 1}, 200);
          console.log('close');
        } else {
          $menuDivArray[i].animate({opacity: 0}, 200).toggle(200, 'swing');
          console.log('close');
        }
      });

    }

  }

  for (let i = 0; i < $links.length; i++) {
    if (typeof $links[i] != 'undefined') {
      $links[i].click(function(e){
        window.location.replace(root + href[i]);
      });
    };
  }

}())
