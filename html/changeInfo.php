<?php
$currentPath = dirname(__DIR__); 
include "includes/header3.php";


$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['password'])) {
		if (strlen($_POST['password']) > 6 && ($_POST['password2'] === $_POST['password'])) {

			$user['passh'] = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);


			$result = $cms->getMember()->updatePassword($_SESSION['id'], trim($user['passh']));

			if ($result > 0) {
				$error .= "The update was successfull!";
			} else {
				$error .= "The update failed.";
			}
		} } else {

			if ($_SESSION['email'] != 'administrator@questionnaire.com') {
				$result = $cms->getMember()->updateInfo($_POST['email'], $_POST['phone'], $_SESSION['id'], $_POST['first'], $_POST['middle'], $_POST['last']);
			} else {
				$result = 5;
			}

			if ($result > 4) {

				$error .= "You may not delete to head super user.";
			} elseif ($result > 0 && $result < 4) {
				$error .= "The update was successfull!";
			} else {
				$error .= "The update failed.";
			}
		}
	}
	$row = $cms->getMember()->getViaId($_SESSION['id']);
	$_SESSION['email'] = $row['email'];
	?>
	<div class="heightHeader">
	</div>
	<div id="main" class="main">



		<div class="mainbody">
			<div class="centeredText">
				<?= $error ?? "" ?><br><br>
			</div>
			<div class="margin50">
				<fieldset class="fieldset01">
					<div class="centeredText">
						<a href="chooseProfile.php">Choose your website style.</a>
					</div>
					<form action="changeInfo.php" method="POST">

						<div class="settings10"><label for="email">Username:</label></div><div class="settings9"><input type="text" name="email"  value="<?= $row['email'] ?>"></div><br>

						<div class="settings10"><label
							<?php if ($_SESSION['administrator']['admin'] == 1) {} else { ?> style="display: none;" <?php } ?>
								for="phone">Phone number:</label></div><div class="settings9"><input
									<?php if ($_SESSION['administrator']['admin'] == 1) {} else { ?> style="display: none;" <?php } ?>
										type="text" name="phone" value="<?= $row['phone_number'] ?>"></div><br>

										<div class="settings10"><label for="first">First name:</label></div><div class="settings9"><input type="text" name="first"  value="<?= $row['first_name'] ?>"></div><br>
										<div class="settings10"><label for="middle">Middle names:</label></div><div class="settings9"><input type="text" name="middle"  value="<?= $row['middle_names'] ?>"></div><br>
										<div class="settings10"><label for="last">Sir name:</label></div><div class="settings9"><input type="text" name="last"  value="<?= $row['last_name'] ?>"><br></div>
										<div class="submit-middle"><input type="submit" value="UPDATE!"></div><br>
									</form>
									<br>
								</fieldset>
								<fieldset class="fieldset01">
									<form action="changeInfo.php" method="POST">
										<div class="settings10"><label for="password">Password:</label></div><div class="settings9"><input type="password" name="password" > </div><br>
										<div class="settings10"><label for="password2">Retype password:</label></div><div class="settings9"><input type="password" name="password2" > </div><br>
										<div class="width100">
											<div class="submit-middle"><input type="submit" value="SUBMIT!"></div>

										</form>
									</fieldset>

									<div style="height: 1600px;">
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
					<div class="copyright">
						<?php
						include "includes/footer.php";
						?>
					</div>
				</div>
			</body>
			</html>
