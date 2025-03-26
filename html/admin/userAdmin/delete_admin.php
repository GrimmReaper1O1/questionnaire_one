<?php
$currentPath = dirname(__DIR__); 
include "../../includes/header3.php";
if ($_SESSION['administrator']['admin'] == 1) {

	$yN = $_POST['yN'] ?? 'maybe';



	$error = '';



	if ($yN == 'yes' || $yN == 'YES') {
		if (isset($_SESSION['deleteAdminId'])) {

			$result = $cms->getMember()->deleteAdminViaId($_SESSION['deleteAdminId']);

			if ($result > 0) {
				$error .= "THE ADMINISTRATOR WAS SUCCESSFULLY DELETED! <br>";
				$error .=  "<a href='show_all_administrators.php'>BACK TO LIST OF ADMINISTRATORS!</a>";
				unset($_SESSION['deleteLibid']);
			} else {
				$error .=  "THERE WAS A PROBLEM. PLEASE TRY AGAIN OR CONTACT YOUR ADMINISTRATOR.<br>";
				$error .=  "<a href='show_all_administrators.php'>BACK TO LIST OF ADMINISTRATORS!</a>";
			}
			?>

			<div class="heightHeader"></div>
			<div class="mainbody main">


				<div class="centeredText">
					<h1><?= $error ?></h1>
				</div>

				<div class="addHeight">
				</div>
			</div>
			<?php



		}

	} elseif ($yN === 'no') {
		header("Location: show_all_administrators.php");
		exit;
	}

	if (isset($_GET['id'])) {

		$_SESSION['deleteAdminId'] = $_GET['uid'];
		$row = $cms->getMember()->getAdministratorViaId($_GET['id']);


		if (isset($row)) {
			?>
			<div id="main" class="main">

				<div class="heightHeader">
				</div>
				<div class="mainbody">
					<div class="centeredText">
						<?= $error ?? '' ?><br>
					</div>
					<div class="centeredText">
						<h4>ARE YOU SURE YOU WANT TO DELETE THIS ADMINISTRATOR FROM THE SYSTEM?</h4>
					</div>

					<div class="margin20">
						<div class="fieldset4">
							<form action="delete_admin.php?delete=yes" method="POST">
								<div>
									<div class="settings"><label for="yN">YES OR NO:</label></div><div class="settings"><input  type="text" name="yN"><br></div><br><br>
									<div class="submit-middle"><input type="submit" value="SUBMIT!"></div><br>
								</div>
							</fieldset>
						</div>
					</div>

					<div >
						<h4><div style="padding-left: 10%;" class="margin40">
							<div class="settings">FULL NAME:</div> <div class="settings"><?= $row['concat_full_name'] ?></div><br>
							<div class="settings">USERNAME:</div> <div class="settings"><?= $row['email'] ?></div><br>
							<div class="settings">PHONE NUMBER:</div> <div class="settings"><?= $row['phone_number'] ?></div><br>
							<div class="settings">CREATED BY ADMINISTRATOR:</div> <div class="settings"><?= $row['creator_name'] ?></div><br>
							<div class="settings">ADMINISTRATOR CREATED ON:</div> <div class="settings"><?php echo date('d-m-y h:i a', $row['timestamp']); ?></div><br>
							<div class="settings">SUPER USER PRIVILEGES:</div><div class="settings"><?php if($row['all_access_administrator'] == 1) { echo "&nbsp;YES!"; } else { echo "&nbsp;NO!"; } ?></div>
						</h4>
					</div>

					<div class="addHeight">
					</div>
				</div>


			<?php }


		}
		?>


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
