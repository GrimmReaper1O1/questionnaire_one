<?php
$currentPath = dirname(__DIR__); 
include "includes/header3.php";

$start = microtime(true);
if (isset($_GET['letter'])) {
	$_SESSION['letter'] = $_GET['letter'];
}
$limit = 10;

$letterString = 'A B C D E F G H I J K L M N O P Q R S T U V W X Y Z';
$letterArray = preg_split('/[\s]+/', $letterString);

if (isset($_GET['unset'])) {
	unset($_SESSION['letter']);
	unset($_SESSION['page']);
}

$_SESSION['page'] = $_GET['page'] ?? 1;

if (isset($_GET["letter"])) {
	$_SESSION['letter'] = $_GET['letter'];
}

if (isset($_SESSION['letter'])) {

	$classesArray = $cms->getQuestions()->selectUndertakenClassesViaLetter($_SESSION['id'], $_SESSION['page'], $limit, $_SESSION['letter']);

	$totalResults = $classesArray[0]['count'];


	$totalPages = ceil($totalResults / $limit);

}

if (!isset($_SESSION['letter'])) {

	$classesArray = $cms->getQuestions()->selectUndertakenClasses($_SESSION['id'], $_SESSION['page'], $limit);

	$totalResults = $classesArray[0]['count'];

	$totalPages = ceil($totalResults / $limit);



}



if (isset($classesArray)) {
	if ($classesArray[0] != false) {

		$totalResults = $classesArray[0]['count'];

		$totalPages = ceil($totalResults / $limit);
		?>
		<div id="main" class="main">

			<div class="heightHeader">
			</div>
			<div class="mainbody">
				<div class="centeredText"><p>
					<?php

					foreach($letterArray as $letters) { ?>
						<?= " -" ?><a href="bioOne.php?unset=yes&letter=<?= $letters ?>"><?= $letters ?></a><?= "- " ?>

						<?php
					}
					?>
				</p>

				<br><a href="bioOne.php?unset=yes">GO BACK TO ALPHABETICAL ORDER!</a><br>
				<?php

				if ($classesArray[1] != false) {
					foreach($classesArray[1] as $class) {

						?>

						<h4>Class:<br>
							<a href="bioTwo.php?class=<?= $class['class'] ?>&name=<?= $class['class_name'] ?>"><?= $class['class_name'] ?></a></h4><br><br>



							<?php
						}
					}
					?>
				</div>
				<div style="height: 1600px;">
				</div>
			</div>
		</div>


		<?php


	}
}
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

<div id="pagination" class="pagination">
	<?php

	$url = 'bioOne.php';
	echo get_pagination_links($_SESSION['page'], $totalPages, $url, '');


	$end = microtime(true);
	echo ($end - $start);



	?>


</div>



<div class="copyright">
	<?php
	include "includes/footer.php";
	?>
</div>
</body>
</html>
