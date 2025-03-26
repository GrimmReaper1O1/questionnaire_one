<?php
$currentPath = dirname(__DIR__); 
include "../../includes/header3.php";
if ($_SESSION['administrator']['admin'] == 1) {
	// include administrative function
	$limit = 20;
	$page = $_GET['page'] ?? 1;

	$showAllAdminPersonel = $cms->getMember()->getAllAdministrators($page, $limit);

	$totalResults = $showAllAdminPersonel[0]['count'];

	?>
	<div id="main" class="main">

		<div class="heightHeader">
		</div>
		<div class="mainbody">
			<div id="mainBody">
				<div class="margin70 align-right">

					<?php
					$totalPages = ceil($totalResults / $limit);

					if ($showAllAdminPersonel === false) {
						$error = "There was an error in the attempt to show all administrators. Please try again.";
					} else {
						?>


<div class="margin50">
						<?php
						foreach ($showAllAdminPersonel[1] as $row) {
							?><h4>

									<div class="settings">FULL NAME:</div> <div class="settings"><?= $row['concat_full_name'] ?></div><br>
									<div class="settings">USERNAME:</div> <div class="settings"><?= $row['email'] ?></div><br>
									<div class="settings">PHONE NUMBER:</div> <div class="settings"><?= $row['phone_number'] ?></div><br>
									<div class="settings">CREATED BY:</div> <div class="settings"><?= $row['creator_name'] ?></div><br>
									<div class="settings">CREATED ON:</div> <div class="settings"><?php echo date('d-m-y h:i a', $row['timestamp']); ?></div><br>
									<div class="settings">SUPER PRIVILEGES:</div><div class="settings"><?php if($row['all_access_administrator'] == 1) { echo "&nbsp;YES!"; } else { echo "&nbsp;NO!"; } ?></div><br>
									<div class="settings">SCORE VIEWER:</div> <div class="settings"><?php if($row['viewer'] == 1) { echo "YES!"; } else { echo "NO!"; } ?></div><br>
									<div class="settings">STANDARD ADMINISTRATOR:</div> <div class="settings"><?php if($row != false && $row['all_access_administrator'] != 1 && $row['viewer'] != 1) { echo "YES!"; } else { echo "NO!"; } ?></div><br> <?php
									?>

									<?php
									if ($_SESSION['administrator']['root'] == 1) {
										?><br><?php
										if ($row['email'] != 'administrator@questionnaire.com'){
											?>
										<div ><p><a href="delete_admin.php?id=<?= $row['administrator_id'] ?>&uid=<?= $row['user_id'] ?>">DELETE ADMINISTRATOR!</a></p></div>
										<?php
									}
								}
								?>
								</h4>


								<?php
							} ?>
							</div>


						</div>
						<div id="bottom">
							<div id="pagination">
								<?php if ($totalPages > 1) { ?>
									<div class="centeredText"><p>-<?php
									$url = 'show_all_administrators';
									echo get_pagination_links($page, $totalPages, $url, '');

								} }
								?>
							</div>
						</div>
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
