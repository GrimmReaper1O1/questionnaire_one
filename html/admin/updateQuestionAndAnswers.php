<?php
$currentPath = dirname(__DIR__); 
include "../includes/header3.php";

if ($_SESSION['administrator']['admin'] == 1) {


	$enter = 0;

	if (isset($_GET['id'])) {
		$_SESSION['questionId'] = $_GET['id'];

	}



	if ($enter == 1 || $_SESSION['administrator']['root'] == 1 || $_SESSION['subjectsInfo']['live'] == 0) {

		$failureInsert = 0;
		$failureFound = 0;
		$failureUpdate = 0;
		$success = 0;
		$failure = 0;
		$failureLength = 0;
		$failureNumber = 0;
		$question = $_POST['question'] ?? 'empty';
		$correct = isset($_POST['correct']) ? 'answ' . $_POST['correct'] : 'answ1';
		$numeralString[0] = 'empty';
		$numeralString[1] = 'ONE';
		$numeralString[2] = 'TWO';
		$numeralString[3] = 'THREE';
		$numeralString[4] = 'FOUR';
		$numeralString[5] = 'FIVE';
		$numeralString[6] = 'SIX';
		$numeralString[7] = 'SEVEN';
		$numeralString[8] = 'EIGHT';

		for ($i = 1 ; $i <= 8 ; $i++) {

			$pa[$i] = $_POST['pa1'] ?? 'empty';

			$answ[$i] = $_POST['answ1'] ?? 'empty';

			$hint[$i] = $_POST['hint1'] ?? 'empty';

		}

		if (isset($_POST['fill'])) {
			if (strlen($_POST['question']) > 0 && strlen($_POST['pa1']) > 0 && strlen($_POST['pa2']) > 0 &&
			strlen($_POST['answ1']) > 0 && strlen($_POST['answ2']) > 0 &&
			strlen($_POST['correct']) > 0 && strlen($_SESSION['questionId']) > 0 ) {

				$result = $cms->getQuestions()->selectQuestionIdViaQuestionId($_SESSION['questionId']);

				if ($result != false) {

					try {
						$result = $cms->getQuestions()->insertQuestion($question, $pa[1], $pa[2], $pa[3], $pa[4], $pa[5],
						$pa[6], $pa[7], $pa[8], $answ[1], $answ[2], $answ[3], $answ[4], $answ[5], $answ[6], $answ[7],
						$answ[8], $correct, $_SESSION['questionId'], $hint[1], $hint[2], $hint[3], $hint[4], $hint[5], $hint[6],
						$hint[7], $hint[8]);

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


		if ($failureFound === 2 || $failureInsert === 2 || $failureLength === 2 || $success === 2) {
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

		}
		?>

		<div id="main" class="main">

			<div class="heightHeader">
			</div>

			<div class="mainbody">
				<a href="questionSets.php">BACK TO QUESTION SETS!</a><br><br>
				<h4>PLEASE ENTER ALL THE INFORMATION FOR THE INSTANCE OF THE QUESTION.</h4><br>
				<form action="fillQuestionnaireThree.php" method="POST">
					<label for="question">QUESTION:</label><br><br>
					<textarea name='question' rows='20' cols='80'></textarea><br><br>
					<label for="correct">PLEASE ENTER THE NUMBER FOR THE CORRECT ANSWER IN THE FORM OF A NUMERAL: </label><br><br>
					<input type="text" name="correct" size="100"><br><br>

					<?PHP
					for ($i = 1 ; $i <= 8 ; $i++) {

						?>
						<label for="pa<?= $i ?>">SELECTION <?= $numeralString[$i] ?>:</label><br><br>
						<input type="text" name="pa<?= $i ?>" size="100"><br><br>
						<label for="answ<?= $i ?>">ANSWER TO SELECTION <?= $numeralString[$i] ?>:</label><br><br>
						<input type="text" name="answ<?= $i ?>" size="100"><br><br>
						<label for="hint<?= $i ?>">HINT <?= $numeralString[$i] ?>:</label><br><br>
						<input type="text" name="hint<?= $i ?>" size="100"><br><br>
						<?PHP
					}
					?>
					<input type="submit" name="fill" value="SUBMIT!">
				</form>




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
</div>


<?php


} else {
	header("Location: classes.php");
	exit();

}
} else {
	header("Location: ../classes.php");
	exit();
}
?>
<div>
	<?php
	include '../includes/footer2.php';
	?>
</div>
</body>
</html>
