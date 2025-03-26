<?php
$currentPath = dirname(__DIR__); 
include "../includes/header3.php";
if ($_SESSION['administrator']['admin'] == 1) {
	$error = '';
	$s1 = 0;
	$value = 0;
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
	$correct = 'answ';
	$c = $_POST['correct'] ?? '';
	$correct = 'answ' . $c;

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
	if (isset($_GET['unset'])) {
		unset($_SESSION['qid']);
		unset($_SESSION['updateqn']);
		unset($_SESSION['uD']);
	}

	if (isset($_GET['id'])) {
		$_SESSION['qid'] = $_GET['id'];
	}
	if(isset($_GET['u'])) {
		$_SESSION['updateqn'] = 1;

	}
	if (isset($_GET['uD'])) {
		$_SESSION['uD'] = 1;

	}
	IF (isset($_GET['add'])) {
		$value = 1;
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['name'])) {
			if ($_POST['name']) {
				$result = $cms->getQuestions()->updateQuestionName($_SESSION['qid'], $_POST['name']);

				if ($result > 0) {
					$error .= "THE UPDATE WAS SUCCESSFULL!";
					$s1 = 1;
				} else {
					$error .= "THE UPDATE WAS NOT SUCCESSFULL.";
				}


			}
		}

		if (isset($_POST['question']) || isset($_SESSION['updateqn'])) {

			try {
				$result = $cms->getQuestions()->insertQuestion($question, $pa1, $pa2, $pa3, $pa4, $pa5,
				$pa6, $pa7, $pa8, $answ1, $answ2, $answ3, $answ4, $answ5, $answ6, $answ7,
				$answ8, $correct, $_SESSION['qid'], $hint1, $hint2, $hint3, $hint4, $hint5, $hint6,
				$hint7, $hint8);

				$error .= "THE UPDATE WAS SUCCESSFULL!";
			} catch(Exception $e) {
				$error .= "THE UPDATE WAS NOT SUCCESSFULL.";
			}
		}





	}
	?>
	<div id="main" class="main">

		<div class="heightHeader">
		</div>

		<div class="mainbody">
			<?php


			if ((isset($_SESSION['qid']) || isset($_POST['name']) || isset($_GET['name'])) && ($s1 == 1 || $s1 == 0) && $value == 0 && !isset($_POST['question'])) {
				?>
				<div class="margin50 centeredText">
					
				<?= $error ?><br>
				<a href="questionSets.php" method="POST">BACK TO SUBJECTS</a><br><br>
				<form action="addQuestionInformation.php?updateQuestionName=yes" method="POST">
					<label for="name">NAME:</label><br>
					<input type="text" name="name" value="<?= $_POST['name'] ?? '' ?>" size="100"><br>
					<input style="display: inline-block;" type="submit" value="SUBMIT!">
				</form>
			</div>
				<?php


			}




			if ((isset($_GET['add']) && !isset($_GET['name'])) || isset($_POST['question']) ) {


				$row = $cms->getQuestions()->selectSubjectViaTableId($_SESSION['subject']);

				if (isset($info)) {
					$correct = preg_replace('/answ/', '', $info['correct']);
				}
				?>
				<h4><?= $error ?></h4><br>
				<a href="adminSubjectsAndQuestionClassifications.php" method="POST">BACK TO SUBJECTS</a><br><br>
				<form action="addQuestionInformation.php" method="POST">
					<label for="question">QUESTION:</label><br><br>
					<textarea name='question' rows='20' cols='80'><?= $_POST['question'] ?? '' ?></textarea><br><br>
					<label for="correct">PLEASE ENTER THE NUMBER FOR THE CORRECT ANSWER AS A NUMERAL: </label><br><br>
					<input type="text" name="correct" size="100" value="<?= $correct ?? '' ?>"><br><br>
					<label for="pa1">SELECTION ONE:</label><br><br>
					<input type="text" name="pa1" size="100" value="<?= $_POST['pa1']  ?? ''  ?>"><br><br>
					<label for="answ1">ANSWER TO SELECTION ONE:</label><br><br>
					<input type="text" name="answ1" size="100" value="<?= $_POST['answ1']  ?? ''  ?>"><br><br>
					<label for="hint1">HINT ONE:</label><br><br>
					<input type="text" name="hint1" size="100" value="<?= $_POST['hint1']  ?? ''  ?>"><br><br>
					<label for="pa2">SELECTION TWO:</label><br><br>
					<input type="text" name="pa2" size="100" value="<?= $_POST['pa2']  ?? ''  ?>"><br><br>
					<label for="answ2">ANSWER TO SELECTION TWO:</label><br><br>
					<input type="text" name="answ2" size="100" value="<?= $_POST['answ2']  ?? ''  ?>"><br><br>
					<label for="hint2">HINT TWO:</label><br><br>
					<input type="text" name="hint2" size="100" value="<?= $_POST['hint2']  ?? ''  ?>"><br><br>

					<label for="pa3">SELECTION THREE:</label><br><br>
					<input type="text" name="pa3" size="100" value="<?= $_POST['pa3']  ?? ''  ?>"><br><br>
					<label for="answ3">ANSWER TO SELECTION THREE:</label><br><br>
					<input type="text" name="answ3" size="100" value="<?= $_POST['answ3']  ?? ''  ?>"><br><br>
					<label for="hint3">HINT THREE:</label><br><br>
					<input type="text" name="hint3" size="100" value="<?= $_POST['hint3']  ?? ''  ?>"><br><br>

					<label for="pa4">SELECTION FOUR:</label><br><br>
					<input type="text" name="pa4" size="100" value="<?= $_POST['pa4'] ?? '' ?>"><br><br>
					<label for="answ4">ANSWER TO SELECTION FOUR:</label><br><br>
					<input type="text" name="answ4" size="100" value="<?= $_POST['answ4'] ?? '' ?>"><br><br>
					<label for="hint4">HINT FOUR:</label><br><br>
					<input type="text" name="hint4" size="100" value="<?= $_POST['hint4'] ?? '' ?>"><br><br>

					<label for="pa5">SELECTION FIVE:</label><br><br>
					<input type="text" name="pa5" size="100" value="<?= $_POST['pa5'] ?? '' ?>"><br><br>
					<label for="answ5">ANSWER TO SELECTION FIVE:</label><br><br>
					<input type="text" name="answ5" size="100" value="<?= $_POST['answ5'] ?? '' ?>"><br><br>
					<label for="hint5">HINT FIVE:</label><br><br>
					<input type="text" name="hint5" size="100" value="<?= $_POST['hint5'] ?? '' ?>"><br><br>

					<label for="pa6">SELECTION SIX:</label><br><br>
					<input type="text" name="pa6" size="100" value="<?= $_POST['pa6'] ?? '' ?>"><br><br>
					<label for="answ6">ANSWER TO SELECTION SIX:</label><br><br>
					<input type="text" name="answ6" size="100" value="<?= $_POST['answ6'] ?? '' ?>"><br><br>
					<label for="hint6">HINT SIX:</label><br><br>
					<input type="text" name="hint6" size="100" value="<?= $_POST['hint6'] ?? '' ?>"><br><br>

					<label for="pa7">SELECTION SEVEN:</label><br><br>
					<input type="text" name="pa7" size="100" value="<?= $_POST['pa7'] ?? '' ?>"><br><br>
					<label for="answ7">ANSWER TO SELECTION SEVEN:</label><br><br>
					<input type="text" name="answ7" size="100" value="<?= $_POST['answ7'] ?? ''  ?>"><br><br>
					<label for="hint7">HINT SEVEN:</label><br><br>
					<input type="text" name="hint7" size="100" value="<?= $_POST['hint7'] ?? '' ?>"><br><br>

					<label for="pa8">SELECTION EIGHT:</label><br><br>
					<input type="text" name="pa8" size="100" value="<?= $_POST['pa8'] ?? '' ?>"><br><br>
					<label for="answ8">ANSWER TO SELECTION EIGHT:</label><br><br>
					<input type="text" name="answ8" size="100" value="<?= $_POST['answ8'] ?? ''   ?>"><br><br>
					<label for="hint8">HINT EIGHT:</label><br><br>
					<input type="text" name="hint8" size="100" value="<?= $_POST['hint8'] ?? '' ?>"><br><br>

					<input type="submit" name="fill" value="SUBMIT!">
				</form>




				<?php
			} ?>
			<div style="height: 1200px">
			</div>
		</div>
	</div>

	<?php
	if (isset($_SESSION['layoutOfSite']['enableMovingBars'])) {
		if ($_SESSION['layoutOfSite']['enableMovingBars'] == 1) {

			?>
			<div id="rightLowerSidebar" class="rightLowerSidebar">

			</div>

			<?php

		}
	}
	?>
</div>
</div>
<?php
}
?>
<div>
	<?php
	include '../includes/footer2.php';
	?>
</div>
</body>
</html>
