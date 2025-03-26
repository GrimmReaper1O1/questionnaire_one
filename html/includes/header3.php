<?php
$start = microtime(true);
function getBootstrap() {
	$docRoot = rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR);
	
	// Get the current script path
	// $currentPath = rtrim(__DIR__, DIRECTORY_SEPARATOR);
	
	// Initialize the count of directories
	$directoryCount = 0;
	$backtrace = debug_backtrace();
	
	// Find the position of the caller in the stack trace
	if (isset($backtrace[1])) {
		// The file that included this script
		$callerFile = $backtrace[1]['file'];
		
		// Get the directory of the caller file
		
		$string = '../';
		$string2 = '';
	// Traverse upwards until we reach DOCUMENT_ROOT
if (realpath($callerFile) !== realpath($docRoot)) {
	while (realpath($callerFile) !== realpath($docRoot)) {
		$callerFile = dirname($callerFile); // Go up one level
		$directoryCount++;
	}
	}

	if ($directoryCount != '1') {
		for ($i = 0; $i < $directoryCount-1; $i++) {
		$string = '../' . $string;
		$string2 = '../' . $string2;
		
	}
}
	} 
echo $directoryCount;
	$ar[0] = $string;
	$ar[1] = $string2;
		return $ar;
	}
	$string = getBootstrap();
require $string[0] . 'src/bootstrap.php';



if (isset($_SESSION['id'])) {


	//

	?>
	<!DOCTYPE html>
	<html>
	<title>questionnaire</title>

	<head>
		<meta http-equiv=”expires” content=”-1” />
		<meta http-equiv="Content-Type"
		content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Type"
		content="application/javascript; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="<?= $string[1] ?>CSS/styleSheet.css"   />

		<style>

		</style>
	</head>
	<body>





		<div id="mainTitleBar" class="mainTitleBar">
			<div id="leftInnerTitleBar" class="leftInnerTitleBar">
			</div>


			<div id="middleTitleBar" class="middleTitleBar"><?= $_SESSION['layoutOfSite']['siteH2'] ?? 'Questionnnaire!'  ?>
			</div>
			<div id="rightTitleBar" class="rightTitleBar">
			</div>



		</div>






		<div id="topBar">
		
		</div>
		
		<script src="<?= $string[1] ?? '' ?>script/jquery-3.7.1.min.js"></script>
		<script>
			var admin = <?= $_SESSION['administrator']['admin'] ?? 0 ?>;
			var rootU = <?= $_SESSION['administrator']['root'] ?? 0 ?>;
			var viewer = <?= $_SESSION['administrator']['viewer'] ?? 0 ?>;
		</script>
		<script src="<?= $string[1] ?? '' ?>script/dropDownMenuPrototype3.js"></script>










		<?php

		if (isset($_SESSION['layoutOfSite']['disableMovingBars'])) {
			if ($_SESSION['layoutOfSite']['disableMovingBars'] == 1) {
				?>
				<div class="full-height">
					<?php
					if ($_SESSION['layoutOfSite']['dls'] == 0) { ?>
						<div id="leftLowerSidebar" class="leftLowerSidebar">

						</div>
					<?php }
					if ($_SESSION['layoutOfSite']['drs'] == 0) {
						?>

						<div id="rightLowerSidebar" class="rightLowerSidebar">

						</div>
						<?php
					}
				} else {
					?>
					<div class="full-height">
						<div id="leftLowerSidebar" class="leftLowerSidebar">

						</div>
						<?php
					}
				} else { ?>

					<div id="leftLowerSidebar" class="leftLowerSidebar">

					</div>
					<div id="rightLowerSidebar" class="rightLowerSidebar">

					</div><?php
				} ?>

				<?php

			} else {
				// header('login.php');
				// exit();
			}
