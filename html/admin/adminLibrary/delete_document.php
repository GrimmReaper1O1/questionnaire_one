<?php
$currentPath = dirname(__DIR__); 
include "../../includes/header3.php";
if ($_SESSION['administrator']['root'] == 1) {
	$resultsPerPage = 1;

	$letter = $_GET['letter'] ?? 1;
	$f = 0;
	$sF = 0;
	$error = '';
	$sA = 0;
	$sD = 0;
	$sT = 0;
	$limit = 20;
	$yN = $_POST['yN'] ?? 'no';


	if (isset($_GET['unset'])) {
		unset($_SESSION['title']);
		unset($_SESSION['authors']);
		unset($_SESSION['description']);
		unset($_SESSION['letter']);
		unset($_SESSION['alphabet']);
		unset($_SESSION['page']);
		unset($_SESSION['class2']);
		unset($_SESSION['class_id']);

	}

	if (isset($_GET['reset'])) {
		unset($_SESSION['title']);
		unset($_SESSION['authors']);
		unset($_SESSION['description']);
		unset($_SESSION['letter']);
		unset($_SESSION['alphabet']);
		unset($_SESSION['page']);
		unset($_SESSION['class2']);
		unset($_SESSION['class_id']);
		unset($_SESSION['c_id']);
		$_SESSION['alphabet'] = 1;

	}



	$_SESSION['page'] = isset($_GET['page']) ? $_GET['page'] : 1;

	if (isset($_GET['c_id'])) {
		$_SESSION['class_id'] = $_GET['c_id'];

	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {


		if (isset($_POST['c_id']) && !isset($_GET['delete'])) {
			$nC = 1;

		}
	}

	if (isset($_GET['letter']) && !isset($_GET['delete'])) {

		$_SESSION['letter'] = $_GET['letter'];
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_GET['delete'])) {
		if (isset($_POST['title']) || isset($_POST['authors']) || isset($_POST['description']) || isset($_POST['c_id'])) {
			if ($_POST['title'] != '') {

				$_SESSION['title'] = $_POST['title'];

			}
			if ($_POST['author'] != "") {

				$_SESSION['authors'] = $_POST['author'];

			}
			if ($_POST['description'] != '') {

				$_SESSION['description'] = $_POST['description'];

			}
			if ($_POST['c_id'] != '') {

				$_SESSION['class2'] = $_POST['c_id'];

			}
		}
	}
	if (isset($_SESSION['alphabet']) && $_SESSION['alphabet'] != 1) {
		$array = $cms->getLibrary()->searchAlphabeticallyPaginationNC($limit);
		$totalResults = $array[0]['count'];
		$totalPages = ceil($totalResults / $limit);

	}

	if (isset($_SESSION['letter'])) {
		$array = $cms->getLibrary()->searchViaLetterPaginationNC($limit);
		$totalResults = $array[0]['count'];
		$totalPages = ceil($totalResults / $limit);

	}



	if (isset($_SESSION['title'])) {
		if ($nC = 1) {
			$array = $cms->getLibrary()->selectTitleFromLibraryNC($limit);
		} else {
			$array = $cms->getLibrary()->selectTitleFromLibrary($limit);
		}
		$totalResults = $array[0]['count'];
		$totalPages = ceil($totalResults / $limit);



	}

	if (isset($_SESSION['authors'])) {
		if ($nC = 1) {
			$array = $cms->getLibrary()->selectAuthorFromLibraryNC($limit);
		} else {
			$array = $cms->getLibrary()->selectAuthorFromLibrary($limit);
		}
		$totalResults = $array[0]['count'];
		$totalPages = ceil($totalResults / $limit);
	}

	if (isset($_SESSION['description'])) {
		if ($nC = 1) {
			$array = $cms->getLibrary()->selectDescriptionFromLibraryNC($limit);
		} else {
			$array = $cms->getLibrary()->selectDescriptionFromLibrary($limit);
		}
		$totalResults = $array[0]['count'];
		$totalPages = ceil($totalResults / $limit);
	}



	if (isset($_SESSION['class_id']) || isset($_SESSION['c_id'])) {
		unset($_SESSION['class2']);
		if (isset($_SESSION['class_id'])) {
			$_SESSION['c_id'] = $_SESSION['class_id'];

			unset($_SESSION['class_id']);

		}
		$array = $cms->getLibrary()->searchAlphabeticallyPagination($limit);

		$totalResults = $array[0]['count'];
		$totalPages = ceil($totalResults / $limit);

	}

	if (isset($_SESSION['class2'])) {

		$array2 = $cms->getLibrary()->selectClassFromLibraryPagination($limit);

		$totalResults = $array2[0]['count'];
		$totalPages = ceil($totalResults / $limit);


	}












	if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_GET['delete'])) {

		if (isset($_POST['title'])) {

			if ($_POST['title'] != '' && $_POST['author'] != '' && $_POST['description'] == '') {
				$f = 1;
			}
			if ($_POST['title'] != '' && $_POST['author'] == '' && $_POST['description'] != '') {
				$f = 1;
			}
			if ($_POST['title'] == '' && $_POST['author'] != '' && $_POST['description'] != '') {
				$f = 1;
			}
			if ($_POST['title'] != '' && $_POST['author'] != '' && $_POST['description'] != '') {
				$f = 1;
			}


		}
	}







	if (isset($array)) {
		if ($array == false) {
			$sF = 1;
		}
	}

	if (isset($array2)) {
		if ($array2 == false) {
			$sF = 1;
		}
	}


	$letterString = 'A B C D E F G H I J K L M N O P Q R S T U V W X Y Z';

	$letterArray = preg_split('/[\s]+/', $letterString);




	if ($f === 1) {
		$error .= "You can't search for more than one option. <br>";
		unset($array);
	}

	if ($sF === 1) {
		$error .= "There was a problem. The search failed to find anything. <br>";
		unset($array);
	}
	?>
	<div id="main" class="main">

		<div class="heightHeader">
		</div>

		<div class="mainbody">
			<div class="centeredText">
				<?= $error ?? '' ?>
				<br><br>
				<?php
				if(isset($_GET['unset']) || isset($_GET['reset']) || isset($_SESSION['c_id']) || isset($_SESSION['class2'])) {
					?>
					<h2>Search classes via letter</h2><br>
					<?php
					foreach($letterArray as $letters) { ?>
						<?= "-" ?><a href="delete_document.php?unset=yes&letter=<?= $letters ?>"><?= $letters ?></a><?= "-" ?>
						<?php
					} ?>
				</div>
				<br><br>
				<div class='margin50'>
					<fieldset class='fieldset2'>
						<form action="delete_document.php?reset=yes" method="POST">
							<p>
								<label for='c_id'>Class name</label></p>
								<input class="width100" type="text" name='c_id' size="100">
								<p><label for="title">Title</label></p>
								<input class="width100" type="text" name="title" size="100" value="<?= $_SESSION['title'] ?? '' ?>">
								<p><label for="author">Author or authors</label></p>
								<input class="width100" type="text" name="author" size="100" value="<?= $_SESSION['authors'] ?? '' ?>">
								<p><label for="description">Description</label></p>
								<input class="width100" type="text" name="description" size="100" value="<?= $_SESSION['description'] ?? '' ?>">

								<div class="submit-middle"><br>  <input type="submit" value="SUBMIT!"></div></div>
							</form>
						</fieldset>

						<?php

						if (isset($array)) {

							if ($array[1] != false) {
								?><div class=" marginAuto centeredText">
									<?php
									foreach($array[1] as $documents) { ?>
										<div style="border-bottom: 2px solid;">
											<br>ID:<?= $documents['id'] ?><br>

											<div class="width50 marginAuto centeredText"><a href="<?= '../' . $documents['file_location']?>">VIEW DOCUMENT</a></div><br><br>

											<div>Title:</div> <div><?= $documents['title'] ?></div><br>
											<div>Authors: </div><div ><?= $documents['authors'] ?></div><br>

											<a href="delete_document.php?id=<?= $documents['id'] ?>"><br>DELETE DOCUMENT!</a><br><br>
											<div class="centeredText"><br>Description:</div><?php
											$description = paragraph($documents['description']);
											?>
											<div class="settings">

												<?PHP

												echo '<p>' . $description . '</p>'; ?></div><br><br>

											</div>
										<?php }
										?>
									</div>
									<div id="pagination">
										<?php
										echo "-";
										for ($i = 1; $i <= $totalPages; $i++) {
											echo '<a href="delete_document.php?page=' . $i . '">' . $i . '</a> - ';
										}
										?>
									</div>
									<?php
								}
							}

							if (isset($array2)) {

								if ($array2[1] != false) {
									foreach($array2[1] as $documents) { ?>

										<div class="margin40  centeredText">
											<div class="settings5">Class Name:</div><div class="settings6"><a href="delete_document.php?class=<?= $documents['class_id'] ?>"><?= $documents['class_name'] ?></a></div><br>
										</div>

									<?php }?>
									<div id="pagination">
										<?php
										echo "-";
										for ($i = 1; $i <= $totalPages; $i++) {
											echo '<a href="delete_document.php?page=' . $i . '">' . $i . '</a> - ';
										}
										?>
									</div>
									<?php
								}
							}

						}
						if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['title'])) {
							if ($_POST['yN'] == 'yes' || $_POST['yN'] == 'YES') {
								if (isset($_SESSION['deleteLibId'])) {
									try {

										unlink("../../uploads/" . $_SESSION['file_location']);
									} catch (Exception $e) {
										$error .= "THERE WAS NO FILE ON THE SERVER TO DELETE!";
									}
									if ($cms->getLibrary()->deleteFromLibraryViaId($_SESSION['deleteLibId']) > 0) {
										// remove upon foreign key entry
										$cms->getLibrary()->deleteKeywordsViaLibraryId($_SESSION['deleteLibId']);
										$error .= "The document was successfully deleted! ";

										unset($array);
										unset($_SESSION['file_location']);
										unset($_SESSION['deleteLibid']);
									} else {
										$error .= "THERE WAS A PROBLEM. PLEASE TRY AGAIN OR CONTACT YOUR ADMINISTRATOR.";
									}
									?>
									<div class="centeredText"><br><br><br><br>
										<?= $error ?? '' ?><br>
										<br>
										<p><a href="delete_document.php?unset=yes&reset=yes">Return to library.</a></p>
									</div>
								</div>
								<?php
							}
						} else {
							?>
							<div class="centeredText"><br><br><br><a href="delete_document.php?reset=yes">Return to library!</a></div>
							<?php
						}
					}
					if (isset($_GET['id']) && !isset($_GET['nq'])) {

						$_SESSION['deleteLibId'] = $_GET['id'];
						$document = $cms->getLibrary()->selectFromLibraryViaId($_SESSION['deleteLibId']);
						$_SESSION['file_location'] = $document['file_location'];

						if (isset($document)) {
							?>
							<div class="width100">
								<div class="centeredText">
									<?= $error ?? '' ?><br>
									<h4>Are you sure the document by the title of <?= $document['title'] ?><br>
										is the document you want to delete from the system?</h4>
									</div>
									<div class="margin50 centeredText">
										<fieldset class="fieldset1">
											<div>
												<form action="delete_document.php?id=<?= $document['id'] ?? '' ?>&nq=yes" method="POST">
													<div><label for="yN">YES OR NO?<br></label></div>
													<div class="paddingTop5" ><input type="text" name="yN"><br></div>
													<div class="paddingTop5" class="submit-middle"><input type="submit" value="submit"></div>
												</div>
											</form>
										</fieldset>

										<div class="margin20 marginAuto centeredText">

											<div class="centeredText"><a href="<?= '../' . $document['file_location']?>">VIEW DOCUMENT</a></div><br>
											<div class="settings5">Title:</div> <div class="settings5"><?= $document['title'] ?></div><br>
											<div class="settings5">Authors: </div><div style="padding-left:4px;" class="settings5"><?= $document['authors'] ?></div><br>
											<div class="centeredText"><br>Description:</div><div><?php
											$description = paragraph($document['description']);
											?>
											<div class="settings">

												<?= '<p>' . $description . '</p>' ?? '' ?></div><br><br>

											</div>
										</div>
									</div>
								</div>
							</div>

						<?php }
					}
					?>
					<div style="height: 1200px;">
					</div>
				</div>
			</div>


			<?php



			if (isset($_SESSION['layoutOfSite']['enableMovingBars'])) {
				if ($_SESSION['layoutOfSite']['enableMovingBars'] == 0) {

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
</div>
<?php
} else {
	header("Location: ../../classes.php");
	exit();
}
?>

<div>
	<?php include '../../includes/footer2.php'; ?>
</div>
</body>
</html>
