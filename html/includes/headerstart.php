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
if (isset($_SESSION['id'])) {
	if (isset($_GET['cId'])) {
		$_SESSION['site']['cId'] = $_GET['cId'];

	}
	$rootUser = $cms->getMember()->selectViaEmail('administrator@questionnaire.com');

	if ($rootUser == false) {
		$_SESSION['warningBit'] = 1;
	} else {
		unset($_SESSION['warningBit']);
	}

	if (isset($_GET['unset'])) {
		unset($_SESSION['site']['cId']);
	}
	if (!isset($_SESSION['administrator'])) {
		$_SESSION['administrator'] = $cms->getMember()->selectAdminViaUserId($_SESSION['id']);
	}
	$start = microtime(true);


	$siteH = $_SESSION['layoutOfSite']['siteH'] ?? 'Questionnaire!';

	$length = strlen($siteH);

	if (!isset($_SESSION['hobbip'])) {
		$_SESSION['layoutOfSite']['hobbip'] = $_SESSION['layoutOfSite']['hobbip'] ?? 60;
		$_SESSION['layoutOfSite']['porsw'] = $_SESSION['layoutOfSite']['porsw'] ?? 7;
		$_SESSION['layoutOfSite']['polsw'] = $_SESSION['layoutOfSite']['polsw'] ?? 7;

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
	} elseif ($_SESSION['layoutOfSite']['hobbip'] <= 60 && $length > 0 && ($_SESSION['layoutOfSite']['porsw'] + $_SESSION['layoutOfSite']['polsw']) <= 40) {
		$height2 = (intval($_SESSION['layoutOfSite']['hobbip']) -4);
	} elseif ($_SESSION['layoutOfSite']['hobbip'] <= 60 && $length >= 30  && ($_SESSION['layoutOfSite']['porsw'] + $_SESSION['layoutOfSite']['polsw']) <= 20) {
		$height2 = (intval($_SESSION['layoutOfSite']['hobbip']) -4) / 2;
	} elseif ($_SESSION['layoutOfSite']['hobbip'] <= 60 && $length >= 45  && ($_SESSION['layoutOfSite']['porsw'] + $_SESSION['layoutOfSite']['polsw']) <= 0) {
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

	<head>
		<title>Questionnaire!</title>
		<?php
		if (!isset($_SESSION['layoutOfSite']['filled'])) {
		$_SESSION['layoutOfSite']['length'] = 49;
			$_SESSION['layoutOfSite']['filled'] = 'filled';

if (!isset($_SESSION['layoutOfSite']['mabp'])) {
		$_SESSION['layoutOfSite']['soqipip']                     =  80;
		$_SESSION['layoutOfSite']['soibip']                     =  80;
		$_SESSION['layoutOfSite']['solipip']                    =  70;
		$_SESSION['layoutOfSite']['soripip']                    =  30;
		$_SESSION['layoutOfSite']['pombw']                      =   86;
		$_SESSION['layoutOfSite']['polsw']                      =  7;
		$_SESSION['layoutOfSite']['porsw']                      =   7;
		$_SESSION['layoutOfSite']['hobbip']                     =   50;
		$_SESSION['layoutOfSite']['dfhb']                       = 0;
		$_SESSION['layoutOfSite']['efhb']                       = 1;
		$_SESSION['layoutOfSite']['enableMovingBars']           =  1;
		$_SESSION['layoutOfSite']['disableMovingBars']          =  0;
		$_SESSION['layoutOfSite']['dls']                        =  0;
		$_SESSION['layoutOfSite']['els']                        =  1;
		$_SESSION['layoutOfSite']['ers']                        =  1;
		$_SESSION['layoutOfSite']['drs']                        =  0;
		$_SESSION['layoutOfSite']['ecb']                        =  1;
		$_SESSION['layoutOfSite']['dcb']                        =  0;
		$_SESSION['layoutOfSite']['embpb']                      = 0;
		$_SESSION['layoutOfSite']['dmbpb']                      = 1;
		$_SESSION['layoutOfSite']['emapb']                      = 0;
		$_SESSION['layoutOfSite']['dmapb']                      = 1;
		$_SESSION['layoutOfSite']['embpb']                      = 0;
		$_SESSION['layoutOfSite']['dmbpb']                      = 1;
		$_SESSION['layoutOfSite']['enableBackgroundPicture']    = 0;
		$_SESSION['layoutOfSite']['disableBackgroundPicture']   = 1;
		$_SESSION['layoutOfSite']['cotisp']                     = 'rgb(255,255,255)';
		$_SESSION['layoutOfSite']['rSideColour']                = 'rgb(0,0,0)';
		$_SESSION['layoutOfSite']['mbc']                        = 'rgb(16,13,217)';
		$_SESSION['layoutOfSite']['lBarc']                      = 'rgb(0,0,0)';
		$_SESSION['layoutOfSite']['tc']                         = 'rgb(16,13,217)';
		$_SESSION['layoutOfSite']['coib']                       = 'rgb(255,255,255)';
		$_SESSION['layoutOfSite']['cotiib']                     = 'rgb(0,0,0)';
		$_SESSION['layoutOfSite']['cospb']                      = 'rgb(0,0,0)';
		$_SESSION['layoutOfSite']['bc']                         = 'rgb(100,100,100)';
		$_SESSION['layoutOfSite']['cotiqp']                     = 'rgb(0,0,0)';
		$_SESSION['layoutOfSite']['coqaab']                     = 'rgb(255,255,255)';
		$_SESSION['layoutOfSite']['cotiqaab']                   = 'rgb(0,0,0)';
		$_SESSION['layoutOfSite']['coqb']                       = 'rgb(255,255,255)';
		$_SESSION['layoutOfSite']['qbc']                        = 'rgb(0,0,0)';
		$_SESSION['layoutOfSite']['tWritting']                        = 'rgb(255,255,255)';
		$_SESSION['layoutOfSite']['writting']                        = 'rgb(255,255,255)';
		$_SESSION['layoutOfSite']['mboc']                       = 'rgb(0,0,0)';
		$_SESSION['layoutOfSite']['siteH']                      = "Questionnaire!";
	
	
		$_SESSION['layoutOfSite']['mabp'] = '';
		$_SESSION['layoutOfSite']['cbp'] = '';
		$_SESSION['layoutOfSite']['mbp'] = '';
		$_SESSION['layoutOfSite']['bposa'] = '';
		$_SESSION['layoutOfSite']['bpota'] = '';
	
}

		?>
		<script>
		let layout = <?= JSON_encode($_SESSION['layoutOfSite']) ?>;
	
		localStorage.setItem('layout', JSON.stringify(layout));
		</script>

<?php } ?>


		<meta http-equiv=”expires” content=”-1” />
		<meta http-equiv="Content-Type"
		content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Type"
		content="application/javascript; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="CSS/styleSheet.css"   />

		<style>





		</style>
	</head>
	<body>





		<div id="mainTitleBar" class="mainTitleBar">
			<div id="leftInnerTitleBar" class="leftInnerTitleBar">
			</div>


			<div id="middleTitleBar" class="middleTitleBar"><?= $_SESSION['layoutOfSite']['siteH2'] ?? ''  ?>
			</div>
			<div id="rightTitleBar" class="rightTitleBar">
			</div>



		</div>


<div id="topBar"></div>


<script src="<?= $string[1] ?>script/jquery-3.7.1.min.js"></script>
		<script>
		var rootU = <?= $_SESSION['administrator']['root'] ?? 0 ?>;
		var admin = <?= $_SESSION['administrator']['admin'] ?? 0 ?>;
		var viewer = <?= $_SESSION['administrator']['viewer'] ?? 0 ?>;
		</script>
		<script src="<?= $string[1] ?>script/dropDownMenuPrototype3.js"></script>








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
				header('login.php');
				exit();
			}
