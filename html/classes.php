<?php
$currentPath = dirname(__DIR__); 

include "includes/headerstart.php";
unset($_SESSION['layoutOfSite']['cId']);
if (isset($_SESSION['id'])) {
	unset($_SESSION['layoutOfSite']['cId']);
	unset($_SESSION['live']);
	$start = microtime(true);
	$page = $_GET['page'] ?? 1;
	$limit = 1;
	$letter = $_GET['letter'] ?? 1;
	$letterString = 'A B C D E F G H I J K L M N O P Q R S T U V W X Y Z';
	$letterArray = preg_split('/[\s]+/', $letterString);
	if (isset($_GET['unset'])) {
		unset($_SESSION['letter']);
		unset($_SESSION['search']);
		unset($_SESSION['new']);
	}
	if (isset($_GET['reset'])) {
		unset($_SESSION['subject']);
		unset($_SESSION['letter']);
		unset($_SESSION['search']);
		$_SESSION['new'] = 1;

	}


	if (isset($_GET['letter'])) {
		$_SESSION['letter'] = $_GET['letter'];

	}
	?>
	<div class="heightHeader">
	</div>
	<div id="main" class="main">


		<div class="mainbody">
			<br>
			<div class="margin80">
				<?php

				if (isset($_SESSION['warningBit']) && $_SESSION['administrator']['admin'] == 1) {
					?>
					<h1 style="font-size: 70px; color: red !important;">WARNING!!!</h1>
					<p><h1 style="font-size: 20px;">The super user administrator@questionnaire.com, otherwise known as the root asministrator has been deleted from the sql database
						anyone who signs up this user will have super user privileges. The system was set up for ease of installation. Please immediatly
						sign in as this user and give the credentials to your headmaster or the head of your organization. It is advisable you do not
						allow people access your SQL database computer at all with this system. If you need to reinstall your database due to catastrophic
						failure the means to do so are within the repository. Alternatively keep the files that came with this website.
						This mesage is for the purpose of protecting personal information.
					</h1>
				</p>
				<?php
			}
			?>

		
<div id="letters"></div>
<script src="script/adminClassesLetterArrayLinks.js"></script>
<div class="centeredText">
			<div class="headings">

				<h1>Welcome to questionnaire!</h1><br>
				<h3><a href="classes.php?reset=yes">Reset list.</a><br>
					<!-- <a href="search_for_class.php?unset=yes">Or, search for a class.</a></h3><br><br> -->
				</div>
				<div class="letters">
					<?php
					if (isset($_SESSION['letter'])) {
						$classesArray = $cms->getQuestions()->selectAllClassesViaLetterLive($page, $limit, $_SESSION['letter']);
						echo '<a href="classes.php?reset=yes">Return to alphabetical order</a><br>';
					}
					?>
				</div>
				<?php
				if (isset($_SESSION['new'])) {
					$classesArray = $cms->getQuestions()->selectAllClassesLive($page, $limit);
				}
				if (isset($classesArray)) {
					if ($classesArray[0] != false) {

						$totalResults = $classesArray[0]['count'];


						$totalPages = ceil($totalResults / $limit);
						?>

						<div>

							<?php
							foreach($classesArray[1] as $class) {
								?>

								<h2>
									<a href="selectSubject.php?cId=<?= $class['class_id'] ?>"><?= $class['class_name'] ?></a></h4><br>
								</h2>


								<p><?php echo paragraph($class['description_of_class']); ?><br><br>
									<br><br><br><br><br><br><br></p>

									<?php
									$end = microtime(true);
									echo '<br>' . ($end - $start);

									?>
									<br><br><br>
									<?php

								}
								$end = microtime(true);
							echo	$end - $start;

?>
								<div style="height: 1600px">
								</div>

							</div>
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
			// print_r($_SESSION['layoutOfSite']);
			?>
		</div>
	</div>

	<?php if (isset($totalPages)) {
		if ($totalPages > 1) { ?>
			<div id="pagination" class="pagination">

				<?php
				$url = 'classes.php';
				echo '<p>' . get_pagination_links($page, $totalPages, $url, '') . '<p>';

			}
		}


		?>
	</div>
	<?php
}
}
?>
<div class="copyright">
	<?php
	include "includes/footer2.php";
	?>
</div>

</body>
</html>

<?php
} else {
	// header("Location: login.php");
	// exit();
}
?>
