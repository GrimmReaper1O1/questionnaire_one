<?php
$currentPath = dirname(__DIR__); 
include "../includes/header3.php";

if ($_SESSION['administrator']['admin'] == 1) {

	$error = '';
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

	if ($_SESSION['administrator']['root'] == 1 || $_SESSION['subjectsInfo']['live'] != 1) {

		$failureInsert = 0;
		$failureFound = 0;
		$success = 0;
		$failure = 0;
		$failureLength = 0;
		$failureNumber = 0;
		$failurePossition = 0;
		unset($_SESSION['lastNumeral']);
		if (!isset($_SESSION['lastNumeral'])) {

			$_SESSION['lastNumeral'] = $cms->getQuestions()->selectMaxNumberFromSubject();
			$lastNumeral = $_SESSION['lastNumeral'];
		} else {

			$lastNumeral = $_SESSION['lastNumeral'];

		}
		;
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {



			if (isset($_POST['submit1'])) {
				unset($_SESSION['lastNumeral']);
				header("Location: fillQuestionnaireThree.php");
				exit;

			}
			if (isset($_POST['description'])) {
				if (strlen($_POST['description']) < 3 ) {
					$failureLength = 3; }

					$_SESSION['description'] = $_POST['description'];
					if (strlen($_POST['description']) > 2 && floatval($lastNumeral['max']) < floatval($_POST['questionPossition'])) {

						$result2 = $cms->getQuestions()->selectToCheckQuestionNumberViaSubjectClassAndPossition($_POST['questionPossition'], $_POST['description']);
						$_SESSION['description'] = $_POST['description'];


						if ( $result2 == false) {
							try {

								$result = $cms->getQuestions()->insertQuestionDescription($_POST['description'], $_POST['questionPossition']);
								$success = 3;
								$_SESSION['lastNumeral']['max'] = $_POST['questionPossition'];

							}
							catch(Exception $e) {
								$failureInsert = 3;
							}
						}
						else { $failureFound = 3;
						}
						$questionId = $cms->getQuestions()->selectQuestionViaDescription($_POST['description']);

						if ($questionId != false) {
							$_SESSION['questionId'] = $questionId['question_id'];

						}
					} else { $error .= "not working!<br>"; }
				}
			}
			if ($failurePossition == 3) {

				$error ."<h4>The number must be higher and not equal to the maximum question number but can be altered elsewhere</h4>";

			}


			if ($failureInsert == 3) {


				$error ."<h4>THERE WAS A PROBLEM ENTERING YOUR INFORMATION. PLEASE TRY AGAIN.</H4>";
			}
			if ($failureFound == 3) {

				$error ."<h4>THE INFORMATION YOU TRIED TO ENTER WAS ALREADY IN THE SYSTEM. TRY A DIFFERENT DESCRIPTION OR NUMBER.</h4>";
			}
			if ($failureLength == 3) {

				$error ."<h4>The QUESTION DESCRIPTION MUST BE PROPERLY FILLED.</h4>";
			}
			?>


			<div class="heightHeader">
			</div>
			<div id="main" class="main centeredText mainbody">
				<br>
				<div>
					<?php

					if (isset($lastNumeral['max'])) { echo "<div class='centeredText'><h2>THE HIGHEST QUESTION NUMBER ENTERED WAS " . round($lastNumeral['max'],2) . ".</h2><br><br>"; }


					if ($success != 3 || isset($_POST['submit2'])) {
						$numeral = 	ceil($lastNumeral['max']);
						$numeral = $numeral ?>


						<div class="margin80">
							<?= $error ?><br>
							<div >
								<fieldset class="fieldset2">
									<form action="fillQuestionnaireTwo.php" method="POST">
										<label for="description">PLEASE ENTER THE QUESTION DESCRIPTION:</label><br>
										<input type="text" name="description" size="100" value="<?= $_SESSION['description'] ?? '' ?>"><br>
										<label for="questionPossition">PLEASE ENTER THE QUESTION NUMBER IN THE FORM OF 11.0.<BR>
											TO CHANGE THE POSITIONIOING OF QUESTIONS IN THE FUTURE, YOU MAY <BR>
												ENTER 11.2, 11.25, OR 11.235:</label><br>
												<input type="text" name="questionPossition" size="100" value="<?php echo (floatval($numeral) + 0.1); ?>">
												<input type="submit" value="SUBMIT!">
											</form>
										</fieldset>
									</div>
									<div class="addHeight">
									</div>
									<?php

								} else {

									?>


									<div id="mainBody" class="margin80">
										<h4>YOUR CHOICE WAS SUCCESSFULL!</h4>
										<fieldset class="fieldset2">
											<form action="fillQuestionnaireTwo.php" method="POST">
												<input type="submit" name="submit1" value="MOVE ON TO NEXT PAGE!">
											</form>
										</fieldset>
										<div class="addHeight"></div>
										<?php
									}
									?>

								</br>
							</br>
						</br>


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
