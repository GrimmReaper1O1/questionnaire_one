<?php
$currentPath = dirname(__DIR__); 
include "../includes/header3.php";

if ($_SESSION['administrator']['admin'] == 1) {
	if (isset($_GET['page'])) {
		$page = isset($_GET['page']) ? $_GET['page'] :  $_SESSION['pageQuestionSets'];
		$_SESSION['pageQuestionSets'] = $page;
	} elseif (isset($_SESSION['pageQuestionSets'])) {
		$page = $_SESSION['pageQuestionSets'];

	} else {
		$page = 15;
	}
	$limit = 1;
	$error = '';
	if (isset($_GET['ids'])) {
		$_SESSION['ids'] = $_GET['ids'];
	}


	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$count = $cms->getQuestions()->updateQuestionDescriptionPossition($_SESSION['ids'], $_POST['possition']);

		if ($count > 0) {
			$error .= "THE UPDATE WAS A SUCCESS!";
		} else {
			$error .= "THE UPDATE FAILED.";
		}





	}


	if ($_SESSION['live'] == 0) {
		$enter = 1;

	}



	if (( $enter == 1 || $_SESSION['administrator']['root'] == 1) && (isset($_SESSION['site']['cId']) && isset($_SESSION['subject']))) {

		$row = $cms->getQuestions()->selectQuestionDescriptionViaQuestionId($_SESSION['ids']);
		?>
		<div id="main" class="main">

			<div class="heightHeader">
			</div>

			<div class="mainbody">
				<div class="width80">
					<div style="text-align: right;">
					<a href="questionSets.php">RETURN TO QUESTION SETS!</a><br>
						</div>
					<div class="centeredText">
						<?= $error ?><br>
						<fieldset class="fieldset3">
							<form action="reposition_question.php" method="POST">
								<label for="possiton">NUMBER TO REPOSSITON TO:</label><br>
								<input type="text" name="possition" size="20" value="<?= $_POST['possition'] ?? '' ?>">
								<input type="submit" value="SUBMIT!">
							</form>
						</fieldset>
					</div>
					<div class="centeredText">
						<?php echo $_SESSION['subject'];
						if (isset($_GET['id']) || isset($_SESSION['subject'])) {
							

							$subject = $cms->getQuestions()->selectSubjectViaTableIdAndClassId();
							$questions = $cms->getQuestions()->selectQuestions($_SESSION['subject'], $page, $limit);
							$totalQuestions = $questions[0]['count'];
							$totalPages = ceil($totalQuestions / $limit);
							//echo '<a href="adminSubjectsAndQuestionClassifications.php">BACK TO MAIN ADMINISTRATIVE PAGE!</a><br>';
							echo "<h1>" . $subject['subject_information'] . "</h1><br></div><div class='centeredText'>";
							print_r($questions);
							foreach($questions[1] as $question) {

								?> <h3>QUESTION POSSITION:<br><?= round($question['question_number'], 2 ) ?><br>
									<a href="reposition_question.php?ids=<?= $question['question_id'] ?>">REPOSSITION QUESTION!</a><br>
									DESCRIPTION OF QUESTION:</h3><br>
									<h4><p><a href="questionsAndAnswers.php?id=<?= $question['question_id'] ?>"><?= $question['description'] ?></a></p></h4><br><br><br>

									<?php
								}
								?>
							</div>
						</div>
						<div style="height: 1200px">
						</div>
					</div>
					<?php
					if (isset($_SESSION['site']['enableMovingBars'])) {
						if ($_SESSION['site']['enableMovingBars'] == 0) {

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
		<div id="pagination">
			-<?php

			for($i = 1; $i <= $totalPages; $i++){
				?><a href="reposition_question.php?page=<?= $i ?>"><?= $i ?>-</a>
				<?php
			}
			?>
		</div>
		<?php

	}
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
	header("Location: classes.php?reset=yes");
	exit;
}
} else {
	header("Location: how_d../classesre_you.php");
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
