<?php
$currentPath = dirname(__DIR__); 
include "../includes/header3.php";

if ($_SESSION['administrator']['admin'] == 1) {
	$id = $_GET['delete'] ?? 'no';
	$error = '';
	if ($id != 'no') {
		$result = $cms->getQuestions()->deleteAllEntriesFromAQuesitonInformation($_SESSION['subject'], $id);
		$result2 = $cms->getQuestions()->deleteExactQuestionIds($id);

		if ($result2 > 0) {
			$error .= "<h4>ALL QUESTION DESCRIPTIONS WERE DELETED!</h4><br>";
		} else {
			$error .= "<h4>THERE WAS A PROBLEM DELETING THE QUESTION DESCRIPTIONS.<br>PLEASE TRY AGAIN.</h4>";
		}

	}
	?>
	<div id="main" class="main">

		<div class="heightHeader">
		</div>
		<div class="mainbody">
			<div class="centeredText">
				<?= $error ?? '' ?><br>
				<br>
				<br>

				<a href="questionSets.php">CLICK HERE TO GO BACK TO THE ADMINISTRATIVE SUBJECTS PAGE!</a>

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
