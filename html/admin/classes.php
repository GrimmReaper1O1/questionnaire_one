<?php
$currentPath = dirname(__DIR__);
include "../includes/header3.php";
if ($_SESSION['administrator']['admin'] == 1) {


	$_SESSION['page'] = $_GET['page'] ?? 1;
	unset($_SESSION['live']);
	$limit = 1;
	$letter = $_GET['letter'] ?? 1;
	$error = '';
	$enter = 0;
	if (isset($_GET['unset'])) {
		unset($_SESSION['letter']);
		unset($_SESSION['search']);
		unset($_SESSION['new']);
		unset($_SESSION['updateClassName']);

	}

	if (isset($_GET['reset'])) {

		unset($_SESSION['subject']);
		unset($_SESSION['letter']);
		unset($_SESSION['search']);
		$_SESSION['new'] = 1;
		unset($_SESSION['updateClassName']);
		unset($_SESSION['site']['cId']);
		unset($_SESSION['pageQuestionSets']);
	}
	if (isset($_GET['updateClassName'])) {
		$_SESSION['updateClassName'] = $_GET['updateClassName'];

	}
	if (isset($_GET['desc'])) {
		$_SESSION['site']['cId'] = $_GET['desc'];
	}
	if (isset($_POST['description'])) {
		foreach ($_SESSION['classesOfPage'] as $class) {
			if (($class['live'] == 0 && $class['class_id'] == $_SESSION['class_id']) || $_SESSION['administrator']['root'] == 1) {
				$enter = 1;
			}

		}
		if ($enter == 1) {
			if ($_POST['description'] != '') {
				$result = $cms->getQuestions()->updateClassDescription($_SESSION['site']['cId'], $_POST['description']);
				if ($result == 1) {
					$error .= "THE UPDATE OF DESCRIPTION WAS SUCCESSFULL!<br>";
				}
				else
				{
					$error .= "FOR SOME REASON THE UPDATE OF DESCRIPTION WAS NOT SUCCESSFULL.<br>";
				}

			}
		}
	}
	if (isset($_POST['name'])) {
		foreach ($_SESSION['classesOfPage'] as $class) {
			if (($class['live'] == 0 && $class['class_id'] == $_SESSION['updateClassName']) || $_SESSION['administrator']['root'] == 1) {
				$enter = 1;
			}

		}
		if ($enter == 1) {

			$result = $cms->getQuestions()->updateClassName($_SESSION['updateClassName'], $_POST['name']);

			if ($result > 0) {
				$error .= "THE UPDATE WAS SUCCESSFULL!";
			} else {
				$error .= "THE UPDATE WAS NOT SUCCESSFULL.";
			}
		}
	}
	if (isset($_GET['makeLive'])) {
		foreach ($_SESSION['classesOfPage'] as $class) {
			if (($class['live'] == 0 && $class['class_id'] == $_GET['cid'])  || $_SESSION['administrator']['root'] == 1) {
				$enter = 1;
			}

		}

		if ($enter == 1) {
			$result = $cms->getQuestions()->updateClassMakeLive($_GET['cid']);

			if ($result > 0) {
				$error .= "THE CLASS IS NOW LIVE!<br>";
			} else {
				$error .= "THE CLASS STILL IS NOT LIVE!<br>";
			}

		}
	}
	if (isset($_GET['takeDown'])) {
		foreach ($_SESSION['classesOfPage'] as $class) {
			if (($class['live'] == 0 && $class['class_id'] == $_GET['cid'])  || $_SESSION['administrator']['root'] == 1) {
				$enter = 1;
			}

		}

		if ($enter == 1) {
			$result = $cms->getQuestions()->updateClassNotLive($_GET['cid']);

			if ($result > 0) {
				$error .= "THE CLASS HAS BEEN TAKEN DOWN!<br>";
			} else {
				$error .= "THE CLASS HAS NOT BEEN TAKEN DOWN.<br>";
			}

		}
	}
	if (isset($_GET['letter'])) {
		$_SESSION['letter'] = $_GET['letter'];

	}

	?>
	<div class="heightHeader">
	</div>
	<div id="main" class="main mainbody">
		<br>
		<?php

		if (isset($_SESSION['warningBit']) && $_SESSION['administrator']['admin'] == 1) {
			?>
			<h1 style="font-size: 70px; color: red !important;">WARNING!!!</h1>
			<p><h1 style="font-size: 20px;">The super user administrator@questionnaire.com, otherwise known as the root asministrator has been deleted from the sql database
				anyone who signs up this user will have super user privileges. The system was set up for ease of installation. Please immediatly
				sign in as this user and give the credentials to your headmaster or the head of your organization. It is advisable you do not
				allow people access your SQL database computer at all with this system. If you need to reinstall your database due to catastrophic
				failure the means to do so are within the repository. Alternatively keep the files that came with this website.
				This mesage is for the purpose of protecting personal information.
			</h1>
		</p>
		<?php
	}
	?>



	<div>
		<?php


		if (isset($_SESSION['updateClassName']) || isset($_POST['name'])) {

			foreach ($_SESSION['classesOfPage'] as $class) {
				if (($class['live'] == 0 && $class['class_id'] == $_SESSION['updateClassName']) || $_SESSION['administrator']['root'] == 1) {
					$enter = 1;
				}

			}

			if ($enter == 1) {
				?>

				<div class="margin80">
					<?= $error ?><br>
					<div class="right-align">
						<a href="classes.php?reset=yes">BACK TO CLASSES</a><br>
					</div>
					<div class="marginAuto" id="divSmallField">
						<fieldset class="fieldset1">
							<form action="classes.php?updateClassName=<?= $_SESSION['updateClassName'] ?>" method="POST">
								<label for="name">Name:</label><br>
								<input type="text" name="name" value="<?= $_POST['name'] ?? '' ?>">
								<input type="submit" value="SUBMIT!">

							</fieldset>
						</div>

						<?php

					}
				}



				if((isset($_SESSION['new']) || isset($_SESSION['letter'])) && !isset($_POST['name']) && !isset($_SESSION['updateClassName'])) {
					?>


<div class="margin80">

<div id="letters"></div>
<script src="../script/adminClassesLetterArrayLinks.js"></script>
						</div>
						<div class="headings">
							<h1>Welcome to the administrative functions of questionnaire!</h1><br>
							<h3><a href="classes.php?reset=yes">Please select the class you want to view via alphabetical order.</a><br> <br>
								<!-- <a href="search_for_class.php">Or, search for a class.</a></h3><br> -->
							</div>
							<div class="centeredText">
								<?php
								echo $error;
								?>
							</div>
							<?php

						}

						if (isset($_GET['desc']) || isset($_POST['description'])) {

							?>

							<div class="margin80">
								<?= $error ?>
								<div class="right-align">
									<p>
										<a href="classes.php?reset=yes">BACK TO MAIN PAGE!</a>
									</p>
								</div>


								<fieldset class="fieldset1">


									<form action="classes.php" method="POST">
										<label for="description">PLEASE ENTER NEW DESCRIPTION:</label><br>
										<textarea name="description" cols="50" rows="10">

										</textarea><br>
										<input type="submit" value="SUBMIT!">
									</form>
								</fieldset>



								<?php
							}



							if (isset($_SESSION['letter']) && !isset($_SESSION['updateClassName']) && !isset($_POST['name'])) {
								$classesArray = $cms->getQuestions()->selectAllClassesViaLetter($_SESSION['page'], $limit, $_SESSION['letter']);
								// echo $error;

								if (isset($classesArray[1])) {
									if ($classesArray[0] != false) {
										$totalResults = $classesArray[0]['count'];
										$totalPages = ceil($totalResults / $limit);
										$_SESSION['classesOfPage'] = $classesArray[1];
										?>
										<div class="centeredText">
											<?php
											foreach($classesArray[1] as $class) {
												?><?php if ( $class['live'] == 1 ) { echo "LIVE!<br>"; } else { echo "NOT LIVE!<br>"; }
												if ($_SESSION['administrator']['root'] == 1) { ?>
													<a href="classes.php?makeLive=yes&cid=<?= $class['class_id'] ?>">MAKE CLASS LIVE!</a><br>
													<a href="classes.php?takeDown=yes&cid=<?= $class['class_id'] ?>">TAKE DOWN CLASS!</a><br>
													<?php
												}
												?>

												<h2>
													<a href="subjects.php?unset=yes&cid=<?= $class['class_id'] ?>"><?= $class['class_name'] ?></a></h2>
													<?php if ($class['live'] == 0 || $_SESSION['administrator']['root'] == 1) { ?>
														<a href="classes.php?updateClassName=<?= $class['class_id'] ?>">UPDATE CLASS NAME</a><br><br>
														<a href="delete_class.php?cId=<?= $class['class_id'] ?>">DELETE CLASS</a><br><br>
														<a href="classes.php?unset=yes&desc=<?= $class['class_id'] ?>">CHANGE DESCRIPTION</a><br>
														<?php
													}
													?>
													<h5>Author:</h5><?= $class['author'] ?></h5><br>

													<p><h5>Description:</h5><?php echo paragraph($class['description_of_class']); ?></p><br><br>




													<?php
												} ?>
											</div>

											<?php
											$url = 'classes.php';
											echo get_pagination_links($_SESSION['page'], $totalPages, $url, '');


										} }
									}

									if ((isset($_SESSION['new']) && !isset($_SESSION['updateClassName']) && !isset($_POST['name'])) || isset($_GET['reset']) || (isset($_SESSION['page']) && isset($_GET['cid']))) {
										$classesArray = $cms->getQuestions()->selectAllClasses($_SESSION['page'], $limit);
										if (isset($classesArray[1])) {
											if ($classesArray[0] != false) {
												$totalResults = $classesArray[0]['count'];
												$totalPages = ceil($totalResults / $limit);
												$_SESSION['classesOfPage'] = $classesArray[1];
												?>
												<div class="centeredText">

													<?php
													foreach($classesArray[1] as $class) {
														?><?php if ( $class['live'] == 1 ) { echo "LIVE!<br>"; } else { echo "NOT LIVE!<br>"; }
														if ($_SESSION['administrator']['root'] == 1) { ?>
															<a href="classes.php?makeLive=yes&page=<?= $_SESSION['page'] ?>&cid=<?= $class['class_id'] ?>">MAKE CLASS LIVE!</a><br>
															<a href="classes.php?takeDown=yes&page=<?= $_SESSION['page'] ?>&cid=<?= $class['class_id'] ?>">TAKE DOWN CLASS!</a><br>
															<?php
														}
														?>

														<h2>
															<a href="subjects.php?unset=yes&cid=<?= $class['class_id'] ?>"><?= $class['class_name'] ?></a></h2>
															<?php if ($class['live'] == 0 || $_SESSION['administrator']['root'] == 1) { ?>
																<a href="classes.php?updateClassName=<?= $class['class_id'] ?>">UPDATE CLASS NAME</a><br><br>
																<a href="delete_class.php?cId=<?= $class['class_id'] ?>">DELETE CLASS</a><br><br>
																<a href="classes.php?unset=yes&desc=<?= $class['class_id'] ?>">CHANGE DESCRIPTION</a><br>
																<?php
															}
															?>
															<h5>Author:</h5><?= $class['author'] ?></h5><br>

															<p><h5>Description:</h5><?php echo paragraph($class['description_of_class']); ?></p><br><br>

															<?php
														}
														?>
													</div>


													<?php

													}
												}
											}

											?>
											<div style="height: 1200px;">
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
						<?php if (isset($totalPages)) {
							if ($totalPages > 1) { ?>
								<div id="pagination" class="pagination">

									<?php
									$url = 'classes.php';
									echo '<p>' . get_pagination_links($_SESSION['page'], $totalPages, $url, '') . '<p>';

								}
							}



						} else {
							// header("Location: ../classes.php");
							// exit();
						} ?>
						<div>
							<?php
							include '../includes/footer2.php';1
							?>
						</div>
					</body>
					</html>
