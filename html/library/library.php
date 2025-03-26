<?php
$currentPath = dirname(__DIR__); 

include "../includes/header3.php";
if (isset($_GET['uclass'])) {
	unset($_SESSION['site']['cId']);
	unset($_SESSION['description']);
}
$limit = 1;
$_SESSION['page'] = isset($_GET['page']) ? $_GET['page'] : 1;

$f = 0;
$sF = 0;
$error = '';
$sA = 0;
$sD = 0;
$sT = 0;



if (isset($_GET['unset'])) {

	unset($_SESSION['title']);
	unset($_SESSION['letter']);
	unset($_SESSION['alphabet']);
	unset($_SESSION['authors']);
	unset($_SESSION['description']);
	unset($_SESSION['title']);
}

if (isset($_GET['reset'])) {
	unset($_SESSION['authors']);
	unset($_SESSION['description']);
	unset($_SESSION['title']);
	unset($_SESSION['letter']);
	$_SESSION['alphabet'] = 1;

}


if (isset($_GET['letter'])) {

	$_SESSION['letter'] = $_GET['letter'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['title'])) {

		$_SESSION['title'] = $_POST['title'];

	}
	if (ISSET($_POST['author'])) {
		if ($_POST['author'] != "") {

			$_SESSION['authors'] = $_POST['author'];

		}
		if ($_POST['description'] != '') {

			$_SESSION['description'] = $_POST['description'];

		}
	}
}

if (isset($_SESSION['alphabet'])) {
	if  (!isset($_SESSION['site']['cId'])) {
		$array = $cms->getLibrary()->searchAlphabeticallyPaginationNC($limit);
	} else {
		$array = $cms->getLibrary()->searchAlphabeticallyPagination($limit);
	}
	$totalResults = $array[0]['count'];
	$totalPages = ceil($totalResults / $limit);

}

if (isset($_SESSION['letter'])) {
	if  (!isset($_SESSION['site']['cId'])) {
		$array = $cms->getLibrary()->searchViaLetterPaginationNC($limit);
	} else {
		$array = $cms->getLibrary()->searchViaLetterPagination($limit);
	}
	$totalResults = $array[0]['count'];
	$totalPages = ceil($totalResults / $limit);

}



if (isset($_SESSION['title'])) {
	if  (!isset($_SESSION['site']['cId'])) {
		$array = $cms->getLibrary()->selectTitleFromLibraryNC($limit);
	} else {
		$array = $cms->getLibrary()->selectTitleFromLibrary($limit);
	}

	$totalResults = $array[0]['count'];
	$totalPages = ceil($totalResults / $limit);



}


if (isset($_SESSION['authors'])) {
	if  (!isset($_SESSION['site']['cId'])) {
		$array = $cms->getLibrary()->selectAuthorFromLibraryNC($limit);
	} else {
		$array = $cms->getLibrary()->selectAuthorFromLibrary($limit);
	}
	$totalResults = $array[0]['count'];
	$totalPages = ceil($totalResults / $limit);
}

if (isset($_SESSION['description'])) {
	if  (!isset($_SESSION['site']['cId'])) {
		$array = $cms->getLibrary()->selectDescriptionFromLibraryNC($limit);
	} else {
		$array = $cms->getLibrary()->selectDescriptionFromLibrary($limit);
	}
	$totalResults = $array[0]['count'];
	$totalPages = ceil($totalResults / $limit);

}





if (isset($array[1])) {
	if ($array[1] == false) {
		$sF = 1;
	}
}






if ($sF === 1) {
	$error .= "There was a problem. The search failed to find anything. <br>";

}




?>

<div id="main" class="main">
	<div class="heightHeader">
	</div>
	<div class="mainbody">
		<div class="centeredText">
			<?= $error ?? '' ?>
			<br>

			<div id="letters"></div>
<script src="../script/adminLibraryLetterArrayLinks.js"></script>

<?php

			if (isset($_SESSION['site']['cId'])) {
				echo "<br><br>You are searching in a class. To search entire site return to class selection page<br>
				or click on the link below.<br>
				<a href='library.php?uclass=yes'>Go to main library!</a><br><br>";
			} else {
				echo "<br><br>You are searching the entire site. To search an individual class enter a class and return to the library.<br><br>";
			}

			?><br><br>
		</div>
		<div>
			<div class="centeredText">
				<a href="library.php?reset=yes">List all books</a>
				<br><br>
			</div>
			<div class="margin50">

				<form action="library.php?unset=yes" method="POST">
					<div class="width30 marginAuto">
						<div class="settings5"><label for="title">Title:</label></div><div style="padding-left: 4px;" class="settings5"><input type="text" name="title" value="<?= $_SESSION['title'] ?? '' ?>"></div><br>
						<?php
						if (!isset($_SESSION['site']['cId'])) {
							?>
							<div class="settings5"><label for="author">Author or authors:</label></div>
							<div class="settings5"><input type="text" name="author"  value="<?= $_SESSION['authors'] ?? '' ?>"></div><br>
							<div class="settings5"><label for="description">Description:</label></div>
							<div class="settings5"><input type="text" name="description"  value="<?= $_SESSION['description'] ?? '' ?>"></div><br>



							<?php
						}
						?></div>
						<div style="width: 100;" class="submit-middle"><input type="submit" value="SUBMIT!"></div>


					</fieldset>
				</div>


				<?php


				if (isset($array[1])) {

					if($array[1] != false) {

						foreach($array[1] as $documents) {
							?>
							<div style="border-bottom: 2px solid;" class="margin25">
								<div>
									<div>ID:<?= $documents['id'] ?><br></div>
									<div class="centeredText"><a href="<?= $documents['file_location'] ?>">VIEW DOCUMENT</a><br><br></div>
									<div class="settings5">Title:</div><div class="settings6"> <?= $documents['title'] ?></div>
									<div class="settings5">Authors:</div><div class="settings6"> <?= $documents['authors'] ?></div>
									<div class="centeredText">Description:<br> <?php
									$description = paragraph($documents['description']);
									echo '<p>' . $description . '</p>'; ?><br><br>
									<div sytle="height: 400px">
									</div>
								</div>
							</div>
						<?php } ?>

						<div id="pagination">
							<?php
							$url = 'library.php';
							echo '<p>' . get_pagination_links($_SESSION['page'], $totalPages, $url, '') . "</p>";
							?>
						</div>
						<?php
					}
				}
				?>

				<div style="height: 1400px;">
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

<div>
	<?php include '../includes/footer2.php'; ?>
</div>
</body>
</html>
