<?php

$currentPath = dirname(__DIR__); 
include "../../includes/header3.php";
if ($_SESSION['administrator']['root'] == 1) {
	$error = '';
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		$timestamp = strtotime('now');

		$row = $cms->getMember()->selectViaEmail($_POST['email']);

		if (isset($_POST['superUser'])) {
			$superUser = 1;
		} else {
			$superUser = 0;
		}
		if (isset($_POST['viewer'])) {
			$viewer = 1;
		} else {
			$viewer = 0;
		}
		if (isset($_POST['standard'])) {
			$standard = 1;
		} else {
			$standard = 0;
		}

		if ($row !== false) {
			$admin = $cms->getMember()->selectAdministratorViaUserId($row['user_id']);

			if ((!isset($_POST['delete']) && isset($_POST['superUser']) && !isset($_POST['viewer']) && !isset($_POST['standard'])) ||
			(!isset($_POST['delete']) && !isset($_POST['superUser']) && isset($_POST['viewer']) && !isset($_POST['standard'])) ||
			(!isset($_POST['delete']) && !isset($_POST['superUser']) && !isset($_POST['viewer']) && isset($_POST['standard']))
		) {
			try {

				if ($admin == false) {
					$cms->getMember()->createAdmin($row['user_id'], $_SESSION['id'], $timestamp, $superUser, $viewer);
					$error .= "THE USER WAS INSERTED INTO THE ADMINISTRATOR TABLE!";
				} else {
					$result = $cms->getMember()->updateAdmin($admin['administrator_id'], $superUser, $viewer, $standard);
					if ($result[1] > 0 && $result[0] > 0) {
						$error .= "THE UPDATE WAS SUCCESSFULL!";

					} else {

						$row = $cms->getMember()->deleteAdminViaId($row['user_id']);

						$error .= "THE UPDATE WAS NOT SUCCESSFULL.";
					}
				}





			} catch(Exception $e) {

				$error .= "THE USER WAS NOT INSERTED INTO THE ADMINISTRATOR TABLE.";

			}

		} elseif (isset($_POST['delete']) && (isset($_POST['superUser']) || isset($_POST['viewer']) || isset($_POST['standard']))) {

			$error .= "YOU MAY NOT DELETE AND CREATE AT THE SAME TIME.";

		} elseif (isset($_POST['delete']) && (!isset($_POST['superUser']) || !isset($_POST['viewer']) || !isset($_POST['standard']))) {

		} else {

			$error .= "YOU MAY ONLY CREATE ONE TYPE OF ADMINISTRATOR AT ANY TIME. ADMINISTRATORS CAN BE CHANGED LATER.";

		}

		if ($admin !== false) {
			if (isset($_POST['delete']) && !isset($_POST['superUser']) && !isset($_POST['viewer']) && !isset($_POST['standard'])) {

				$row = $cms->getMember()->deleteAdminViaId($row['user_id']);
				if ($row > 0) {
					$error .= "THE ADMINISTRATIVE ACCOUNT WAS DELETED!";
				} else {
					$error .= "THE ADMINISTRATIVE ACCOUNT WAS NOT DELETED.";
				}

			}
		} elseif (isset($_POST['delete'])) {
			$error .= 'THERE WAS NO ADMINISTRATOR FOUND UNDER THAT ADDRESS.';
		}
	} else {
		$error .= "THERE WAS NO USER FOUND.";
	}

}
?>
<div id="main" class="main">

	<div class="heightHeader">
	</div>
	<div class="mainbody">
		<div class="margin55">
			<?php
			echo "<p class='centeredText'>" . $error . "</p><br><br>";
			?>
			<fieldset class="noBorder">
				<form action="createAdministrator.php" method="POST">
					<div class="margin50">
						<div class="settings1"><input type="checkbox" name="delete" /></div><div class="settings2"><label for="delete">DELETE ADMINISTRATIVE ACCOUNT!</label></div><br>
						<div class="settings1"><input type="checkbox" name="superUser" /></div><div class="settings2"><label for="superUser">CREATE AN ADMINISTRATIVE ACCOUNT WITH ALL ACCESS PRIVILEGES!</label></div><br>
						<div class="settings1"><input type="checkbox" name="viewer" /></div><div class="settings2"><label for="viewer">CREATE AN ADMINISTRATIVE ACCOUNT WITH SCORE VIEWER PRIVILEGES!</label></div><br>
						<div class="settings1"><input type="checkbox" name="standard" /></div><div class="settings2"><label for="standard">CREATE STANDARD ADMINISTRATIVE ACCOUNT FOR FILLING QUESTIONNAIRS!</label></div><br>


						<div class="settings3"><label for="email" size=>EMAIL:</label></div>
						<div class="settings4"><input type="text" name="email" size="20" /></div><br>
						<div class="submit-middle"><input type="submit" value="SUBMIT!" /></div></div>
					</form>
				</fieldset>
				<div style="height: 1200px;">
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
