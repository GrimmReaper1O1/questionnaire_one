
let letterString = 'A B C D E F G H I J K L M N O P Q R S T U V W X Y Z';
let letterArray = letterString.split(' ');
console.log(letterArray);
let $divLetters = $('#letters')
let letterLinkArray = [];
let $divlet = []
$divlet = $('<div>');
$divlet.attr('style', 'display: inline-block;');
$divlet.attr('style', 'text-align: center !important;')
for (let i = 0; i < 26; i++) {
    let $span;
   let $span1;
    $span = $('<span>').text('-');
    $span1 = $('<span>').text('-');
    $span2 = $('<span>');
    $divlet.append($span);
    letterLinkArray[i] = $('<a>').attr('href', 'library.php?unset=yes&letter='+letterArray[i]);
    letterLinkArray[i].text(letterArray[i])
    $span2.append(letterLinkArray[i]);
    $divlet.append($span2);
    $divlet.append($span1);
    
}
$divLetters.append($divlet);