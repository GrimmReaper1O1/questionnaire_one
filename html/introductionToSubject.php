<?php
$currentPath = dirname(__DIR__); 
include "includes/header3.php";

if (isset($_GET['id'])) {
	unset($_SESSION['startTime']);
	$_SESSION['startTime'] = microtime(true);
	$id = $_GET['id'] ?? $_SESSION['subject'];
	$_SESSION['subject'] = $id;

}
$_SESSION['gate'] = 'enter';
unset($_SESSION['countedIds']);
if (isset($_GET['id'])) {
	$row = $cms->getQuestions()->selectSubjectViaTableIdAndClassId();

	$_SESSION['version'] = $row['version'];
	$_SESSION['numberOfQuestionsOnPage'] = $row['number_of_questions'];
	$_SESSION['numeralOfRem'] = $row['number_of_removal'];


	$introduction = $row['introduction'] ?? '';
}

$apendixArray = $cms->getQuestions()->selectFileArray();
$counter = 0;

foreach ($apendixArray as $apendix) {
	if ($apendix['image'] == 1) {
	
		$apendixFloatNum[$counter] = $apendix['float_num'];
		
		$counter++;
	}
}80


?>


<script>
var floatNum = <?php if (isset($apendixFloatNum)) { echo JSON_encode($apendixFloatNum); } else { echo 1;} ?>;
</script>


<div id="main" class="main">
<?php 
print_r($_SESSION['layoutOfSite']);
?>
	<div class="heightHeader">
	</div>
	<div id="selectSubject" class="mainbody">
		<br>

		<div class="centeredText"><h1><?= ' ' . $row['subject_information'] ?? '' ?></h1><br><br>
			<h1><i><a href="questionnaireBuf.php">ENTER SUBJECT.</a></i></h1><br>

			<br>
			<br>
		</div>
		<div class="margin100">
			<?php
			// if ($row['video'] == 1) { // do a pregmatch on the type of file and if matched then choose file with php

			if ($apendixArray != false) {
				if ($apendixArray[0]['video'] == 1) { ?>

					<div class="centeredText">
					<div class="video">	
				
					<video style="width: 100%" poster="<?= $row['posterFilename'] ?? '' ?>"
							id="subjectVideo"
							type="video/webm" preload="none"
							controls
							muted >

							<source src="uploads/<?= $apendixArray[0]['file_name'] ?? '' ?>" type="video/mp4" />
								<source src="uploads/<?= $apendixArray[0]['file_name'] ?? '' ?>" type="video/webm" />
								</video><br>
							</div>
				</div>
							<?php
						}
					} ?>

					<div style="height: 50px">
					</div>


					<?php
					if ($apendixArray != false) {
						if (isset($apendixArray[1]) && $apendixArray[1]['audio'] == 1) { ?>
							<audio style="width: 100%;" controls>
								<source src="uploads/<?= $apendixArray[1]['file_name'] ?? '' ?>" type="audio/ogg">
									<source src="uploads/<?= $apendixArray[1]['file_name'] ?? '' ?>" type="audio/mpeg">
										Your browser does not support the audio element.
									</audio><br>
								<?php } elseif ($apendixArray[0]['audio'] == 1) {
									?>
									<audio style="width: 100%;" controls>
										<source src="uploads/<?= $apendixArray[0]['file_name'] ?? '' ?>" type="audio/ogg">
											<source src="uploads/<?= $apendixArray[0]['file_name'] ?? '' ?>" type="audio/mpeg">
												Your browser does not support the audio element.
											</audio><br>
											<?php
										}
									}
									?>

								</div>
								<div style="height: 50px">
								</div>
								<div id="content">
									<div style="display: flex; width: 100%;">
										<div class="leftSideInner" style="text-align: justify !important;" >	<div id="textBoxes"><?php echo '<p><h3>' . paragraph($introduction) . '</h3></p>'; ?><br>
											<?php
											for ($i = 1; $i <= 10; $i++) {
												if ($row['link' . $i] != 'http:/\/\www.') {
													//remember to link colour with question set colour field.

													?>
													<p ><a  style="color: black !important;" href="http:\\<?= $row['link' . $i] ?>"><?= $row['link_description' . $i] ?></a></p><br>
													<?php
												}
											}
											?>

											<br>
										</div>
									</div>
									<div class="rightSideInner">
										<?php
										if ($apendixArray != false && ($apendixArray[0]['image'] == 1 || (isset($apendixArray[1]) && $apendixArray[1]['image'] == 1) || (isset($apendixArray[2]) && $apendixArray[2]['image'] == 1))) {

											$i = 0;
											foreach ($apendixArray as $apendix){
												if($apendix['image'] == 1) {
													?>
													<div style="width: 100%; display: block;">
														<figure>
															<img id="<?= $i ?>"  class="apendix" src="uploads/<?= $apendix['file_name'] ?? '' ?>" alt="<?= $apendix['alt_text'] ?? '' ?>" width="100%" />
															<figcaption>Appendix <?= round($apendix['float_num'], 4) ?? 'Not listed.' ?> </figcaption>
														</figure>
													</div>
													<?php
													$i++;
												}
											}
										}
										?>
									</div>
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
			<div id="imageDiv">
				<div id="img"><div id="placement"></div></div>
				<div id="buttons"></div>
				<div id="one"><button id="left">Left</button></div><div id="cDiv"></div><div id="two"><button id="right">Right</button></div>
			</div>
			<script src="script/showImage.js"></script>
			<div class="copyright">
				<?php
				include "includes/footer.php";
				?>
			</div>
		</body>
		</html>
