<?php
$currentPath = dirname(__DIR__); 
include "../includes/header3.php";



if ($_SESSION['administrator']['admin'] == 1) {
	$error = "";
	$return = 0;
	$enter = 0;
	$failure = 0;
	$failureNumber = 0;
	$failureFound = 0;
	$failureLength = 0;
	$success = 0;
	$yN = $_POST['yN'] ?? 1;
	if (isset($_POST['back'])) {
		$return = "yes";
	}
	if (isset($_SESSION['subjectsInfo'])) {
		$row = $_SESSION['subjectsInfo'];
	}
	if (isset($_GET['id'])) {
		$_SESSION['subject'] = $_GET['id'];

	}
	?>
	<div class="heightHeader">
	</div>

	<?php
$row = $cms->getQuestions()->selectSubjectViaTableIdAndClassId();

		if ($row['live'] == 0 && $row['table_id'] == $_SESSION['subject']) {
			$enter = 1;
		}


	if ($enter == 1 || $_SESSION['administrator']['root'] == 1) {


		$_SESSION['subjectsInfo'] = $row;

		if ((!isset($_GET['off']) && $success !== 1 && !isset($_GET['reset'])) || ($yN !== "YES" && $yN !== "no" && $yN !== "no" && $yN !== 'NO' && !isset($_GET['off']))) {

			?>
			<div id="main" class="main">

				<div class="mainbody centeredText">
					<fieldset class="fieldset1">
						<h4>DO YOU WANT TO CHANGE OR ENTER THE SUBJECT NAME?</h4>
						<form action="fillQuestionnaireOne.php?off=yes" method="POST">
							<label for="yN">YES OR NO?</label>
							<input type="text" name="yN">
							<input type="submit" value="submit">
						</form>
					</fieldset>
					<div class="addHeight">
					</div>

				</div>
			</div>
		</div>
		<?php
	}


	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['subject_information'])) {
			for($i = 1; $i <= 10; $i++) {
				$link['a' . $i] = str_replace("https://", '', $_POST['link'. $i]);
				$link['a' . $i] = str_replace("https:\\\\", '', $link['a'.$i]);
				$link['a' . $i] = str_replace("www.", '', $link['a'.$i]);
				if ($_POST['link'.$i] != '') {
				$link['a' . $i] = 'www.' . $link['a' . $i];
				}
				$description['a' . $i] = $_POST['description' . $i];
			}
		}


		if (isset($_POST['subject_information'])) {
			if (strlen($_POST['subject_information']) > 3 && strlen($_POST['removeQuestion']) >= 1) {



				if ($_POST['numberOfQuestions'] < 41) {

					$_SESSION['number_of_questions'] = $_POST['numberOfQuestions'];
					$_SESSION['number_of_removal'] = $_POST['removeQuestion'];

					$result = $cms->getQuestions()->updateSubjectsInitial($_POST['subject_information'], $_POST['removeQuestion'], $_POST['numberOfQuestions'],
					$link['a1'], $link['a2'], $link['a3'], $link['a4'], $link['a5'], $link['a6'], $link['a7'], $link['a8'],
					$link['a9'], $link['a10'], $description['a1'], $description['a2'], $description['a3'], $description['a4'],
					$description['a5'], $description['a6'], $description['a7'], $description['a8'], $description['a9'], $description['a10'],
					$_POST['introduction']);
					if ($result > 0) {
						$error .= "<h4>THE UPDATE WAS SUCCESSFULL!</h4><br>";
						$success = 1;
						$_SESSION['subjectQuestions'] = 8;

					} else {
						$error .= "<h4>THE UPDATE WAS NOT SUCCESSFULL.</h4><br>";
						$failure = 1;
					}

				} else { 
					$failure = 1;
					$error = 'THE NUMBER OF QUESTIONS NEED TO BE BELOW FORTY-ONE AND IT IS ADVISED THAT THIS NUMBER HAVE SHORTER QUESTIONS FOR LOADING TIMES.'; }



			}
		}
		// combine the above and the below immediate removeQuestion and numberOfQuestions



		if ($success == 1) {
			?>
			<div class="centeredText">
				<?= $error ?? "" ?>

				<div id="main">
					<div id="mainBody" class="margin80">
						<fieldset class="fieldset1">
							<form action="fillQuestionnaireOne.php" method="POST">
								<input type="submit" name="submit1" value="MOVE TO NEXT PAGE!">
							</form>
							<form action="fillQuestionnaireOne.php?off=yes" method="POST">
								<input type="submit" name="back" value="BACK TO LAST PAGE!">
							</form>
						</fieldset>
					</div>
				</div>
			</div>
			<?php

		}
		if ($yN == "no" || $yN == "NO" || isset($_POST['submit1'])) {
			header("Location: fillQuestionnaireTwo.php");
			exit;

		} elseif (isset($_POST['submit2'])) {
			header("Location: fillQuestionnaireOne.php?off=yes");
			exit;
		}

		if ($yN == 'yes' || $yN == 'YES' || $return == 'yes'|| (isset($_POST['subject_information']) && $failure == 1)) {
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
			}
			
			?>
			<div id="main" class="main">

				<div class="heightHeader">
				</div>
				<div class="width70">
					<?php

?>
					<fieldset class="fieldset2">
						<form action="fillQuestionnaireOne.php?off=yes" method="POST">
							<label for="subject_information">PLEASE ENTER THE SUBJECT NAME.</label><br>
							<input type="text" name="subject_information" value="<?php if($row['subject_information'] == 'empty') { echo ''; } else { echo $row['subject_information']; } ?>" size="69"><br>
							<label for="introduction">PLEASE ENTER THE INFORMATION TO LEARN:</label><br>
							<textarea rows='40' cols='80' name='introduction'><?= $row['introduction'] ?? "" ?></textarea><br>
							<label for="numberOfQuestions">PLEASE ENTER THE NUMBER OF QUESTIONS<BR>
								DISPLAYED ON EACH PAGE OF THE QUESTIONAIR.<br>
								<br>
							</label>
							<input type="number" name="numberOfQuestions" value="<?= $row['number_of_questions'] ?? 2 ?>" size="3"><br>
							<label for="removeQuestion">PLEASE ENTER THE NUMBER WHICH DICTATES<BR>
								THE REMOVAL OF QUESTIONS UPON COMPLETION.<br>
							</label>
							<input type="number" name="removeQuestion" value="<?= $row['number_of_removal'] ?? 2 ?>" size="3"><br>
							<?php

							for($i = 1; $i <= 10; $i++) {
								?>
								<label for="link<?= $i ?>">Please enter the link <?= $i ?>:</lable><br>
									<input type="text" name="link<?= $i ?>" value="<?php if($row['link' . $i] != 'empty' && $row['link' . $i] != 'https:\\\\www.') { echo $row['link' . $i]; }?>" size="69"><br>
										<label for="description<?= $i ?>">Please enter the description <?= $i ?? '' ?>:</lable><br>
											<textarea rows='15' cols='80' name='description<?= $i ?>'><?php if($row['link_description' . $i] != 'empty') { echo $row['link_description' . $i]; } ?></textarea><br>
											<?php
										} ?>
										<input type="submit" value="SUBMIT!">
									</from>
								</fieldset>

								<div style="height: 600px">
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
			}
		} else {
			echo "THE SUBJECT IS LIVE.";
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
