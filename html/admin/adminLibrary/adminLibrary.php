<?php
$currentPath = dirname(__DIR__); 
include "../../includes/header3.php";
if ($_SESSION['administrator']['admin'] == 1) {
	$resultsPerPage = 10;

	$letter = $_GET['letter'] ?? 1;
	$f = 0;
	$sF = 0;
	$error = '';
	$sA = 0;
	$sD = 0;
	$sT = 0;
	$limit = 20;



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
		unset($_SESSION['class_id']);
		$_SESSION['alphabet'] = 1;

	}



	$_SESSION['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if ($_POST['c_id'] == '') {
			$nC = 1;

		}
	}
	if (isset($_GET['c_id'])) {
		$_SESSION['class_id'] = $_GET['c_id'];

	}
	if (isset($_GET['letter'])) {

		$_SESSION['letter'] = $_GET['letter'];
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
	if (isset($_SESSION['alphabet'])) {
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



	if (isset($_SESSION['class_id'])) {
		unset($_SESSION['class2']);
		$_SESSION['c_id'] = $_SESSION['class_id'];
		$array = $cms->getLibrary()->searchAlphabeticallyPagination($limit);

		$totalResults = $array[0]['count'];
		$totalPages = ceil($totalResults / $limit);


	}

	if (isset($_SESSION['class2'])) {


		$array2 = $cms->getLibrary()->selectClassFromLibraryPagination($limit);

		$totalResults = $array2[0]['count'];
		$totalPages = ceil($totalResults / $limit);



	}












	if ($_SERVER['REQUEST_METHOD'] === 'POST') {



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
			<div id="hHed">
				<br>
			</div>
			<div class="centeredText"> 
			<div id="letters"></div>
<script src="../../script/adminLibraryLetterArrayLinks.js"></script>


		</div>
		<div class="margin50">
			<fieldset class="fieldset2">
				<div class="centeredText">
					<form action="adminLibrary.php?unset=yes" method="POST">
						<p><label for='c_id'>Class name</label></p>
						<input class="width100" type="text" name='c_id' size="100">
						<p><label for="title">Title</label></p>
						<input class="width100" type="text" name="title" size="100" value="<?= $_SESSION['title'] ?? '' ?>">
						<p><label for="author">Author or authors</label></p>
						<input class="width100" type="text" name="author" size="100" value="<?= $_SESSION['authors'] ?? '' ?>">
						<p><label for="description">Description</label></p>
						<input class="width100" type="text" name="description" size="100" value="<?= $_SESSION['description'] ?? '' ?>">
					</div>
					<div class="submit-middle">  <input type="submit" value="SUBMIT!"></div>
				</form>
			</fieldset>
			<div class="margin50">

				<?php
				if (isset($array)) {
					if ($array[1] != false) {
						foreach($array[1] as $documents) { ?>
							ID:<?= $documents['id'] ?><br>

							<div class="centeredText"><a href="<?= '../' . $documents['file_location']?>">VIEW DOCUMENT</a></div><br>
							<div class="settings5">Title:</div> <div class="settings6"><?= $documents['title'] ?></div>
							<div class="settings5">Authors: </div><div style="padding-left:4px;" class="settings6"><?= $documents['authors'] ?></div>
							<div class="centeredText"><br>Description:</div><?php
							$description = paragraph($documents['description']);
							?>
							<div class="settings">

								<?PHP

								echo '<p>' . $description . '</p>'; ?></div><br><br>



							<?php 
							}
							$url = 'adminLibrary.php';
							echo get_pagination_links($_SESSION['page'], $totalPages, $url, '');

						}
					}

					if (isset($array2)) {

						if ($array2[1] != false) {
							foreach($array2[1] as $documents) { ?>

								Class Name:<a href="adminLibrary.php?class=<?= $documents['class_id'] ?>"><?= $documents['class_name'] ?></a><br>


							<?php }
							$url = 'adminLibrary.php';
							echo get_pagination_links($_SESSION['page'], $totalPages, $url, '');

						}
					}


					?>
				</div>
			</div>
			<div style="height: 1200px;">
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
	header("Location: ../../classes.php");
	exit();
}
?>

<div>
	<?php include '../../includes/footer2.php'; ?>
</div>
</body>
 </html>
