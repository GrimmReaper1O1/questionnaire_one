<?php
$currentPath = dirname(__DIR__); 
include "../includes/header3.php";
$error = '';
if ($_SESSION['administrator']['admin'] == 1) {

	if (isset($_GET['cId'])) {
		$result01 = 0;
		for($i = 1; $i < 31; $i++) {
			$result0 = $cms->getQuestions()->deleteFromQuestionInformationViaClassIdAndSubject($i, $_GET['cId']);

			if ($result0 < 0) {
				$result01 = $result0;
			}
		}
		$result1 = $cms->getQuestions()->deleteFromQuestionDescriptionViaClassId($_GET['cId']);
		$result2 = $cms->getQuestions()->deleteFromSubjectsTableViaClassId($_GET['cId']);
		//	$result3 = $cms->getQuestions()->deleteFromUsersOfClassesViaClassId($_GET['cId']);
		//	$array = $cms->getQuestions()->selectAllFromLibraryViaClassId($_GET['cId']);
		//	$result4 = $cms->getQuestions()->deleteFromLibraryViaClassId($_GET['cId']);
		//	$result5 = $cms->getQuestions()->deleteFromTermsViaClassId($_GET['cId']);
		$result6 = $cms->getQuestions()->deleteFromClassesViaClassId($_GET['cId']);
		//	if ($result01 > 0) {
		//		$error .= "INFORMAITON WAS DELETED FROM THE QUESITON INFORMATION TABLE.<br>";
		//	} else {
		//		$error .= "THERE MAY NOT HAVE BEEN INFROMATION TO DELETE FROM THE QUESITON INFORMATION TABLE <br>";
		//		$error .= "OR THERE WAS A PROBLEM. TRY AGAIN VIA THE BUTTON BELOW.<br>";
		//	}
		//	if ($result1 > 0) {
		//		$error .= "INFORMAITON WAS DELETED FROM THE QUESTION DESCRIPTION TABLE.<br>";
		//	} else {
		//		$error .= "THERE MAY NOT HAVE BEEN INFROMATION TO DELETE FROM THE QUESTION DESCRIPTION TABLE <br>";
		//		$error .= "OR THERE WAS A PROBLEM. PLEASE TRY AGAIN <br>";
		//	}
		//	if ($result2 > 0) {
		//		$error .= "INFORMAITON WAS DELETED FROM .<br>";
		//	} else {
		//		$error .= "THERE MAY NOT HAVE BEEN INFROMATION TO DELETE FROM THE SUBJECTS TABLE <br>";
		//		$error .= "OR THERE WAS A PROBLEM. PLEASE TRY AGAIN  <br>";
		//
		//	}
		//	if ($result3 > 0) {
		//		$error .= "INFORMAITON WAS DELETED FROM FROM USERS IN CLASSES TABLE.<br>";
		//	} else {
		//		$error .= "THERE MAY NOT HAVE BEEN INFROMATION TO DELETE FROM USERS IN CLASSES TABLE <br>";
		//		$error .= "OR THERE WAS A PROBLEM. PLEASE TRY AGAIN <br>";
		//
		//	}
		//	$count = 1;
		//	foreach($array as $row) {
		//
		//	if(unlink($row['file_location'])) {
		//		$count++;
		//	}
		//
		//	}
		//
		//
		//		if ($count > 0) {
		//			$error .= "THERE WERE " . $count . " FILES DELETED FROM THE LIBRARY.<br>";
		//		} else {
		//			$error .= "THERE MAY NOT HAVE BEEN INFROMATION TO DELETE FROM THE LIBRARY TABLE  <br>";
		//			$error .= "OR THERE WAS A PROBLEM. PLEASE TRY AGAIN <br>";
		//
		//		}
		//		if ($result4 > 0) {
		//			$error .= "THERE WERE ENTRIES DELETED FROM THE LIBRARY.<br>";
		//		} else {
		//			$error .= "THERE MAY NOT HAVE BEEN INFROMATION TO DELETE FROM THE LIBRARY TABLE  <br>";
		//			$error .= "OR THERE WAS A PROBLEM. PLEASE TRY AGAIN <br>";
		//
		//		}
		//		if ($result5 > 0) {
		//			$error .= "INFORMAITON WAS DELETED FROM THE TERMS TABLE.<br>";
		//		} else {
		//			$error .= "THERE MAY NOT HAVE BEEN INFROMATION TO DELETE FROM THE TERMS TABLE  <br>";
		//			$error .= "OR THERE WAS A PROBLEM. PLEASE TRY AGAIN <br>";
		//
		//		}
		//
		if ($result6 > 0) {
			$error .= "INFORMAITON WAS DELETED FROM THE CLASSES TABLE.<br>";
		} else {
			$error .= "THERE MAY NOT HAVE BEEN INFROMATION TO DELETE FROM THE CLASSES TABLE <br>";
			$error .= "OR THERE WAS A PROBLEM. PLEASE TRY AGAIN <br>";

		}
		//	echo "IF THERE IS NO INFORMATION IN A TABLE IT IS NORMAL TO SEE A NO SUCCESS MESSAGE.<br>";

		?>
		<div class="centeredText">
			<?= $error ?>
		</div>
		<div id="main" class="main">

			<div class="heightHeader">
			</div>
			<div class="mainbody">
				<fieldset class="fieldset1">
					<form action="delete_class.php?cId=<?= $_GET['cId'] ?>" method="POST">
						<input type="submit" value="TRY AGAIN!">
					</form>
				</fieldset>
			</div>
		</div>
	</div>

	<?php

}
?>
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
