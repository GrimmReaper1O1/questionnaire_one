(function(){

  let $body = $('body');
  let $div = $('<div>');
  let $images = $('.apendix');
  let $imageDiv = $('#imageDiv');
  let $imgInnerDiv = $('#placement');
  let height = $(document).height();
  let width = $(document).width();
  let $left = $('#left');
  let $right = $('#right');
  var id;
  let $centerDiv = $('#cDiv');
  $imageDiv.css({'height': '100%', 'width': '80%',});


  let leftPos = ((width - 700) / 2)
  $imageDiv.css({'left': '10%',})

  $images.each(function(i){
    $(this).click(function(){
      let $image = $(this).clone()
      $image.css({'object-fit': 'contain',});
      $imgInnerDiv.html($image);
      $imageDiv.toggle();

      id = this.id;
      let ap = +floatNum[id];
      $centerDiv.text('Appendix: '+  (ap.toFixed(1)));
      console.log(id);
    });
  });
  $imgInnerDiv.click(function(e){
    $imgInnerDiv.first().html();
    $imageDiv.toggle();

  });
  $left.click(function(e){
    let image;
    if (id == 0) {
      image = $images.eq($images.length - 1).clone();
      image.css({'object-fit': 'contain',});
      console.log(image);
      $imgInnerDiv.html(image);
      id = ($images.length - 1);
      let ap = +floatNum[id];
      $centerDiv.text('Appendix: '+  (ap.toFixed(1)));
    } else {
      let numeral = id * 1;
      id = (numeral - 1) * 1;
      let ap = +floatNum[id];
      $centerDiv.text('Appendix: '+  (ap.toFixed(1)));
      console.log(id);
      image = $images.eq(id).clone();
      image.css({'object-fit': 'contain',});
      console.log(image);
      $imgInnerDiv.html(image);
    }
  });
  $right.click(function(e){
    let top = (($images.length * 1) - 1);
    if (id == top) {
      image = $images.eq(0).clone();
      image.css({'object-fit': 'contain',});
      console.log(image);
      $imgInnerDiv.html(image);
      id = 0;
      let ap = +floatNum[id];
      $centerDiv.text('Appendix: '+  (ap.toFixed(1)));
    } else {
      let numeral = id * 1;
      id = (numeral + 1) * 1;
      let ap = +floatNum[id];
      $centerDiv.text('Appendix: '+ (ap.toFixed(1)));
      console.log(id);
      image = $images.eq(id).clone();
      image.css({'object-fit': 'contain',});
      console.log(image);
      $imgInnerDiv.html(image);
    }

  });


}());
