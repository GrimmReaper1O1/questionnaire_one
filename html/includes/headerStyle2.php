<?php
$start = microtime(true);
function getBootstrap($calledFile) {
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
	$string = getBootstrap($currentPath);
	require $string[0] . 'src/bootstrap.php';
$start = microtime(true);
if (isset($_SESSION['administrator']['admin'])) {


	if (isset($_GET['class'])) {
		$_SESSION['class'] = $_GET['class'];

	}
	if (isset($_GET['nonupdate'])) {
		if (isset($_POST['yes'])) {
			$cms->getMember()->updateUserStyle();

			unset($_SESSION['styleId']);

		}
		header("Location: chooseProfile.php");
		exit;
	}
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$_SESSION['layoutOfSite'] = $cms->getMember()->selectStyle($_SESSION['site']['style']);
		}
		if (isset($_GET['deleteyes'])) {
			if (isset($_POST['yes'])) {
				$cms->getMember()->deleteStyle();
				unset($_SESSION['delStyle']);

			}
			// header("Location: chooseProfile.php");
			// exit;
		}
	}
	if (isset($_GET['id'])) {


		$_SESSION['layoutOfSite'] = $cms->getMember()->selectStyle($_GET['id']);

	}





	if (isset($_GET['update'])) {
		$_SESSION['layoutOfSite']['id'] = $_GET['id'];
		$cms->getMember()->updateUserStyle();
		$_SESSION['styleToSet'] = $_SESSION['layoutOfSite']['id'];
		unset($_SESSION['layoutOfSite']['id']);
	}

	if (isset($_GET['updateSite2'])) {
		$error = '';
		$result = $cms->getMember()->selectSiteDefaultSettings();
		if ($result == false) {
		try {
			$cms->getMember()->initialize($_SESSION['styleToSet'], 0);
		} catch(Exception $e) {
			$error .= 'failed to initilize site.<br>';
		}



	}

		$result = $cms->getMember()->setSiteStyle($_SESSION['styleToSet']);
		if ($result > 0) {
			$error .= 'SUCCESS!<br>';
		} else {
			$error .= 'Something went wrong.<br>';
		}
		
		$_SESSION['error'] = $error;
		unset($_SESSION['styleToSet']);
		header('Location: chooseProfile.php');
		exit;
	}

	$siteH = $_SESSION['layoutOfSite']['siteH'] ?? 'Questionnaire!';
	$length = strlen($siteH);

	if (!isset($_SESSION['hobbip'])) {
		$_SESSION['layoutOfSite']['hobbip'] = $_SESSION['layoutOfSite']['hobbip'] ?? 60;
		$_SESSION['layoutOfSite']['porsw'] = $_SESSION['layoutOfSite']['porsw'] ?? 7;
		$_SESSION['layoutOfSite']['polsw'] = $_SESSION['layoutOfSite']['polsw'] ?? 7;
		$_SESSION['layoutOfSite']['pombw'] = $_SESSION['layoutOfSite']['pombw'] ?? 86;
	}
	if ($_SESSION['layoutOfSite']['hobbip'] > 60) {

		if ($length < 20 && $length >= 10 ) {
			$height2 = ceil((floatval($_SESSION['layoutOfSite']['hobbip']) -4) / 2);
		} elseif ($length < 50 && $length >= 20 ) {
			$height2 = ceil((floatval($_SESSION['layoutOfSite']['hobbip']) -4) / 3);
		} elseif ($length < 60 && $length >= 50) {
			$height2 = ceil((floatval($_SESSION['layoutOfSite']['hobbip']) -4) / 3.5);

		} elseif ($length < 80 && $length >= 60) {
			$height2 = ceil((floatval($_SESSION['layoutOfSite']['hobbip']) -4) / 4.5);

		} elseif ($length < 100 && $length >= 80) {
			$height2 = ceil((floatval($_SESSION['layoutOfSite']['hobbip']) -4) / 5.5);

		} elseif ($length < 120 && $length >= 100) {
			$height2 = ceil((floatval($_SESSION['layoutOfSite']['hobbip']) -4) / 6.5);

		} else {
			$height2 = ceil((floatval($_SESSION['layoutOfSite']['hobbip']) -4) / 1.5);
		}
	} elseif ($_SESSION['layoutOfSite']['hobbip'] <= 60 && $length < 15 && ($_SESSION['layoutOfSite']['porsw'] + $_SESSION['layoutOfSite']['polsw']) >= 40) {
		$height2 = (intval($_SESSION['layoutOfSite']['hobbip']) -4);
	} elseif ($_SESSION['layoutOfSite']['hobbip'] <= 60 && $length >= 30  && ($_SESSION['layoutOfSite']['porsw'] + $_SESSION['layoutOfSite']['polsw']) >= 20) {
		$height2 = (intval($_SESSION['layoutOfSite']['hobbip']) -4) / 2;
	} elseif ($_SESSION['layoutOfSite']['hobbip'] <= 60 && $length >= 45  && ($_SESSION['layoutOfSite']['porsw'] + $_SESSION['layoutOfSite']['polsw']) >= 0) {
		$height2 = (intval($_SESSION['layoutOfSite']['hobbip']) -4) / 4;
	} else {
		$height2 = (intval($_SESSION['layoutOfSite']['hobbip']) -4);
	}
	if (!isset($_SESSION['layoutOfSite']['tWritting'])) {
		$titleWritting = 'white';
	} else {
		$titleWritting = $_SESSION['layoutOfSite']['tWritting'];
	}
	$_SESSION['layoutOfSite']['siteH2'] = '<span style="font-size: ' . $height2 . 'px; font-weith: bold; colour: ' . $titleWritting . ';">' . $siteH . '</span>';









	?>
	<!DOCTYPE html>
	<html>
	<title>questionnaire</title>

	<head>
		<script>
		let layout = <?php echo JSON_encode($_SESSION['layoutOfSite']); ?>;
		localStorage.setItem('layout', JSON.stringify(layout));

		</script>
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


			<div id="middleTitleBar" class="middleTitleBar"><?= $_SESSION['layoutOfSite']['siteH2'] ?? 'Questionniare!'  ?>
			</div>
			<div id="rightTitleBar" class="rightTitleBar">
			</div>



		</div>




		


		<div id="topBar">
		
		</div>
		
		<script src="<?= $string[1] ?>script/jquery-3.7.1.min.js"></script>
		<script>
		var rootU = <?= $_SESSION['administrator']['root'] ?? 0 ?>;
		var admin = <?= $_SESSION['administrator']['admin'] ?? 0 ?>;
		var viewer = <?= $_SESSION['administrator']['viewer'] ?? 0 ?>;
		</script>
		<script src="<?= $string[1] ?>script/dropDownMenuPrototype3.js"></script>












		<?php

		if (isset($_SESSION['layoutOfSite']['disableMovingBars'])) {
			if ($_SESSION['layoutOfSite']['disableMovingBars'] == 0) {
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
				header('login.php');
				exit();
			}
