<?php

include '../src/bootstrap.php';
$start = microtime(true);
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
		<link rel="stylesheet" type="text/css" href="CSS/styleSheet.css"   />

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
		<script src="script/jquery-3.7.1.min.js"></script>
		<script>
		var rootU = <?= $_SESSION['administrator']['root'] ?? 0 ?>;
		var admin = <?= $_SESSION['administrator']['admin'] ?? 0 ?>;
		var viewer = <?= $_SESSION['administrator']['viewer'] ?? 0 ?>;
		</script>
		<script src="script/dropDownMenuPrototype3.js"></script>
	<?php
		if (!isset($_SESSION['layoutOfSite']['filled'])) {
		$_SESSION['layoutOfSite']['filled'] = 'filled';
		?>
		<script>
		var layout = <?= JSON_encode($_SESSION['layoutOfSite']) ?>;
		sessionStorage.setItem('layout', JSON.stringify(layout));

		</script>
	<?php
	}
?>









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
