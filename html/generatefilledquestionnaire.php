<?php
$start = microtime(true);
	include "../src/bootstrap.php";
	$start = microtime(true);
		$cms->getQuestions()->insertQuestionDescription("test", 1);
		$_SESSION['class'] = 8;


	$question = "what kind of food is the best.";

	
	for($z = 1 ; $z <=  8 ; $z++ ) {

	$pa[$z] = "junk food";
	}
	for($z = 1 ; $z <=  8 ; $z++ ) {
	$answ[$z] = "popcorn is great and so are chocolate ice creams ar my favourite next to chocolate milkshakes."; }
	for($z = 1 ; $z <=  8 ; $z++ ) {
		$hint[$z] = "Guess what you meaning of life is.";
	}
	$description = "This is a question about life";
	for ( $i = 1 ; $i <= 100 ; $i++ ) {
		$questionPositionNumber = $i;
		$cms->getQuestions()->insertQuestionDescription("test".$i, $questionPositionNumber);
		$that = $cms->getQuestions()->lastQuestionId();
		
		$numeral = rand(2,4);
		$correctAnsw = 'answ1';
		for ( $c = 0 ; $c <= $numeral ; $c++ ) {
	$cms->getQuestions()->insertQuestion($question . $i . ' ' . $c, $pa[1] . $i . ' ' . $c, $pa[2] . $i . ' ' . $c, $pa[3] . $i . ' ' . $c,
	$pa[4] . $i . ' ' . $c, $pa[5] . $i . ' ' . $c, $pa[6] . $i . ' ' . $c, $pa[7] . $i . ' ' . $c, $pa[8] . $i . ' ' . $c,
	$answ[1] . $i . ' ' . $c, $answ[2], $answ[3], $answ[4], $answ[5], $answ[6], $answ[7], $answ[8], $correctAnsw, intval($that['id']),
	$hint[1] . $i . ' ' . $c, $hint[2] . $i . ' ' . $c, $hint[3] . $i . ' ' . $c, $hint[4] . $i . ' ' . $c, $hint[5] . $i . ' ' . $c,
	$hint[6] . $i . ' ' . $c, $hint[7] . $i . ' ' . $c, $hint[8] . $i . ' ' . $c);
	}
	echo '<br>filled question_id ' . $_SESSION['class'] . "!"; }



	$end = microtime(true);
	echo ($end - $start);
	//print_r($_SESSION['counts']['count1']);
