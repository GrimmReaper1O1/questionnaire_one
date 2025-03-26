<?php
$currentPath = dirname(__DIR__); 
include "../includes/header3.php";
// UNSET($_SESSION['subject_information']);
if ($_SESSION['administrator']['admin'] == 1) {
	if (isset($_GET['id'])) {
		$_SESSION['subject'] = $_GET['id'];
	}

	$_SESSION['gate'] = 'enter';

	for ($i = 1; $i <= 10; $i++) {
		$link['a' . $i] = $_POST['link' . $i] ?? 'empty';
		$description['a' . $i] = $_POST['description' . $i] ?? 'empty';
		$error = '';
		if ($link['a' . $i] == '') {
			$link['a' . $i] = 'empty' ;
		} elseif ($link['a'.$i] == 'empty') {

		} else {
			$link['a' . $i] = str_replace("https://", '', $_POST['link'. $i]);
			$link['a' . $i] = str_replace("https:\\\\", '', $link['a'.$i]);
			$link['a' . $i] = str_replace("www.", '', $link['a'.$i]);
			$link['a' . $i] = 'www.' . $link['a' . $i];
		}
		if ($description['a' . $i] == '') {
			$description['a' . $i] = 'LINK'.$i ;
		}
	}
	$numberOfRemoval = $_POST['removeQuestion'] ?? 1;
	$subjectDescription = $_POST['subjectDescription'] ?? 'empty';
	$numberOfQuestions = $_POST['numberOfQuestions'] ?? '4';
	$failureInsert = 0;
	$failureFound = 0;
	$failureUpdate = 0;
	$success = 0;
	$failure = 0;
	$failureLength = 0;
	$failureNumber = 0;
	$enter = 0;


	?>
	<div id="main" class="main centeredText">

		<div class="heightHeader">
		</div>

		<div class="mainbody">
			<?php




			if (isset($_POST['numberOfQuestions'])) {
				if ($_POST['numberOfQuestions'] >= 1 && $_POST['numberOfQuestions'] <= 40) {
print_r($link);
print_r($_POST);
					$result = $cms->getQuestions()->updateSubjectsInitial($_POST['subjectInformation'], $numberOfRemoval, $numberOfQuestions,
					$link['a1'], $link['a2'], $link['a3'], $link['a4'], $link['a5'], $link['a6'], $link['a7'], $link['a8'],
					$link['a9'], $link['a10'], $description['a1'], $description['a2'], $description['a3'], $description['a4'],
					$description['a5'], $description['a6'], $description['a7'], $description['a8'], $description['a9'], $description['a10'],
					$subjectDescription);
					if ($result > 0) {
						$error .= "<h4>THE UPDATE WAS SUCCESSFULL!</h4><br>";
						$success = 1;
						$_SESSION['subjectQuestions'] = $_POST['numberOfQuestions'];

					} else {
						$error .= "<h4>THE UPDATE WAS NOT SUCCESSFULL.</h4><br>";
						$failure = 1;
					}
				} else { $failureNumber = 1; }

			}
			$row = $cms->getQuestions()->selectSubjectViaTableIdAndClassId();
			$introduction = $row['introduction'] ?? '';
			$_SESSION['subject_information'] = $row['subject_information'];


			// here
			if (isset($_GET['info'])) {
				$_SESSION['info'] = $_GET['info'];
			}
			if (isset($_GET['id']) || isset($_SESSION['subject']) || isset($_POST['subjectName']) || isset($_GET['update']) || isset($_GET['unset'])) {

				if (($row['live'] == 0) || $_SESSION['administrator']['root'] == 1) {

					$enter = 1;

				}
			}

			// update to 0 in order to lock for not live updates.
			if ($row['live'] == 0) {
				$enter = 1;
			}

			if ($enter == 1 && isset($_GET['update'])) {






				if ((isset($_POST['subjectName']) && $success == 0 && ($failure == 1 || $failureNumber == 1
				|| $failureFound == 1 || $failureLength == 1)) || isset($_GET['update'])) {

					if ($failureFound == 1) {
						$error .= "<h4>THE SUBJECT NAME WAS ALREADY ENTERED PREVIOUSLY.</h4>";
					}   if ($failureLength == 1) {
						$error .= "<h4>THE SUBJECT NAME MUST BE FILLED.</h4>";
					}
					if ($failureNumber == 1) {
						$error .= "<h4>THERE WAS A FAILURE TO UPLOAD THE NUMBER OF REMOVAL. IT WAS GREATER THAN 40.</h4>";
					}

					echo "<div class='centeredText'>" . $error . "</div>";


					?>
					<div class="width80">
						<div class="right-align">
							<p><a href="introductionToSubject.php?unset=yes">RETURN TO INTRODUCTION PAGE!</a></p>
						</div>
					</div>


					
						<div class="width70">
							

							<fieldset class="fieldset3">
								<form action="introductionToSubject.php?update=yes" method="POST">
									<label for="subjectInformation">PLEASE ENTER THE SUBJECT NAME.</label><br>
									<input type="text" name="subjectInformation" value="<?php if($row['subject_information'] == 'empty') { echo ''; } else { echo $row['subject_information']; } ?>" size="69"><br>
									<label for="subjectDescription">Subject description:</label><br>
									<textarea rows='40' cols='80' name='subjectDescription'><?= $row['introduction'] ?? "" ?></textarea><br>
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
													<textarea rows='8' cols='80' name='description<?= $i ?>'><?php if($row['link_description' . $i] != 'empty') { echo $row['link_description' . $i]; } ?></textarea><br>
													<?php
												} ?>
												<input type="submit" value="SUBMIT!">
											</from>
										</fieldset>
									</div>
								</div>
							</div>
							<?php
						}




						// here
					} elseif (isset($_GET['update']) && !isset($enter) && !isset($_GET['id']) && !isset($_GET['unset'])) {
						header("Location: classes.php");
						exit;

					}




					
					if ((isset($_GET['id']) || isset($_GET['unset'])) && !isset($_POST['subjectName']) && !isset($_GET['update'])) {
						
						if ($enter == 1) {
							
							?>

							<div class="width100">
								<div class="width100 hightAuto right-align">
									<div class='width40 inline alignLeft'>
										<br><br>
										<span class=''><a href="introductionToSubject.php?update=yes">UPDATE PAGE!</a><br>
										<a href="uploadVideo.php">UPDATE OR UPLOAD A VIDEO FILE!</a><br>
										<a href="uploadAudio.php">UPDATE OR UPLOAD AN AUDIO FILE!</a><br>
										<a href="uploadApendix.php">UPLOAD APPENDIX IMAGE FILE!</a><br>
									</span>
									<br><br><br>
									</div>
								</div>
							</div>
					<?php	} ?>
							<div class="width100">
								<div class="centeredText">
									<h1><a href="questionSets.php?info=<?= $_SESSION['subject_information'] ?? '' ?>&id=<?= $_SESSION['subject'] ?? '' ?>"><?= $_SESSION['subject_information'] ?? '' ?></a></h1><br>


									<?php
									$apendixArray = $cms->getQuestions()->selectFileArray();
									$counter = 0;
									foreach ($apendixArray as $apendix) {
										if ($apendix['image'] == 1) {
											$apendixFloatNum[$counter] = $apendix['float_num'];

											$counter++;
										}
									}

									?>


									<script>
									var floatNum = <?= JSON_encode($apendixFloatNum) ?>;
									</script>

									<?php
									// if ($row['video'] == 1) { // do a pregmatch on the type of file and if matched then choose file with php
									if ($apendixArray != false) {
										if ($apendixArray[0]['video'] == 1) { ?>

											<div class="centeredText">
											<div class="video">	
											<video  style="width: 100%" poster="<?= $row['posterFilename'] ?? '' ?>"
													id="subjectVideo"
													type="video/webm" preload="none"
													controls muted >

													<source src="../uploads/<?= $apendixArray[0]['file_name'] ?? '' ?>" type="video/mp4" />
														<source src="../uploads/<?= $apendixArray[0]['file_name'] ?? '' ?>" type="video/webm" />
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
														<source src="../uploads/<?= $apendixArray[1]['file_name'] ?? '' ?>" type="audio/ogg">
															<source src="../uploads/<?= $apendixArray[1]['file_name'] ?? '' ?>" type="audio/mpeg">
																Your browser does not support the audio element.
															</audio><br>
														<?php } elseif (isset($apendixArray[0]) && $apendixArray[0]['audio'] == 1) {
															?>
															<audio style="width: 100%;" controls>
																<source src="../uploads/<?= $apendixArray[0]['file_name'] ?? '' ?>" type="audio/mpeg">
																	<source src="../uploads/<?= $apendixArray[0]['file_name'] ?? '' ?>" type="audio/ogg">
																		Your browser does not support the audio element.
																	</audio><br>
																	<?php
																}
																?>
																<?= $error ?? '' ?>
															</div>

															<?php
														}
													if ($enter == 0) {
														?>

														<div class="width80">
															<?php
														}
														?>
														<div>
															<div class="floatLeft width70 height100 centeredText">




																<?php echo ' <p>' . paragraph($introduction) . '</p> '; ?>


																<div class="centeredText">
																	<p>
																		<?php
																		for ($i = 1; $i <= 10; $i++) {
																			if ($row['link' . $i] != 'empty') {
																				?>
																				<a href="https:\\<?= $row['link' . $i] ?>"><?= $row['link_description' . $i] ?></a><br>
																				<?php
																			}

																		}?>
																	</p>
																</div>
															</div>
															<div class="floatLeft width30 height100 centeredText">

																<?php
																if (isset($apendixArray)) {
																if ($apendixArray != false && ($apendixArray[0]['image'] == 1 || (isset($apendixArray[1]) && $apendixArray[1]['image'] == 1) || (isset($apendixArray[2]) && $apendixArray[2]['image'] == 1))) {
																	$i = 0;
																	foreach ($apendixArray as $apendix){
																		if($apendix['image'] == 1) {
																			?>
																			<div style="width: 100%; display: block;">
																				<figure>
																					<img id="<?= $i ?>"  class="apendix" src="../uploads/<?= $apendix['file_name'] ?? '' ?>" style="object-fit: contain;" alt="<?= $apendix['alt_text'] ?? '' ?>" width="100%" />
																					<figcaption>Appendix <?= round($apendix['float_num'], 4) ?? 'Not listed.' ?> </figcaption>
																				</figure>
																			</div>
																			<?php
																			$i++;
																		}
																	}
																}
															}
																?>
															</div>



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



									<questionnaire_10.2_stable_questionnaire_for_page_refresh_added_functionnality/div>
								</div>
								<div id="imageDiv">
									<div id="img" ><div id="placement" class="centeredText"></div></div>
									<div id="buttons centeredText marginAuto"></div>
									<div class="inline width100">
										<div id="one"><button id="left">Left</button></div><div id="cDiv"></div><div id="two"><button id="right">Right</button></div>
									</div>
								</div>
							</div>
							<div>
								<?php
								include '../includes/footer2.php'; ?>
							</div>
							<script src="../script/showImage.js"></script>
						</body>
						</html>
						<?php

					} else {
						header("Location: ../classes.php");
						exit;
					}
