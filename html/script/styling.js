(function(){
  let root = location.protocol + '//' + location.host;
  let layout = JSON.parse(localStorage.getItem('layout'));
  // console.log(layout);
  let $leftSideInner = $('.leftSideInner');
  let $rightSideInner = $('.rightSideInner');
  let $qAnswer = $('.individualQuestions');
  let $textBoxes = $('#textBoxes')
  let $selectSubject = $('.selectSubject');
  let $a = $('a');
  let $aHover = $('a:hover');
  let $aVisited = $('a:visited');
  let $aActive = $('a:active');
  let $body = $('body');
  let $mainTitleBar = $('#mainTitleBar');
  let $leftInnerTitleBar = $('.leftInnerTitleBar');
  let $middleTitleBar = $('.middleTitleBar');
  let $rightTitleBar = $('.rightTitleBar');
  let $leftLowerSidebar = $('.leftLowerSidebar');
  let $mainBody = $('.mainbody');
  let $main = $('.main');
  let $rightLowerSidebar = $('.rightLowerSidebar');
  let $pagination = $('#pagination');
  let $heightHeader = $('.heightHeader');
  let $topBar = $('#topBar');
  let $copyright = $('.copyright');
  let $plus = $('.plus');
  // console.log(layout);

  if (typeof layout.writting != 'undefined') {
    let aArray = $a.toArray();
    aArray.forEach((element, index) => {
      // console.log(element);
      // console.log('here');
      element.style.color = layout.writting;

    });
    aArray = $aActive.toArray();
    aArray.forEach((element, index) => {
      // console.log(element);
      // console.log('here');
      element.style.color = layout.writting;

    });
    aArray = $aHover.toArray();
    aArray.forEach((element, index) => {
      // console.log(element);
      // console.log('here');
      element.style.color = layout.writting;

    });
    aArray = $aVisited.toArray();
    aArray.forEach((element, index) => {
      // console.log(element);
      // console.log('here');
      element.style.color = layout.writting;

    });

  }

  if (typeof layout.writting != 'undefined') {
    $body.css({'color': layout.writting, 'background-color': layout.mbc, 'height': '100%', 'margin': '0px', });


  }






  if (typeof layout.enableMovingBars != 'undefined') {
    if (layout.dmbpb == 0) {
      $mainTitleBar.css({'background-image': root + 'uploads/' + layout.mbp,
      'background-size': 'contain', 'background-repeat': 'no-repeat',});

      // console.log('one');
    } else {

      // console.log('two');

      $mainTitleBar.css({'width': layout.pombw + '%', 'height': layout.hobbip + 'px',
      'background-color': layout.tc, 'border-bottom': '3px solid ' + layout.mboc,
      'color': layout.tWritting, });
      // may cause a problem
      $mainTitleBar.attr('style', 'color: ' + layout.tWritting + ' !important');

    }




    if (layout.disableMovingBars == 0) {
      $leftLowerSidebar.eq(0).css({'background-color': layout.lBarc,  'width': layout.polsw + '%',});
      $mainTitleBar.css({'z-index': '0',});
      $mainTitleBar.attr('style', 'position: relative !important; z-index: 0 !important;');
      $main.eq(0).css({'width': (layout.pombw) + '%',  });

      $('#reply').attr('style', 'z-index: 0 !important;');
      $('#docu').attr('style', 'z-index: 0 !important;');
      $('#heightHeader').attr('style', 'z-index: 0 !important;');
      $rightLowerSidebar.eq(0).css({'background-color': layout.rSideColour, 'display': 'flex', 'width': layout.porsw + '%',});

      $heightHeader.eq(0).css({'height': '0' + 'px', 'width': '100%', 'background-color': layout.mbc,});
      
      // console.log('one');
      $topBar.css({ 'float': 'right', 'display': 'inline-block',});
    } else {
      $leftLowerSidebar.eq(0).css({'width': layout.polsw + '%', 'background-color': layout.lBarc,
      'position': 'fixed', 'left': '0', 'top': '0', 'z-index': '9', 'height': '100%', 'width': layout.polsw + '%',});
      $main.eq(0).css({'width': layout.pombw + '%', 'margin': '0 auto',});
      $mainTitleBar.css({'color': 'white', 'height': layout.hobbip, 'position': 'fixed', 'left': '0', 'right': '0',});
      $rightLowerSidebar.eq(0).css({'position': 'fixed','z-index': '9', 'right': '0', 'top': '0',
      'height': '100%', 'width': layout.porsw + '%', 'background-color': layout.rSideColour,});
      // console.log('two');
      $heightHeader.eq(0).css({'height': layout.hobbip + 'px', 'width': '100%', 'background-color': layout.mbc,});
      
    }

  }

  if (typeof layout.ecb != 'undefined') {


    if (layout.ecb == 1) {

      // insert switching mechinism here



      $leftInnerTitleBar.eq(0).css({'background-image': root + 'uploads/' + layout.cbp,
      'background-size': 'contain', 'background-repeat': 'no-repeat',});


    }

    if (layout.efhb == 1) {


      if (layout.els == 1) {
        $leftInnerTitleBar.eq(0).css({'background-color': layout.lBarc, 'border-bottom': '3px solid '
        + layout.lBarc,})
      } else {
        $leftInnerTitleBar.eq(0).css({'background-color': layout.lBarc, 'border-bottom': '3px solid ' +
        layout.mboc,})
      }


      if (layout.ers == 1) {
        $rightTitleBar.eq(0).css({'background-color': layout.rSideColour, 'border-bottom': '3px solid ' + layout.rSideColour,});
      } else {
        $rightTitleBar.eq(0).css({'background-color': layout.lBarc, 'border-bottom': '3px solid ' +
        layout.mboc,});

      }


    } else {
      $leftInnerTitleBar.eq(0).css({'background-color': layout.tc, 'border-bottom': '3px solid ' +
      layout.mboc,})
      $rightTitleBar.eq(0).css({'background-color': layout.tc, 'border-bottom': '3px solid ' +
      layout.mboc,});
    }


    $rightTitleBar.eq(0).css({ 'width': layout.porsw + '%', 'height': (layout.hobbip - 2) + 'px',});
    $leftInnerTitleBar.eq(0).css({ 'height': (layout.hobbip - 2) + 'px', 'width': layout.polsw + '%',});


  }

  if (typeof layout.polsw != 'undefined') {
    $mainBody.eq(0).css({'-webkit-box-sizing': 'border-box', '-moz-box-sizing': 'border-box',
    'box-sizing': 'border-box',});

    if (layout.enableBackgroundPicture == 1) {
      if ($qAnswer.length > 0) {

        $mainBody.eq(0).css({'background-image': 'url(' + root + '/uploads/' + layout.bpota + ')',
        'background-size': 'contain', 'background-repeat': 'no-repeat', 'color': layout.cotiqpg, 'background-color': layout.coqbr, });
      } else if ($selectSubject.length > 0) {
        $selectSubject.css({'background-image': 'url(' + root + '/uploads/' + layout.bposa + ')',
        'background-size': 'contain', 'background-repeat': 'no-repeat', 'color': layout.cotispb, 'background-color': layout.cospbb, });

      } else if ($leftSideInner.length > 0) {
        $mainBody.eq(0).css({'background-image': 'url(' + root + '/uploads/' + layout.bposa + ')',
        'background-size': 'contain', 'background-repeat': 'no-repeat',});
      }  else {
        $mainBody.eq(0).css({'background-image': 'url(' + root + '/uploads/' + layout.mabp + ')',
        'background-size': 'contain', 'background-repeat': 'no-repeat',});
      }
    }

    $pagination.css({'background-color': layout.mbc, });



    if (layout.dmbpb == 0) {
      $middleTitleBar.eq(0).css({'background-image': 'url(' + root + '/uploads/' + layout.mbp +')', 'background-size': 'contain', 'background-repeat': 'no-repeat',});

    }
    $middleTitleBar.eq(0).css({
      'width': layout.pombw + '%', 'height': (layout.hobbip - 2), 'background-color': layout.tc,
      'border-bottom': '3px solid ' + layout.mboc, 'color': layout.tWritting,
    });

    $textBoxes.attr('style', ' color: ' + layout.cotiib + ' !important; background-color: ' + layout.coib + '; border: 2px solid ' + layout.bc + '; width:' + layout.soibip + '% ; padding: 40px; border-radius: 75px;');
    
    $leftSideInner.eq(0).css({'width': layout.solipip + '%',});
    $rightSideInner.eq(0).css({'width': layout.soripip + '%'});
    $plus.attr('style', "color: "+layout.mbc+" !important")
  }



  $('html, body').css({'height': 'auto'});

  $copyright.eq(0).css({'background-color': layout.mbc, 'z-index': '12',});
  $(document).ready(function(){
    console.log('hereo');
    $body.toggle();

  });

}());

