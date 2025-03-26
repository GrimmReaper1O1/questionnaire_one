<?php
$currentPath = dirname(__DIR__); 
include "includes/header3.php";
$cId = $_GET['cId'] ?? $_SESSION['site']['cId'];
$_SESSION['site']['cId'] = $cId;
$page = $_GET['page'] ?? 1;
$limit = 10;
$error = '';

?>
<div id="main" class="main">
	<div class="selectSubject">


		<div class="heightHeader">
		</div>
<?php
echo $_SESSION['site']['cId'];
?>




		<div class="mainbody2" >
			<br>
			<div class="centeredText">

				<?php

				if (isset($_GET['cId'])) {
					
					$subjectsArray = $cms->getQuestions()->selectAllFromSubjectsLive($_SESSION['site']['cId']);

					if (isset($subjectsArray)) {

						foreach($subjectsArray as $subjects) {

							if ($subjects['subject_information'] != 'empty')
							{ echo '<h3>SUBJECT:<br> <a href="introductionToSubject.php?unset=yes&id=' . $subjects['table_id'] . '">' . $subjects['subject_information'] . '</a>'; }
							if ($subjects['subject_information'] != 'empty') { ?></h3><p>
								The subject requires you answer the multiple choice questions <?php if ($subjects['number_of_removal'] > 1)
								{ echo $subjects['number_of_removal'] . " times"; } else { echo $subjects['number_of_removal'] . " time "; } ?>
								per question set to progress through the page.</p>

								<?php

							}
						}
					}
				}


				?>
			</div>
			<div style="height: 1800px;">

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
<div class="copyright">
	<?php
	include "includes/footer2.php";
	?>
</div>
</div>
</div>
</body>
</html>
<?php
echo $_SESSION['site']['cId'];
