<?php
$currentPath = dirname(__DIR__); 
include "../includes/header3.php";
if (isset($_GET['id'])) {
	unset($_SESSION['pageQuestionSets']);
}
if ($_SESSION['administrator']['admin'] == 1) {
	$error = '';
	$enter = 0;
	if (isset($_GET['unset'])) {
		unset($_SESSION['pageQuestionSets']);
	}
	?>

	<?php
	if (isset($_GET['page'])) {
		$page = isset($_GET['page']) ? $_GET['page'] :  $_SESSION['pageQuestionSets'];
		$_SESSION['pageQuestionSets'] = $page;
	} elseif (isset($_SESSION['pageQuestionSets'])) {
		$page = $_SESSION['pageQuestionSets'];

	} else {
		$page = 1;
	}
	$limit = 15;
	$error = '';

	if (isset($_GET['id'])) {
		$_SESSION['subject'] = $_GET['id'];
	}
	$start = microtime(true);
	?>
	<div id="main" class="main">

		<div class="heightHeader">
		</div>
		<div class="mainbody">
			<div class="right-align">
				<div class="margin80"><p>
					<a href="subjects.php">BACK TO MAIN ADMINISTRATIVE PAGE!</a><br></p>
				</div>
			</div>
			<div id="mainBody" class="centeredText">
				<div class="centeredText">
					<h1><?= $_SESSION['subject_information'] ?></h1><br>
					<a href="fillQuestionnaireOne.php?id=<?= $_SESSION["subject"] ?? ''?>">ADD QUESTIONS OR ALTER SUBJECT NAME.</a><br><br>

					<?php

					if (($_SESSION['administrator']['admin'] == 1) && (isset($_SESSION['site']['cId']) && isset($_SESSION['subject']))) {
						$questions = $cms->getQuestions()->selectQuestions($_SESSION['subject'], $page, $limit);
						if (isset($questions[1][0])) {
							if (!isset($_SESSION['live'])) {
								$_SESSION['live'] = $questions[1][0]['live'];
							}
							$totalQuestions = $questions[0]['count'];
							$totalPages = ceil($totalQuestions / $limit);
							
							foreach($questions[1] as $question) {
								?>
								<br><?= round($question['question_number'], 3) ?><br>
								<?php
								if ($question['live'] == 0) {
									?>


									<a href="reposition_question.php?ids=<?= $question['question_id'] ?>">REPOSSITION QUESTION!</a><br>

									<?php
								}
								?>
								<h3>DESCRIPTION OF QUESTION:</h3>
								<h1><p><a href="questionsAndAnswers.php?unset=yes&id=<?= $question['question_id'] ?>"><?= $question['description'] ?></a></p></h1>
								<?php
								if ($question['live'] == 0) {
									?>
									<h4><p><a href="addQuestionInformation.php?name=yes&id=<?= $question['question_id'] ?>">UPDATE QUESTION NAME!</a></p></h4>
									<h4><p><a href="fillQuestionnaireThree.php?id=<?= $question['question_id'] ?>">ADD QUESTION INFORMATION!</a></p></h4>
									<h4><p><a href="deleteIndividualQuestion.php?delete=<?=$question['question_id'] ?>">DELETE QUESTION!</a></p></h4><br><br><br>

									<?php
								}
								?>


								<?php
							}
							?>
						</div>
					</div>
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
	<div id="pagination"><span style="text-align: center;">
		<?php
	}
	$url = 'questionSets.php';
	if (isset($totalPages)) {
		echo get_pagination_links($page, $totalPages, $url, '&info='.$_SESSION['subject_information']);
	}
	?>
</span>
</div>
<?php

} else {
	header("Location: classes.php?reset=yes");
	exit;
}


$end = microtime(true);
echo ($end - $start);

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