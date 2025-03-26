<?php

$currentPath = dirname(__DIR__); 
include "../includes/header3.php";

if ($_SESSION['administrator']['admin'] == 1) {

	$page = $_GET['page'] ?? 1;
	$limit = 2;
	$error = "";

	if (isset($_GET['unset'])) {
		unset($_SESSION['updateQuestion']);
		unset($_SESSION['updateId']);
		unset($_SESSION['questionId']);

	}

	$enter = 0;




	if ($enter == 1 || $_SESSION['administrator']['root'] == 1 || $_SESSION['subjectsInfo']['live'] == 0) {

		$failureInsert = 0;
		$failureFound = 0;
		$failureUpdate = 0;
		$success = 0;
		$failure = 0;
		$failureLength = 0;
		$failureNumber = 0;


		if (isset($_GET['delete'])) {
			$result = $cms->getQuestions()->deleteQuestion($_GET['delete']);
			if ($result > 0) {
				$error .= "THE DELETION WAS A SUCCESS!";
			} else {
				$error .= "THE DELETION WAS NOT SUCCESSFULL.";
			}
		}
		if (isset($_GET['updateQuestion']) && isset($_GET['id'])) {
			$_SESSION['updateQuestion'] = $_GET['updateQuestion'];
			$_SESSION['updateId'] = $_GET['id'];

		}




	}
	?>	<div id="main" class="main centeredText">
		<div class="heightHeader">
		</div>

		<div class="mainbody">
			<?php

			if ((isset($_GET['id']) || isset($_SESSION['questionId']))) {
				if (isset($_GET['id'])) {
					$_SESSION['questionId'] = $_GET['id'];
				}
				echo $page;
				$questions = $cms->getQuestions()->selectQuestionInformation($_SESSION['questionId'], $page, $limit, $_SESSION['subject']);
				$totalQuestions = $questions[0]['count'];
				$totalPages = ceil($totalQuestions / $limit);
				?>
				<div class="right-align">

					<a href="questionSets.php">BACK TO MAIN ADMINISTRATIVE PAGE!</a><br>
				</div>
				<div class="margin80">
					<div class="centeredText">
						<?php
						if (isset($questions[1][0])) {
							?>




							<?= $error ?>
							<?php


							foreach($questions[1] as $question) {
								if ($_SESSION['live'] == 0) {
									?>
									<h4><a href="questionsAndAnswers.php?delete=<?= $question['id'] ?? '' ?>">DELETE QUESTION!</a></h4><br>
									<h4><a href="updateQuestion.php?updateQuestion=yes&id=<?= $question['id'] ?? '' ?>">UPDATE QUESTION!</a></h4><br>
									<?php
								} ?>

								<h3>CORRECT ANSWER:</h3><br><?= $question['correct'] ?? '' ?><br>
								<h3>QUESTION:</h3><br><p><?php echo paragraph($question['question']) ?> </p><br>
								<h3>POSSIBLE ANSWER ONE:</h3><p><br><?php echo paragraph($question['pa1']) ?> </p><br>
								<h3>ANSWER:</h3><br><p><?php echo paragraph($question['answ1']) ?> </p><br>
							<?php } if ($question['hint1'] != 'empty') { ?>
								<h3>HINT:</h3><br><p><?php echo paragraph($question['hint1']) ?> </p><br>
							<?php } ?>
							<h3>POSSIBLE ANSWER TWO:</h3><br><p><?php echo paragraph($question['pa2']) ?> </p><br>
							<h3>ANSWER:</h3><br><p><?php echo paragraph($question['answ2']) ?> </p><br>
							<?php  if ($question['hint2'] != 'empty') { ?>
								<h3>HINT:</h3><br><p><?php echo paragraph($question['hint2']) ?> </p><br>
								<?php if ($question['pa3'] !== 'empty') { ?>
									<h3>POSSIBLE ANSWER THREE:</h3><br><p><?php echo paragraph($question['pa3']) ?> </p><br>
									<h3>ANSWER:</h3><br><p><?php echo paragraph($question['answ3']) ?> </p><br>
								<?php } if ($question['hint3'] != 'empty') { ?>
									<h3>HINT:</h3><br><p><?php echo paragraph($question['hint3']) ?> </p><br>
								<?php } if ($question['pa4'] != 'empty') { ?>
									<h3>POSSIBLE ANSWER FOUR:</h3><br><?php echo paragraph($question['pa4']) ?> </p><br>
									<h3>ANSWER:</h3><br><p><?php echo paragraph($question['answ4']) ?> </p><br>
								<?php } if ($question['hint4'] != 'empty') { ?>
									<h3>HINT:</h3><br><p><?php echo paragraph($question['hint4']) ?> </p><br>
								<?php } if ($question['pa5'] != 'empty') { ?>
									<h3>POSSIBLE ANSWER FIVE:</h3><br><?php echo paragraph($question['pa5']) ?> </p><br>
									<h3>ANSWER:</h3><br><p><?php echo paragraph($question['answ5']) ?> </p><br>
								<?php } if ($question['hint5'] != 'empty') { ?>
									<h3>HINT:</h3><br><p><?php echo paragraph($question['hint5']) ?> </p><br>
								<?php } if ($question['pa6'] != 'empty') { ?>
									<h3>POSSIBLE ANSWER SIX:</h3><br><p><?php echo paragraph($question['pa6']) ?> </p><br>
									<h3>ANSWER:</h3><br><p><?php echo paragraph($question['answ6']) ?> </p><br>
								<?php } if ($question['hint6'] != 'empty') { ?>
									<h3>HINT:</h3><br><p><?php echo paragraph($question['hint6']) ?> </p><br>
								<?php } if ($question['pa7'] != 'empty') { ?>
									<h3>POSSIBLE ANSWER SEVEN:</h3><br><?php echo paragraph($question['pa7']) ?> </p><br>
									<h3>ANSWER:</h3><br><p><?php echo paragraph($question['answ7']) ?> </p><br>
								<?php } if ($question['hint7'] != 'empty') { ?>
									<h3>HINT:</h3><br><p><?php echo paragraph($question['hint7']) ?> </p><br>
								<?php } if ($question['pa8'] != 'empty') { ?>
									<h3>POSSIBLE ANSWER EIGHT:</h3><br><?php echo paragraph($question['pa8']) ?> </p><br>
									<h3>ANSWER:</h3><br><p><?php echo paragraph($question['answ8']) ?> </p><br>
								<?php } if ($question['hint8'] != 'empty') { ?>
									<h3>HINT:</h3><br><p><?php echo paragraph($question['hint8']) ?> </p><br>
								<?php } ?><br><br>


								<?php
							}
						}?>
					</div>
				</div>
				<?php
			}
			?>

			<div style="height: 1400px; width: 100%;">
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
<div id="pagination">
	<?php
	$url = 'questionsAndAnswers.php';
	echo get_pagination_links($page, $totalPages, $url, '');
	?>
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
</body>
</html>
