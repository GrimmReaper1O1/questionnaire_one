<?php
$currentPath = dirname(__DIR__); 
include "../includes/header3.php";

if ($_SESSION['administrator']['admin'] == 1) {
	$error = '';

	$error = '';

	if (isset($_GET['updateSubject'])) {
		$_SESSION['sId'] = $_GET['updateSubject'];

	}
	$start = microtime(true);
	$subjectInfo = $cms->getQuestions()->selectSubjectViaSubjectId($_SESSION['sId']);

	$subjectInfo['number_of_questions'] = isset($_POST['number']) ? $_POST['number'] : $subjectInfo['number_of_questions'];
	$subjectInfo['subject_information'] = isset($_POST['number']) ? $_POST['name'] : $subjectInfo['subject_information'];

	if (isset($subjectInfo)) {

		if ($subjectInfo['live'] == 0 || $_SESSION['administrator']['admin'] == 1) {

			$enter = 1;

		}
	}

	if ($enter == 1 || $_SESSION['administrator']['admin'] == 1) {

		if (isset($_POST['name'])) {

			if ($_POST['name'] != '' & $_POST['number'] < 41) {
				$result = $cms->getQuestions()->updateSubjectNameAndNumberOfQuestions($_SESSION['sId'], $_POST['name'], $_POST['number']);
				if ($result == 1) {
					$error .= "THE UPDATE OF NAME WAS SUCCESSFULL!<br>";
				}
				else
				{
					$error .= "THE UPDATE OF NAME WAS NOT SUCCESSFULL.<br>";
				}

			} else {
				$error .= "THE NAME MUST BE FILLED AND THE NUMBER UNDER FORTY-ONE BUT IF THIS NUMBER IS REACHED IT IS ADVISED THE QUESTIONS ARE RELATIVELY SHORT FOR LOADING TIMES.";
			}
		}



	}
}



if ($enter == 1) {
	?>
	<div id="main" class="main">

		<div class="heightHeader">
		</div>
		<div class="mainbody">
			<div class="margin80">
				<div class="centeredText">
					<?= $error ?><br><br>
				</div>
				<div class="right-align">
					<a href="subjects.php?class=<?= $_SESSION['site']['cId'] ?>">BACK TO SUBJECTS!</a><br><br>
				</div>
				<div class="centeredText">
					<fieldset class="fieldset3">
						PLEASE ENTER THE NEW NAME AND NUMBER OF QUESTIONS TO SHOW ON PAGE.<br>
						YOU MAY ENTER EITHER OR BOTH.<br>
						<form action="updateSubject.php" method="POST">
							<label for="name">ENTER NEW NAME:</label><br>
							<input type="text" name="name" size="20" value="<?= $subjectInfo['subject_information'] ?>"><br>
							<label for="number">ENTER NEW NUMBER OF QUESITONS ON PAGE:</label><br>
							<input type="number" name="number" size="100" value="<?= $subjectInfo['number_of_questions'] ?>"><br>
							<input type="submit" value="SUBMIT!">
						</form>
					</fieldset>
				</div>
				<div style="height: 1400px;">
				</div>
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
} else {
	header("Location: ../classes.php");
	exit;
}
?>
<div>
	<?php
	include '../includes/footer2.php';
	?>
</div>
</body>
</html>
