<?php
$currentPath = dirname(__DIR__); 
include "../includes/headerStyle2.php";
unset($_SESSION['update']);
if ($_SESSION['administrator']['admin'] == 1) {
	?>

	<div id="main" class="main">


		<div class="heightHeader">
		</div>

		<div class="mainbody">
			<br>
			<?php

			if (isset($_GET['updatesite'])) {

				$_SESSION['styleToSet'] = $_GET['id'];


				?>

				<div class="margin80">

					<div class="centeredText">
						<br><br>
						<h2>Are you sure you are happy with this style?</h2>

						<form id="form1" action="chooseProfile.php?updateSite2=yes" method="POST">
							<button id="button1" type="submit" form="form1" name="yes">Yes!</button>&nbsp;
							<button id="button2" type="submit" form="form1" name="no">No!</button>

						</form>
					</div>
				</div>




				<?php
			}
			if (isset($_GET['delete'])) {

				$_SESSION['delStyle'] = $_GET['delete'];
				
				?>


				<div class="margin80">

					<div class="centeredText">
						<br><br>
						<h2>Are you sure you want to delete this style?</h2>

						<form>

						</form>
						<form id="form" action="chooseProfile.php?deleteyes=yes" method="POST">
							<button id="button1" type="submit" form="form" name="yes">Yes!</button>&nbsp;
							<button id="button2" type="submit" form="form1" name="no">No!</button>
						</form>
						<form id="form1" action="chooseProfile.php">

						</div>
					</div>


					<?php
				}

				if (!isset($_GET['update']) && !isset($_GET['nonupdate']) && !isset($_GET['delete']) && !isset($_GET['updatesite'])) {
					$results = $cms->getMember()->selectStyles();
					?>

					<div class="margin80">
						<div class="centeredText">
							<?php
							if (isset($_SESSION['error'])) {
							echo $_SESSION['error'];
								unset($_SESSION['error']);
							}
							if ($results !== false) {
								foreach ($results as $styles) {
									?>
									<div>
										<p>
											<a href="chooseProfile.php?upd=yes&id=<?= $styles['id'] ?>"><?= $styles['profile_name'] ?></a><br>
											<a href="colourChangePage.php?alter=<?= $styles['id'] ?>">Alter Style</a>
										</p>
										<div style="border-bottom: 2px solid;" class="margin20">
											<p>
												<a href="chooseProfile.php?delete=<?= $styles['id'] ?>">Delete profile!</a><br>

												<?php if ($_SESSION['administrator']['root'] == 1) { ?>

												<a href="chooseProfile.php?updatesite=yes&id=<?= $styles['id'] ?>">Set this profile as main site setting</a><br>
												<?php } ?>
											</p>
										</div>
									</div>
									<?php
								}
							}
							?>
						</div>
					</div>

					<?php
				}
				?>

				<?php
			}

			print_r($_SESSION['layoutOfSite']);
			?>
			<div style="height: 1200px;">
			</div>
		</div>
	</div>

	<?php
	if (isset($_SESSION['layoutOfSite']['enableMovingBars'])) {
		if ($_SESSION['layoutOfSite']['enableMovingBars'] == 0) {

			?>
			<div id="rightLowerSidebar" class="rightLowerSidebar">

			</div>

			<?php

		}
	}
	?>
</div>
</div>

?>
<div>
	<?php
	include '../includes/footer2.php';
	?>
</div>
</body>
</html>
