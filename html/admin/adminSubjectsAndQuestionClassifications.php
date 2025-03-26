<?php
$currentPath = dirname(__DIR__); 
include "../includes/header3.php";

if ($administrator['admin'] == 1) {
	$error = '';
	$enter = 0;
	$page = $_GET['page'] ?? 1;
	$limit = 15;
	$error = '';
	if (isset($_GET['unset'])) {
		unset($_SESSION['subject']);
		unset($_SESSION['site']['cId']);
		unset($_SESSION['subject_information']);
	}
	if (isset($_GET['cId'])) {
		if ($_GET['cId'] > 0 && $_GET['cId'] != '') {
			$_SESSION['site']['cId'] = $_GET['cId'];

		}
	}
	if (isset($_GET['id'])) {
		$_SESSION['subject'] = $_GET['id'];
	}
	$start = microtime(true);








	if (isset($_GET['makeLive']) || isset($_GET['takeDown'])) {
		foreach ($_SESSION['subjectsFromPage'] as $subjects) {
			if (($_GET['sid'] == $subjects['table_id'] && $subjects['live'] == 0) ) {

				$enter = 1;

			}
		}
		if ($enter == 1 || $administrator['root'] == 1) {
			if (isset($_GET['makeLive'])) {
				$result = $cms->getQuestions()->updateSubjectMakeLive($_GET['sid']);

				if ($result > 0) {
					$error .= "THE CLASS IS NOW LIVE!<br>";
				} else {
					$error .= "THE CLASS STILL IS NOT LIVE!<br>";
				}

			}


			if (isset($_GET['takeDown'])) {
				$result = $cms->getQuestions()->updateSubjectNotLive($_GET['sid']);

				if ($result > 0) {
					$error .= "THE CLASS HAS BEEN TAKEN DOWN!<br>";
				} else {
					$error .= "THE CLASS HAS NOT BEEN TAKEN DOWN.<br>";
				}
			}

		}
	}

	?>

	<div id="main" class="main">

		<div class="heightHeader">
		</div>

		<div class="mainbody">
			<?php



			if (isset($_GET['updateSubject'])) {
				foreach ($_SESSION['subjectsFromPage'] as $subjects) {
					if (($_SESSION['subjectsFromPage'] == $_GET['updateSubject'] && $subjects['live'] == 0) || $_SESSION['administrator']['root'] == 1) {

						$enter = 1;

					}
				}
				if ($enter == 1) {
					$number = $_GET['updateSubject'];
					$_SESSION['updateSubject'] = $number;
					?>
					PLEASE ENTER THE NEW NAME AND NUMBER OF QUESTIONS TO SHOW ON PAGE.<br>
					YOU MAY ENTER EITHER OR BOTH.<br>
					<form action="adminSubjectsAndQuestionClassifications.php" method="POST">
						<label for="name">ENTER NEW NAME:</label><br>
						<input type="text" name="name" size="100"><br>
						<label for="number">ENTER NEW NUMBER OF QUESITONS ON PAGE:</label><br>
						<input type="text" name="number" size="100"><br>
						<input type="submit" value="SUBMIT!">
					</form>
					<?php
				}
			}



			if (isset($_POST['name']) && isset($_POST['number'])) {

				foreach ($_SESSION['subjectsFromPage'] as $subjects) {
					if (($_SESSION['subjectsForPage'] && $subjects['live'] == 0)) {

						$enter = 1;

					}
				}
				if ($enter == 1 || $_SESSION['administrator']['root'] == 1) {
					if ($_POST['name'] != '') {
						$result = $cms->getQuestions()->updateSubjectName($_SESSION['updateSubject'], $_POST['name']);
						if ($result == 1) {
							$error .= "THE UPDATE OF NAME WAS SUCCESSFULL!<br>";
						}
						else
						{
							$error .= "FOR SOME REASON THE UPDATE OF NAME WAS NOT SUCCESSFULL.<br>";
						}

					}

					if ($_POST['number'] != '') {


						$number = intval($_POST['number']);
						$result = $cms->getQuestions()->updateSubjectsNumberOfQuestions($_SESSION['updateSubject'], $number);
						if ($result == 1) {
							$error .= "THE UPDATE OF NUMBER WAS SUCCESSFULL!<br>";
						}
						else
						{
							$error .= "FOR SOME REASON THE UPDATE OF NUMBER WAS NOT SUCCESSFULL.<br>";
						}

					}

					echo $error;
					?>
					<a href="adminSubjectsAndQuestionClassifications.php?cId=<?= $_SESSION['site']['cId'] ?>">BACK TO SUBJECTS!</a>

					<?php
				}
			}







			if (isset($_SESSION['site']['cId']) && !isset($_SESSION['subject']) && !isset($_GET['id']) && !isset($_GET['updateSubject'])
			&& !isset($_POST['name'])) {
				$subjectsArray = $cms->getQuestions()->selectAllFromSubjectsAdmin($_SESSION['site']['cId']);
				echo $error;
				echo "<h1>SELECT THE SUBJECT TO ALTER</h1><br>";
				$_SESSION['subjectsFromPage'] = $subjectsArray;

				foreach($subjectsArray as $subjects) {



					?>
					<h3><?php if ($subjects['live'] == 1) { echo "LIVE!<br>"; } else { echo "NOT LIVE!<br>"; }
					if ($_SESSION['administrator']['root'] == 1) {?>
						<a href="adminSubjectsAndQuestionClassifications.php?makeLive=yes&sid=<?= $subjects['id'] ?>">MAKE SUJBECT LIVE!</a><br>
						<a href="adminSubjectsAndQuestionClassifications.php?takeDown=yes&sid=<?= $subjects['id'] ?>">TAKE DOWN SUJBECT!</a><br>
						<?php
					}
					?>

					SUBJECT: <?php if ($subjects['subject_information'] != 'empty')
					{

						?>
						<a href="introductionToSubject.php?id=<?= $subjects['table_id'] ?>"><?= $subjects['subject_information'] ?></a><br>
						THE SUBJECT DISPLAYS <?= $subjects['number_of_questions'] ?> QUESTIONS.<br>
						<?php
						if ($subjects['live'] == 0 || $_SESSION['administrator']['root'] == 1) {
							?>

							<br> <a href="fillQuestionnaireOne.php?id=<?= $subjects['table_id'] ?>">ADD QUESTIONS OR ALTER SUBJECT NAME.</a><br><br>
							<a href="deleteAllQuestionsFromSubject.php?id=<?= $subjects['table_id'] ?>">DELETE ALL INFORMATION FROM TABLE ABOVE!</a><br><br>
							<a href="adminSubjectsAndQuestionClassifications.php?updateSubject=<?= $subjects['id'] ?>">UPDATE SUBJECT NAME OR NUMBER OF QUESTIONS!</a></h3><br><br><br>
						<?php } }	else { echo '<br> <a href="fillQuestionair.php?id=' . $subjects['table_id'] . '">FILL SUBJECT!</a>'; }



					}


				}

				if (isset($_SESSION['subject'])) {

					foreach($_SESSION['subjectsFromPage'] as $subjects) {
						echo "here";
						if ($subjects['live'] == 0 && $subjects['id'] == $_SESSION['subject']) {
							$enter = 1;

						}
					}
					if ($enter = 1 || $_SESSION['administrator']['root'] == 1) {
						$questions = $cms->getQuestions()->selectQuestions($_SESSION['subject'], $page, $limit);
						$totalQuestions = $questions[0]['count'];
						$totalPages = ceil($totalQuestions / $limit);
						echo '<a href="classes.php">BACK TO MAIN ADMINISTRATIVE PAGE!</a><br>';
						echo "<h1>" . $_SESSION['subject_information'] . "</h1><br>";
						print_r($questions[1]);
						foreach($questions[1] as $question) {
							?><h3>QUESTION POSSITION:</h3><br><?= $question['question_number'] ?><br>
							<?php
							if ($question['live'] == 0 || $_SESSION['administrator']['root'] == 1) {
								?>


								<a href="reposition_question.php?ids=<?= $question['question_id'] ?>">REPOSSITION QUESTION!</a><br>
								<h4><p><a href="addQuestionInformation.php?name=yes&id=<?= $question['question_id'] ?>">UPDATE QUESTION NAME!</a></p></h4><br>
								<?php
							}
							?>
							<h3>DESCRIPTION OF QUESTION:</h3>
							<h4><p><a href="questionsAndAnswers.php?unset=yes&id=<?= $question['question_id'] ?>"><?= $question['description'] ?></a></p></h4>
							<?php
							if ($question['live'] == 0 || $_SESSION['administrator']['root'] == 1) {
								?>

								<h4><p><a href="addQuestionInformation.php?add=yes&unset=yes&id=<?= $question['question_id'] ?>">ADD QUESTION INFORMATION!</a></p></h4>
								<h4><p><a href="deleteIndividualQuestion.php?delete=<?=$question['question_id'] ?>">DELETE QUESTION!</a></p></h4><br><br><br>
								<?php
							}
							?>


							<?php
						} echo "-";
						for($i = 1; $i <= $totalPages; $i++){
							?>
							<a href="adminSubjectsAndQuestionClassifications.php?page=<?= $i ?>&info=<?= $_SESSION['subject_information'] ?>"><?= $i ?>-</a>
							<?php
						}
					}

				}
				$end = microtime(true);
				echo ($end - $start);
				?>
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
