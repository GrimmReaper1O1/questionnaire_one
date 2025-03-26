<?php
$currentPath = dirname(__DIR__);
include "../includes/header3.php";

if ($_SESSION['administrator']['admin'] == 1) {
	$error = '';
	$enter = 0;

	unset($_SESSION['live']);
	if (isset($_GET['page'])) {
		$page = isset($_GET['page']) ? $_GET['page'] : $_SESSION['pageSubjects'] ;
		$_SESSION['pageSubjects'] = $page;
	} elseif (isset($_SESSION['pageSubjects'])) {
		$page = $_SESSION['pageSubjects'];

	} else {
		$page = 1;
	}



	$limit = 15;
	$error = '';
	if (isset($_GET['unset'])) {
		unset($_SESSION['subject']);

		unset($_SESSION['subject_information']);
	}
	if (isset($_GET['cid'])) {


			$_SESSION['site']['cId'] = $_GET['cid'];


	}

	$start = microtime(true);


	if (isset($_GET['makeLive']) || isset($_GET['sid'])) {
		$subject = $cms->getQuestions()->selectSubjectViaId($_GET['sid']);
		if (($subject['live'] == 0) ) {

			$enter = 1;

		}
	}





	if (($enter == 1 || $_SESSION['administrator']['root'] == 1) && isset($_SESSION['site']['cId'])) {
		if (isset($_GET['makeLive'])) {
			$result = $cms->getQuestions()->updateSubjectMakeLive($_GET['sid']);

			if ($result > 0) {
				$error .= "THE SUBJECT IS NOW LIVE!<br>";
			} else {
				$error .= "THE SUBJECT STILL IS NOT LIVE!<br>";
			}

		}


		if (isset($_GET['takeDown'])) {
			$result = $cms->getQuestions()->updateSubjectNotLive($_GET['sid']);

			if ($result > 0) {
				$error .= "THE SUBJECT HAS BEEN TAKEN DOWN!<br>";
			} else {
				$error .= "THE SUBJECT HAS NOT BEEN TAKEN DOWN.<br>";
			}
		}

	}




	?>
	<div id="main" class="main centeredText">

		<div class="heightHeader">
		</div>
		<div class="mainbody">
			<div  class="margin80">
				<?php







				$subjectsArray = $cms->getQuestions()->selectAllFromSubjectsAdmin($_SESSION['site']['cId']);
				echo $error;
				echo "<h1>SELECT THE SUBJECT TO ALTER</h1><br>";
				$_SESSION['subjectsFromPage'] = $subjectsArray;

				foreach($subjectsArray as $subjects) {



					?>
					<?php if ($subjects['live'] == 1) { echo "LIVE!<br>"; } else { echo "NOT LIVE!<br>"; }
					if ($_SESSION['administrator']['root'] == 1) {?>
						<a href="subjects.php?makeLive=yes&sid=<?= $subjects['id'] ?>">MAKE SUJBECT LIVE!</a><br>
						<a href="subjects.php?takeDown=yes&sid=<?= $subjects['id'] ?>">TAKE DOWN SUJBECT!</a><br>
						<?php
					}
					?>

					<?php if ($subjects['subject_information'] != 'empty')
					{

						?>
						<h2><a href="introductionToSubject.php?id=<?= $subjects['table_id'] ?>"><?= $subjects['subject_information'] ?></a><br></h2>
						<h3>THE SUBJECT DISPLAYS <?php echo $subjects['number_of_questions'];  if ($subjects['number_of_questions'] == 1) { echo " QUESTION"; }
						else { echo " QUESTIONS"; } ?></h3><br>
						<?php
						if ($subjects['live'] == 0) {
							?>

							<br><h3> <a href="fillQuestionnaireOne.php?id=<?= $subjects['table_id'] ?>">ADD QUESTIONS OR ALTER SUBJECT NAME.</a><br><br>
							<a href="deleteAllQuestionsFromSubject.php?id=<?= $subjects['table_id'] ?>">DELETE ALL INFORMATION FROM TABLE ABOVE!</a><br><br>
							<a href="updateSubject.php?updateSubject=<?= $subjects['id'] ?>">UPDATE SUBJECT NAME OR NUMBER OF QUESTIONS!</a></h3><br><br><br>
						<?php } }	else { echo '<br> <a href="fillQuestionnaireOne.php?id=' . $subjects['table_id'] . '">FILL SUBJECT!</a><br><br>'; }



					}

					?>
					<div style="height: 1600px;">
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
