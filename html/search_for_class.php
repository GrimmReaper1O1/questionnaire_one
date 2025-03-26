<?php

$currentPath = dirname(__DIR__); 
include "includes/header3.php";
$limit = 10;
if(isset($_GET['unset'])) {

	unset($_SESSION['class2']);
	unset($_SESSION['page']);
}



$_SESSION['page'] = isset($_GET['page']) ? $_GET['page'] : 1;




if (isset($_SESSION['class2'])) {

	$array2 = $cms->getLibrary()->selectClassFromLibraryPagination($limit);

	$totalResults = $array2[0]['count'];
	$totalPages = ceil($totalResults / $limit);

}




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$_SESSION['class2'] = $_POST['className'];


	if (isset($_SESSION['class2']) && $_SESSION['class2'] != '') {


		$array2 = $cms->getLibrary()->selectClassFromLibraryPagination($limit);

		$totalResults = $array2[0]['count'];
		$totalPages = ceil($totalResults / $limit);

	}



}



?>
<br>
<a href="classes.php?unset=yes">Return to classes</a><br><br>

<form action="search_for_class.php?unset=yes" method="POST">
	<label for="className">Class:</label><br>
	<input type="text" name="className" size="100" value="<?= $_SESSION['className'] ?? '' ?>"><br>
	<input type="submit" value="SUBMIT!">
</form>

<?php


if (isset($array2[1])) {
	if ($array2[1] != false) {
		foreach($array2[1] as $class) { ?>

			Class: <a href="selectSubject.php?class=<?= $class['class_id'] ?? ''?>"><?= $class['class_name'] ?? ''?></a><br><br><br><br>
			Description: <?php
			$description = paragraph($class['description_of_class']);
			echo '<p>' . $description . '</p>'; ?><br><br>



		<?php  }
		echo "-";
		for ($i = 1; $i <= $totalPages; $i++) {
			echo '<a href="search_for_class.php?page=' . $i . '">' . $i . '</a> - ';
		}
	}
}
