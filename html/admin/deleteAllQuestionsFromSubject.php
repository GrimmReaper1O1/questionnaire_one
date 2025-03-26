<?php

include "../includes/header3.php";

if ($_SESSION['administrator']['admin'] == 1) {
	$enter = 0;
	$id = $_GET['id'] ?? 'no';
	$error = '';
	?>
	<div id="main" class="main">

		<div class="heightHeader">
		</div>

		<div class="mainbody">
			<?php

			foreach($_SESSION['subjectsFromPage'] as $subject) {
				if ($subject['live'] == 0 && $subject['table_id'] == $id) {
					$enter = 1;
				}
			}

			if ($enter == 1 || $_SESSION['administrator']['root'] == 1) {
				if ($id != 'no') {
					$result = $cms->getQuestions()->deleteAllEntriesFromQuesitonInformation($id);
					$result2 = $cms->getQuestions()->deleteQuestionIds($id);
					$result3 = $cms->getQuestions()->updateSubjectsTable($id);
					if ($result > 0) {
						$error .= "<h4>ALL ENTRIES WERE DELETED FROM THE QUESTION INFORMATION TABLE IN SUBJECT!</h4><br>";
					} else {
						$error .=  "<h4>THERE WAS A PROBLEM DELETING THE QUESTION INFORMAITON FROM THE TABLE.<br>PLEASE TRY AGAIN.</h4>";
					}
					if ($result2 > 0) {
						$error .=  "<h4>ALL QUESTION DESCRIPTIONS WERE DELETED!</h4><br>";
					} else {
						$error .=  "<h4>THERE WAS A PROBLEM DELETING THE QUESTION DESCRIPTIONS.<br>PLEASE TRY AGAIN.</h4>";
					}
					if ($result3 > 0) {
						$error .=  "<h4>ALL SUBJECTS WERE RESET TO EMPTY!</h4><br>";
					} else {
						$error .=  "<h4>THERE WAS A PROBLEM UPDATING THE SUBJECTS TO EMPTY. <br>PLEASE TRY AGAIN.</h4>";
					}
				}
				?>
				<div class="centeredText">
					<?= $error ?? "" ?>

					<br><a href="adminSubjectsAndQuestionClassifications.php">CLICK HERE TO GO BACK TO THE ADMINISTRATIVE SUBJECTS PAGE!</a>
					<div style="height: 1600px;">
					</div>
				</div>
			</div>
			<div class="copyright">
				
			</div>

			<?php

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
</body>
</html>

<?php
} else {
	header("Location: adminSubjectsAndQuestionClassifications.php");
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
