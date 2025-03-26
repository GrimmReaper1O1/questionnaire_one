(function() {
  let ruview = 0;
  let ru = 0;
  var root = location.protocol + '//' + location.host;
console.log(rootU+admin+viewer);
let $divTopBar = $('#topBar');
let $divTopRight = $('<div>', { id: 'topRight'});
let $divMainButtonDiv = $('<div>', { id: 'mainButtonDiv'});

let $divInnerButton = $('<div>', { id: 'innerButtonDiv'});
$buttonMainMenu = $('<button>', {id: 'mainMenuButton'});
let $imgMenu = $('<img>', {id: 'mainMenuImage',
 });
 $imgMenu.attr('src', '/images/menu.png');
 $imgMenu.attr('width', '40px');
 $imgMenu.attr('height', '40px');


 $buttonMainMenu.append($imgMenu);
 $divInnerButton.append($buttonMainMenu);
 $divMainButtonDiv.append($divInnerButton);
 $divTopRight.append($divMainButtonDiv);
let $divMainMenuDiv = $('<div>', { id: 'mainMenuDiv' });
let $spanClasses = $('<span>', { id: 'classes'} ).text('Classes');
let $spanResults = $('<span>', { id: 'results' }).text('Results');
let $spanStudentsLibrary = $('<span>', { id: 'studentsLibrary'}).text('Students Library');
let $spanMathematics = $('<span>', { id: 'mathematics' }).text('Matematics');

let $spanAdmin = $('<span>', {id: 'admin'}).text('Admin');

let $divAdminMenu = $('<div>', { id: 'adminMenuDiv' });
let $spanAdminClasses = $('<span>', { id: 'adminClasses' }).text('Administer Classes');

let $divAdminClassesDiv = $('<div>', { id: 'adminClassesDiv' });

let $spanAdministerClasses = $('<span>', { id: 'administerClasses' }).text('Administrate Classes');
let $spanAdminLibrary = $('<span>', { id: 'adminLibrary' }).text('Admin Library');
let $spanCreateClass = $('<span>', { id: 'createClass' }).text('Create Class');
let $spanDeleteDocument = $('<span>', { id: 'deleteDocument' }).text('Delete Document');

let $spanSearchForStudents = $('<span>', { id: 'searchForStudents' }).text('Search For Students');
let $spanUploadToLibrary = $('<span>', { id: 'uploadToLibrary'}).text('Upload To Library');
if (admin == 1) {
$divAdminClassesDiv.append($spanAdministerClasses.append($('<br>')));
 $divAdminClassesDiv.append($spanAdminLibrary.append($('<br>')));
 $divAdminClassesDiv.append($spanCreateClass.append($('<br>')));
 $divAdminClassesDiv.append($spanDeleteDocument.append($('<br>')));
} 
if ((rootU == 1) || (viewer == 1)) {
 $divAdminClassesDiv.append($spanSearchForStudents.append($('<br>')));
 ruview = 1;
}
if (admin == 1) {
$divAdminClassesDiv.append($spanUploadToLibrary.append($('<br>')));
}


let $spanAdminPage = $('<span>', { id: 'adminPage'}).text('Administer Page');

let $divAdminPageDiv = $('<div>', { id: 'adminPageDiv'});

let $spanAlterStyle = $('<span>', { id: 'alterStyle'}).text('Alter Style');
let $spanCreateStyle = $('<span>', { id: 'createStyle'}).text('Create Style');

 $divAdminPageDiv.append($spanAlterStyle.append($('<br>')));
 $divAdminPageDiv.append($spanCreateStyle.append($('<br>')));
 
 
 let $spanAdminAdmins = $('<span>', { id: 'adminAdmins'}).text('Administer Administrators');

let $divAdministerAdminsDiv = $('<div>', { id: 'administerAdminsDiv'});

let $spanCreateAdminAccount = $('<span>', { id: 'createAdminAccount'}).text('Create Admin Account');

let $spanShowAdministrators = $('<span>', { id: 'showAdministrators'}).text('Show Administrators');

if (rootU == 1) {
$divAdministerAdminsDiv.append($spanCreateAdminAccount.append($('<br>')));
ru = 1;
}
$divAdministerAdminsDiv.append($spanShowAdministrators.append($('<br>')));


let $spanSettings = $('<span>', { id: 'settings'}).text('settings');
let $spanContactUs = $('<span>', { id: 'contactUs'}).text('contact us');
let $spanSignOut = $('<span>', { id: 'signOut'}).text('Sign Out!');
if ((rootU == 1) || (viewer == 1) || (admin == 1)) {

$divAdminMenu.append($spanAdminClasses).append($('<br>'));
}
$divAdminMenu.append($divAdminClassesDiv);
if (admin == 1) {
  $divAdminMenu.append($spanAdminPage).append($('<br>'));
}
$divAdminMenu.append($divAdminPageDiv);
$divAdminMenu.append($spanAdminAdmins.append($('<br>')));
$divAdminMenu.append($divAdministerAdminsDiv);





$divMainMenuDiv.append($spanClasses.append($('<br>')));
$divMainMenuDiv.append($spanResults).append($('<br>'));
$divMainMenuDiv.append($spanStudentsLibrary.append($('<br>')));
$divMainMenuDiv.append($spanMathematics.append($('<br>')));
if (admin == 1) {
$divMainMenuDiv.append($spanAdmin.append($('<br>')));
}
$divMainMenuDiv.append($divAdminMenu);
$divMainMenuDiv.append($spanSettings.append($('<br>')));
$divMainMenuDiv.append($spanContactUs.append($('<br>')));
$divMainMenuDiv.append($spanSignOut.append($('<br>')));

$divTopRight.append($divMainMenuDiv);
$divTopRight.append($divTopRight)
$divTopBar.append($divTopRight);




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
  $links[4] = $('#administerClasses');
  $links[5] = $('#adminLibrary');
  $links[6] = $('#createClass');
  $links[7] = $('#deleteDocument');
  $links[8] = $('#searchForStudents');
  $links[9] = $('#uploadToLibrary');
  $links[10] = $('#alterStyle');
  $links[11] = $('#createStyle');
  $links[12] = $('#createAdminAccount');
  $links[13] = $('#showAdministrators');
  $links[14] = $('#settings');
  $links[15] = $('#contactUs');
  $links[16] = $('#signOut');
  let href = [];
  href[0] =  '/classes.php?reset=yes';
  href[1] =  '/bioOne.php';
  href[2] =  '/library/library.php';
  href[3] =  '/enterMathematics.php';
  href[4] = '/admin/classes.php'
  href[5] =  '/admin/adminLibrary/adminLibrary.php?unset=yes';
  href[6] =  '/admin/userAdmin/create_new_class.php';
  href[7] =  '/admin/adminLibrary/delete_document.php?unset=yes';
  href[8] =  '/admin/userAdmin/search_via_email.php';
  href[9] =  '/admin/adminLibrary/upload_pdf.php';
  href[10] =  '/admin/chooseProfile.php';
  href[11] = '/admin/colourChangePage.php?reset=yes';
  href[12] = '/admin/userAdmin/createAdministrator.php';
  href[13] = '/admin/userAdmin/show_all_administrators.php';
  href[14] = '/changeInfo.php';
  href[15] = '/contactUs.php';
  href[16] = '/logout.php';
function clicker(the, nu, men, togs) {
  the[nu].click(function(e){
    e.preventDefault();
    if (togs[nu] == 0) {
      console.log('open');    // $mainMenuDiv.addClass('visible');
      men[nu].toggle(200, 'swing').animate({opacity: 1}, 200);
      console.log('close');
    } else {
      men[nu].animate({opacity: 0}, 200).toggle(200, 'swing');
      console.log('close');
    }
  });
}

  for (let i = 0; i < $menuSelectorArray.length; i++) {


      if ((admin == 1) && (i == 1)) {
      clicker($menuSelectorArray, i, $menuDivArray, toggles);

    } else if (ruview == 1 ) {
      clicker($menuSelectorArray, i, $menuDivArray, toggles);
    } else if (ru == 1) {
      clicker($menuSelectorArray, i, $menuDivArray, toggles);
    } else {
      clicker($menuSelectorArray, i, $menuDivArray, toggles);

    }







  
}
console.log($links.length);
  for (let i = 0; i < $links.length; i++) {
    if (typeof $links[i] != 'undefined') {
  
 
    
        $links[i].click(function(e){
          window.location.replace(root + href[i]);
        });
     
        


    };

  }
}())
