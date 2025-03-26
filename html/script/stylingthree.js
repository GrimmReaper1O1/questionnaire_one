(function(){
let root = location.protocol + '//' + location.host;
let layout = JSON.parse(localStorage.getItem('layout'));
console.log(layout);
let $a = $('a');
let $aHover = $('a:hover');
let $aVisited = $('a:visited');
let $aActive = $('a:active');
let $body = $('body');
let $mainTitleBar = $('.mainTitleBar');
let $leftInnerTitleBar = $('.leftInnerTitleBar');
let $middleTitleBar = $('.middleTitleBar');
let $rightTitleBar = $('.rightTitleBar');
let $leftLowerSidebar = $('.leftLowerSidebar');
let $mainBody = $('.mainbody');
let $main = $('.main');
let $rightLowerSidebar = $('.rightLowerSidebar');
let $pagination = $('.pagination');
let $heightHeader = $('.heightHeader');
let $topBar = $('#topBar');
console.log($a);
if (typeof layout.writting != 'undefined') {
  let aArray = $a.toArray();
  aArray.forEach((element, index) => {
    console.log(element);
    console.log('here');
  element.style.color = layout.writting;

});
aArray = $aActive.toArray();
aArray.forEach((element, index) => {
  console.log(element);
  console.log('here');
element.style.color = 'white';

});
aArray = $aHover.toArray();
aArray.forEach((element, index) => {
  console.log(element);
  console.log('here');
element.style.color = 'white';

});
aArray = $aVisited.toArray();
aArray.forEach((element, index) => {
  console.log(element);
  console.log('here');
element.style.color = 'white';

});

} else {
let   aArray = $aActive.toArray();
  aArray.forEach((element, index) => {
    console.log(element);
    console.log('here');
  element.style.color = 'white';

});

aArray = $a.toArray();
aArray.forEach((element, index) => {
  console.log(element);
  console.log('here');
element.style.color = 'white';

});
aArray = $aHover.toArray();
aArray.forEach((element, index) => {
  console.log(element);
  console.log('here');
element.style.color = 'white';

});
aArray = $aVisited.toArray();
aArray.forEach((element, index) => {
  console.log(element);
  console.log('here');
element.style.color = 'white';

});
}
if (typeof layout.writting != 'undefined') {
  $body.css({'color': layout.writting, 'background-color': layout.mbc, 'height': '100%', 'margin': '0px', })


} else {
  $body.css({'color': 'white', 'background-color': 'blue', 'height': '100%', 'margin': '0px',})


}






if (typeof layout.enableMovingBars != 'undefined') {
if (layout == 0) {
$mainTitleBar.eq(0).css({'background-image': root + 'uploads/' + layout.mbp,
'background-size': 'contain', 'background-repeat': 'no-repeat',});


} else {



$mainTitleBar.eq(0).css({'width': layout.pombw + '%', 'height': layout.hobbip + 'px',
'background-color': layout.tc, 'border-bottom': '3px solid ' + layout.mboc,
'color': layout.tWritting, });
// may cause a problem
$mainTitleBar.eq(0).attr('style', 'color: ' + layout.tWritting + ' !important');

}





if (layout.disableMovingBars == 1) {
$leftLowerSidebar.eq(0).css({'width': layout.polsw + '%', 'background-color': layout.lBarc,
'position': 'fixed', 'left': '0', 'top': '0', 'z-index': '9', 'height': '100%', 'width': layout.polsw + '%',});
$main.eq(0).css({'width': layout.pombw + '%', 'margin': '0 auto',});


$rightLowerSidebar.eq(0).css({'position': 'fixed','z-index': '9', 'right': '0', 'top': '0',
'height': '100%', 'width': layout.porsw + '%', 'background-color': layout.mboc,});
console.log('one');
// $topBar.css({})

} else {
  $leftLowerSidebar.eq(0).css({'background-color': layout.lBarc, 'display': 'flex', 'overflow': 'auto', 'width': layout.polsw + '%',});
  $main.eq(0).css({'width': (layout.pombw) + '%',  });
  $rightLowerSidebar.eq(0).css({'background-color': layout.rSideColour, 'display': 'flex', 'overflow': 'auto',  'width': layout.porsw + '%',});
  $topBar.css({'position': 'absolute',});

console.log('two');
}

} else {
$mainTitleBar.eq(0).css({'color': 'white', 'height': '60px',});
$main.eq(0).css({ 'width': '86%', 'margin': '0 auto',});
$rightLowerSidebar.eq(0).css({'position': 'fixed', 'right': '0', 'top': '0', 'z-index': '9',
'height': '100%',});
$leftLowerSidebar.eq(0).css({'width': '7' + '%', 'background-color': 'black',});

console.log('three');
}

if (typeof layout.ecb != 'undefined') {


  if (layout.ecb == 1) {

    // insert switching mechinism here



    $leftInnerTitleBar.eq(0).css({'background-image': root + 'uploads/' + layout.cbp,
  'background-size': 'contain', 'background-repeat': 'no-repeat',});


  }

  if (layout.efhb == 1) {


    if (layout.els == 1) {
$leftInnerTitleBar.eq(0).css({'background-color': layout.lbarc, 'border-bottom': '3px solid '
+ layout.lBarc,})
    } else {
$leftInnerTitleBar.eq(0).css({'background-color': layout.tc, 'border-bottom': '3px solid ' +
 layout.lBarc,})
    }


if (layout.ers == 1) {
  $rightTitleBar.eq(0).css({'background-color': layout.lBarc, 'border-bottom': '3px solid ' + layout.rsideColour,});
} else {
  $rightTitleBar.eq(0).css({'background-color': layout.tc, 'border-bottom': '3px solid ' +
  layout.mboc,});

}
  $rightTitleBar.eq(0).css({'background-color': layout.tc, 'border-bottom': '3px solid ' +
  layout.mboc,});


} else {
$leftInnerTitleBar.eq(0).css({'background-color': layout.tc, 'border-bottom': '3px solid ' +
layout.mboc,})
$rightTitleBar.eq(0).css({'background-color': layout.tc, 'border-bottom': '3px solid ' +
 layout.mboc,});
}


  $rightTitleBar.eq(0).css({'border-bottom': '3px solid ' + layout.mboc, 'width': layout.porsw + '%', 'height': (layout.hobbip - 2) + 'px',});
  $leftInnerTitleBar.eq(0).css({'border-bottom': '3px solid ' + layout.lBarc, 'height': (layout.hobbip - 2) + 'px', 'width': layout.polsw + '%',});


} else {
  $leftInnerTitleBar.eq(0).css({'background-color': 'blue',});
  $rightTitleBar.eq(0).css({'background-color': 'blue',});
}

if (typeof layout.polsw != 'undefined') {
$mainBody.eq(0).css({'-webkit-box-sizing': 'border-box', '-moz-box-sizing': 'border-box',
'box-sizing': 'border-box',});

if (layout.enableBackgroundPicture == 1) {
  $mainBody.eq(0).css({'background-image': 'url(' + root + '/uploads/' + layout.mabp + ')',
 'background-size': 'contain', 'background-repeat': 'no-repeat',});
}


$pagination.eq(0).css({'width': layout.pombw + '%', 'background-color': layout.mbc, });
$heightHeader.eq(0).css({'height': layout.hobbip + 'px', 'width': '100%'});


if (layout.dmbpb == 0) {
  $middleTitleBar.eq(0).css({'background-image': 'url(' + root + '/uploads/' + layout.mbp +')', 'background-size': 'contain', 'background-repeat': 'no-repeat',});

}
$middleTitleBar.eq(0).css({
  'width': layout.pombw + '%', 'height': (layout.hobbip - 2), 'background-color': layout.tc,
  'border-bottom': '3px solid ' + layout.mboc, 'color': layout.tWritting,
});

console.log("i'm doing all this shit");




} else {
  $pagination.eq(0).css({'width': '86%', 'background-color': 'blue', })
  $heightHeader.eq(0).css({'height': '60px', 'width': '100%'});
  $middleTitleBar.eq(0).css({
    'width': '86%', 'height': '28', 'background-color': 'blue',
    'border-bottom': '3px solid black', 'color': 'white',
  });

}




}());
