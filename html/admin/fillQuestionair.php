<?php
$currentPath = dirname(__DIR__); 
include "../../includes/header3.php";
if ($_SESSION['administrator']['admin'] == 1) {


$enter = 0;

	if (isset($_GET['id'])) {
	$_SESSION['subject'] = $_GET['id'];
	unset($_SESSION['stage']);
	}

foreach($_SESSION['subjectsFromPage'] as $subject) {
	if ($subject['live'] == 0 && $subject['table_id'] == $_SESSION['subject']) {
		$enter = 1;
		}
	}

if ($enter == 1 || $administrator['root'] == 1) {

$failureInsert = 0;
$failureFound = 0;
$failureUpdate = 0;
$success = 0;
$failure = 0;
$failureLength = 0;
$failureNumber = 0;
$yN = $_POST['yN'] ?? 1;
$question = $_POST['question'] ?? 'empty';
$pa1 = $_POST['pa1'] ?? 'empty';
$pa2 = $_POST['pa2'] ?? 'empty';
$pa3 = $_POST['pa3'] ?? 'empty';
$pa4 = $_POST['pa4'] ?? 'empty';
$pa5 = $_POST['pa5'] ?? 'empty';
$pa6 = $_POST['pa6'] ?? 'empty';
$pa7 = $_POST['pa7'] ?? 'empty';
$pa8 = $_POST['pa8'] ?? 'empty';
$answ1 = $_POST['answ1'] ?? 'empty';
$answ2 = $_POST['answ2'] ?? 'empty';
$answ3 = $_POST['answ3'] ?? 'empty';
$answ4 = $_POST['answ4'] ?? 'empty';
$answ5 = $_POST['answ5'] ?? 'empty';
$answ6 = $_POST['answ6'] ?? 'empty';
$answ7 = $_POST['answ7'] ?? 'empty';
$answ8 = $_POST['answ8'] ?? 'empty';
$hint1 = $_POST['hint1'] ?? 'empty';
$hint2 = $_POST['hint2'] ?? 'empty';
$hint3 = $_POST['hint3'] ?? 'empty';
$hint4 = $_POST['hint4'] ?? 'empty';
$hint5 = $_POST['hint5'] ?? 'empty';
$hint6 = $_POST['hint6'] ?? 'empty';
$hint7 = $_POST['hint7'] ?? 'empty';
$hint8 = $_POST['hint8'] ?? 'empty';


if ($pa1 == '') {
	$pa1 = 'empty' ;
}
if ($pa2 == '') {
	$pa2 = 'empty' ;
}
if ($pa3 == '') {
	$pa3 = 'empty' ;
}
if ($pa4 == '') {
	$pa4 = 'empty' ;
}
if ($pa5 == '') {
	$pa5 = 'empty' ;
}
if ($pa6 == '') {
	$pa6 = 'empty' ;
}
if ($pa7 == '') {
	$pa7 = 'empty' ;
}
if ($pa8 == '') {
	$pa8 = 'empty' ;
}
if ($answ1 == '') {
	$answ1 = 'empty' ;
}
if ($answ2 == '') {
	$answ2 = 'empty' ;
}
if ($answ3 == '') {
	$answ3 = 'empty' ;
}
if ($answ4 == '') {
	$answ4 = 'empty' ;
}
if ($answ5 == '') {
	$answ5 = 'empty' ;
}
if ($answ6 == '') {
	$answ6 = 'empty' ;
}
if ($answ7 == '') {
	$answ7 = 'empty' ;
}
if ($answ8 == '') {
	$answ8 = 'empty' ;
}
if ($hint1 == '') {
	$hint1 = 'empty' ;
}
if ($hint2 == '') {
	$hint2 = 'empty' ;
}
if ($hint3 == '') {
	$hint3 = 'empty' ;
}
if ($hint4 == '') {
	$hint4 = 'empty' ;
}
if ($hint5 == '') {
	$hint5 = 'empty' ;
}
if ($hint6 == '') {
	$hint6 = 'empty' ;
}
if ($hint7 == '') {
	$hint7 = 'empty' ;
}
if ($hint8 == '') {
	$hint8 = 'empty' ;
}
for ($i = 1; $i <= 10; $i++) {
$link['a' . $i] = $_POST['link' . $i] ?? 'empty';
$description['a' . $i] = $_POST['description' . $i] ?? 'empty';
if ($link['a' . $i] == '') {
	$link['a' . $i] = 'empty' ;
}
if ($description['a' . $i] == '') {
	$description['a' . $i] = 'empty' ;
}
}
$subjectDescription = $_POST['introduction'] ?? 'empty';
$numberOfQuestions = $_POST['numberOfQuestions'] ?? '4';
if (isset($_GET['unsetStage'])) {
	unset($_SESSION['stage']);
}

if (isset($_GET['id']) || (isset($_SESSION['subject']) && $yN != 'no' && $yN != 'NO' && $yN != 1 && $yN != 'yes' && $yN != 'YES')) {

	?>
<h4>DO YOU WANT TO CHANGE OR ENTER THE SUBJECT NAME?</h4>
<form action="fillQuestionair.php" method="POST">
<label for="yN">YES OR NO?</label>
<input type="text" name="yN">
<input type="submit" value="submit">
</form>


<?php

}
echo $_SESSION['subject'] . " " . $_SESSION['class'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {	
		if ($yN == 1) {
			$row = $cms->getQuestions()->selectSubjectViaTableIdAndClassId(); 
			$_SESSION['subjectQuestions'] = $row['number_of_questions'];
	
		}
		if (isset($_POST['removeQuestion'])) {
			$count = $cms->getQuestions()->updateSubjectRemoveQuestion($_POST['removeQuestion']);
			if ($count > 0) {
				$success = 1;
			} else {
				$failureNumber = 1;
			}


		}
		if (isset($_POST['subject_information'])) {
		if (strlen($_POST['subject_information']) > 3) {
			
	
	
	
			if (isset($_POST['numberOfQuestions'])) {
				if ($_POST['numberOfQuestions'] >= 2 && $_POST['numberOfQuestions'] <= 8) {
		
		$result = $cms->getQuestions()->updateSubjectsInitial($_POST['subject_information'], $numberOfQuestions,
		$link['a1'], $link['a2'], $link['a3'], $link['a4'], $link['a5'], $link['a6'], $link['a7'], $link['a8'], 
		$link['a9'], $link['a10'], $description['a1'], $description['a2'], $description['a3'], $description['a4'], 
		$description['a5'], $description['a6'], $description['a7'], $description['a8'], $description['a9'], $description['a10'], 
		$subjectDescription);
	if ($result > 0) {
		echo "<h4>THE UPDATE WAS SUCCESSFULL!</h4><br>";
		$success = 1;		
		$_SESSION['subjectQuestions'] = 8;
	
		} else { 
			echo "<h4>THE UPDATE WAS NOT SUCCESSFULL.</h4><br>";
			$failure = 1;
		}
			} else { $failureNumber = 1; }
			}
	if (!isset($_POST['numberOfQuestions'])) {
		$result = $cms->getQuestions()->updateSubjects($_POST['subject_information'], $_SESSION['subject']);
	if ($result > 0) {
		echo "<h4>THE UPDATE WAS SUCCESSFULL!</h4><br>";
		$success = 1;	
			
		} else { 
			echo "<h4>THE UPDATE WAS NOT SUCCESSFULL.</h4><br>";
			$failure = 1;
		}
			}

	
		} else { $failureLength = 1; }
}



	if (isset($_POST['introduction']) && !isset($_POST['numberOfQuestions'])) {
		if (strlen($_POST['introduction']) >= 3) {
			$questionPossition = floatval($_POST['questionPossition']);
			$result2 = $cms->getQuestions()->selectToCheckQuestionNumberViaSubjectClassAndPossition($questionPossition, $_POST['introduction']);

	if ( $result2 == false) {
		try {
			
		$result = $cms->getQuestions()->insertQuestionDescription($_POST['introduction'], $questionPossition, 
		);
		$success = 3;
		$_SESSION['stage'] = 4;
		}
		catch(Exception $e) {
			$failureInsert = 3;
		} 
		}
	else { $failureFound = 3;
		}
		$questionId = $cms->getQuestions()->selectQuestionViaDescription($_POST['introduction']);
		
		if ($questionId != false) {
		$_SESSION['questionId'] = $questionId['question_id'];
		
		}
	} else { $failureLength = 3; }
		}
	

	
	if (isset($_POST['fill'])) {
	if (strlen($_POST['question']) >= 10 || strlen($_POST['pa1']) >= 10 || strlen($_POST['pa2']) >= 10 ||		
	strlen($_POST['answ1']) >= 10 || strlen($_POST['answ2']) >= 10 || 		
		strlen($_POST['correct']) >= 0 || strlen($_SESSION['questionId']) >= 10 || strlen($_POST['hint1']) >= 10 || 
		strlen($_POST['hint2']) >= 10
		) {	
		echo "here";
		$correct = "answ" . $_POST['correct'];
			$result = $cms->getQuestions()->selectQuestionViaQuestionAndCorrect($_POST['question'], $_SESSION['questionId'], $correct);
		
		if ($result == false) {
			
		try {
	$result = $cms->getQuestions()->insertQuestion($question, $pa1, $pa2, $pa3, $pa4, $pa5, 
	$pa6, $pa7, $pa8, $answ1, $answ2, $answ3, $answ4, $answ5, $answ6, $answ7, 
	$answ8, $correct, $_SESSION['questionId'], $hint1, $hint2, $hint3, $hint4, $hint5, $hint6, 
	$hint7, $hint8);
	
	$success = 2;
		} 
		catch(Exception $e) {
			$failureInsert = 2;
	}
		} else {
			$failureFound = 2;
		}
	} else { $failureLength = 2; 
	}
	}
	


	if ($yN == 'yes' || $yN == 'YES' || isset($_POST['subject_information'])) {
		if ($yN == 'YES' || $yN == 'yes' || (($failure == 1 || $failureNumber == 1 
		|| $failureFound == 1 || $failureLength == 1) && isset($_POST['subject_information']))) {
			if ($failureFound == 1) {
			echo "<h4>THE SUBJECT NAME WAS ALREADY ENTERED PREVIOUSLY.</h4>";
		}   if ($failureLength == 1) {
			echo "<h4>THE SUBJECT NAME MUST BE FILLED.</h4>";
		}
			if ($failureNumber == 1) {
			echo "<h4>THERE WAS A FAILURE TO UPLOAD THE NUMBER OF REMOVAL.</h4>";
			}
			
		$row = $cms->getQuestions()->selectSubjectViaTableId($_SESSION['subject']);
		?>
			<form action="fillQuestionair.php" method="POST">
			<label for="subject_information">PLEASE ENTER THE SUBJECT NAME.</label><br>
			<input type="text" name="subject_information" value="<?= $row['subject_information'] ?>" size="100"><br>
			<label for="introduction">Subject description:</label><br>	
			<textarea rows='40' cols='80' name='introduction'><?= $row['introduction'] ?? "" ?></textarea><br>
			<label for="numberOfQuestions">PLEASE ENTER THE NUMBER OF QUESTIONS<BR>
			DISPLAYED ON EACH PAGE OF THE QUESTIONAIR.<br>
			DO NOT ENTER LESS THAN TWO OR<br>
			MORE THAN EIGHT.<br>
			</label>
			<input type="number" name="numberOfQuestions" value="<?= $row['number_of_questions'] ?? 2 ?>" size="1"><br>
			<label for="removeQuestion">PLEASE ENTER THE NUMBER WHICH DICTATES<BR>
			THE REMOVAL OF QUESTIONS UPON COMPLETION.<br>
			</label>
			<input type="number" name="removeQuestion" value="<?= $row['number_of_removal'] ?? 2 ?>" size="2"><br>		
			<?php
			
			for($i = 1; $i <= 10; $i++) {
			?>
			<label for="link<?= $i ?>">Please enter the link <?= $i ?>:</lable><br>
			<input type="text" name="link<?= $i ?>" value="<?php if($row['link' . $i] != 'empty') { echo $row['link' . $i]; }?>"><br>
			<label for="description<?= $i ?>">Please enter the description <?= $i ?? '' ?>:</lable><br>
			<textarea rows='15' cols='80' name='description<?= $i ?>'><?php if($row['link_description' . $i] != 'empty') { echo $row['link_description' . $i]; } ?></textarea><br>
				<?php
			}
			
			
			
			
			
			if ($failureNumber == 1) {
				echo "<h4>THE NUMBER MUST BE BETWEEN OR EQUAL TO TWO TO EIGHT.</H4>";
			}?>
		
			<input type="submit" value="SUBMIT!">
			</form>
			<form action="fillQuestionair.php" method="POST">
			<input type="submit" name="subjectName" value="MOVE FORWARD!">
			</form>
			<?php
		}
	}






	
	
		
			if (isset($_POST['introduction'])) {
			echo "desc is set"; } if (isset($_POST['subjectName'])) { echo "sub is set"; }
		
		if (((isset($_POST['subject_information']) || ($yN == 'no' || $yN == 'NO')) && $failureFound == 0 && $failureInsert == 0 && $failureLength == 0 
		&& $failureNumber == 0) || (isset($_POST['introduction']) && $success != 3 && ($failureFound == 3 || $failureInsert == 3 || $failureLength == 3))) {
			
			$lastNumber = $cms->getQuestions()->selectMaxNumberFromSubject();
			
			
			
			if ($failureInsert == 3) {
?>		
			<h4>THERE WAS A PROBLEM ENTERING YOUR INFORMATION. PLEASE TRY AGAIN.</H4>
			<?php }
			if ($failureFound == 3) { ?>
			<h4>THE INFORMATION YOU TRIED TO ENTER WAS ALREADY IN THE SYSTEM.</h4>
			<?php }
			if ($failureLength == 3) { ?>
			<h4>The QUESTION DESCRIPTION MUST BE PROPERLY FILLED.</h4>
			<?PHP }
			?>
			<?php if (isset($lastNumber['max'])) { echo "THE HIGHEST QUESTION NUMBER ENTERED WAS " . $lastNumber['max'] . ".<br><br>"; } ?>
			
			<form action="fillQuestionair.php" method="POST">
			<label for="introduction">PLEASE ENTER THE QUESTION DESCRIPTION:</label><br>
			<input type="text" name="introduction" size="100"><br>
			<label for="questionPosition">PLEASE ENTER THE QUESTION NUMBER IN THE FORM OF 11.0.<BR>
			TO CHANGE THE POSITIONIOING OF QUESTIONS IN THE FUTURE, YOU MAY <BR>
			ENTER 11.2, 11.25, OR 11.235:</label><br>
			<input type="text" name="questionPossition" size="100">
			<input type="submit" value="SUBMIT!">
			</form>
			
			
			
			
			<?php
		}
		
		
		
		if (isset($_SESSION['stage']) || (isset($_POST['fill']) && $failureFound === 0 && $failureInsert === 0 && $failureLength === 0 && $success !== 1) ||
		(isset($_POST['introduction']) && $failureFound === 0 && $failureInsert === 0 && $failureLength === 0 && $success !== 1) || 
		($success !== 1 && isset($_POST['fill']) && ($failureFound === 2 || $failureInsert === 2 || $failureLength === 2))) {
			if ($failureInsert == 2) {
			echo "<h4>THERE WAS A FAILED INSERTION. YOU MAY NOT HAVE ENTERED IN A NUMERAL INTO THE NUMERAL FIELD.</h4><br>";
			}
			if ($failureFound == 2) {
			echo "<h4>THERE WAS AN ENTRY FOUND WITH THE SAME QUESTION.</h4><br>";	
			}
			if ($success == 2) {
			echo "<h4>THE INSERTION WAS A SUCCESS!</h4><br>";	
			}
			if ($failureLength == 2) {
			echo "<h4>THE FIELDS MUST BE PROPERLY FILLED.</h4><br>";	
			}
				echo $_SESSION['subjectQuestions'];
			
		?>
		
		
		<form action="fillQuestionair.php?unsetStage=yes" method="POST">
		<label for="subjectName">CLICK ON THE BUTTON BELOW IF YOU WANT TO START THE NEXT SERIES OF QUESTIONS.</label><br><br>
		<input type="submit" name="subjectName" value="NEXT QUESTION!">
		</form><br>
		<h4>PLEASE ENTER ALL THE INFORMATION FOR THE INSTANCE OF THE QUESTION<br>
		VIA COPYING AND PASTE.</h4><br>
			<form action="fillQuestionair.php" method="POST">
			<label for="question">QUESTION:</label><br><br>
			<textarea name='question' rows='20' cols='80'></textarea><br><br>
			<label for="pa1">SELECTION ONE:</label><br><br>
			<input type="text" name="pa1" size="100"><br><br>
			<label for="answ1">ANSWER TO SELECTION ONE:</label><br><br>
			<input type="text" name="answ1" size="100"><br><br>
			<label for="hint1">HINT ONE:</label><br><br>
			<input type="text" name="hint1" size="100"><br><br>
			<label for="pa2">SELECTION TWO:</label><br><br>
			<input type="text" name="pa2" size="100"><br><br>
			<label for="answ2">ANSWER TO SELECTION TWO:</label><br><br>
			<input type="text" name="answ2" size="100"><br><br>
			<label for="hint2">HINT TWO:</label><br><br>
			<input type="text" name="hint2" size="100"><br><br>
			<?php  //
		//	if ($_SESSION['subjectQuestions'] >= 3) {
		//	?>
			<label for="pa3">SELECTION THREE:</label><br><br>
			<input type="text" name="pa3" size="100"><br><br>
			<label for="answ3">ANSWER TO SELECTION THREE:</label><br><br>
			<input type="text" name="answ3" size="100"><br><br>
			<label for="hint3">HINT THREE:</label><br><br>
			<input type="text" name="hint3" size="100"><br><br>
			<?php //  }
		//	
		//	if ($_SESSION['subjectQuestions'] >= 4) {
		//	?>						
			<label for="pa4">SELECTION FOUR:</label><br><br>
			<input type="text" name="pa4" size="100"><br><br>
			<label for="answ4">ANSWER TO SELECTION FOUR:</label><br><br>
			<input type="text" name="answ4" size="100"><br><br>
			<label for="hint4">HINT FOUR:</label><br><br>
			<input type="text" name="hint4" size="100"><br><br>
			<?php // }
			
		//	if ($_SESSION['subjectQuestions'] >= 5) {
		//	?>
			<label for="pa5">SELECTION FIVE:</label><br><br>
			<input type="text" name="pa5" size="100"><br><br>
			<label for="answ5">ANSWER TO SELECTION FIVE:</label><br><br>
			<input type="text" name="answ5" size="100"><br><br>
			<label for="hint5">HINT FIVE:</label><br><br>
			<input type="text" name="hint5" size="100"><br><br>
			<?php  // }
			?>
			
			<?php //
		//	if ($_SESSION['subjectQuestions'] >= 6) {
		//	?>
			<label for="pa6">SELECTION SIX:</label><br><br>
			<input type="text" name="pa6" size="100"><br><br>
			<label for="answ6">ANSWER TO SELECTION SIX:</label><br><br>
			<input type="text" name="answ6" size="100"><br><br>
			<label for="hint6">HINT SIX:</label><br><br>
			<input type="text" name="hint6" size="100"><br><br>
			<?php // }
		//	?>
			
			<?php //
		//	if ($_SESSION['subjectQuestions'] >= 7) {
		//	?>
			<label for="pa7">SELECTION SEVEN:</label><br><br>
			<input type="text" name="pa7" size="100"><br><br>
			<label for="answ7">ANSWER TO SELECTION SEVEN:</label><br><br>
			<input type="text" name="answ7" size="100"><br><br>
			<label for="hint7">HINT SEVEN:</label><br><br>
			<input type="text" name="hint7" size="100"><br><br>
			<?php  // }
		//	?>
			
			<?php //
		//	if ($_SESSION['subjectQuestions'] >= 8) {
		//	?>
			<label for="pa8">SELECTION EIGHT:</label><br><br>
			<input type="text" name="pa8" size="100"><br><br>
			<label for="answ8">ANSWER TO SELECTION EIGHT:</label><br><br>
			<input type="text" name="answ8" size="100"><br><br>
			<label for="hint8">HINT EIGHT:</label><br><br>
			<input type="text" name="hint8" size="100"><br><br>
			<?php //  }
		//	?>
			<label for="correct">PLEASE ENTER THE NUMBER FOR THE CORRECT ANSWER IN THE FORM OF A NUMERAL: </label><br><br>
			<input type="text" name="correct" size="100"><br><br>
			<input type="submit" name="fill" value="SUBMIT!">
			</form>
			
		<?php
		}
}
} else {  
    header("Location: classes.php");
    exit();

}
} else {
    header("Location: how_dare_you.php");
    exit();
}