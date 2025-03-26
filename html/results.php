<?php
$s = microtime(true);
include "includes/header3.php";
$endTime = microtime(TRUE);
$finished = 0;
$time = ($endTime - $_SESSION['startTime']);
$minutes = $time / 60;
$fMinutes = floor($minutes);
$fPS = $minutes - floatval($fMinutes);
$hours = $fMinutes / 60;
$fHours = floor($hours);
$fPM = floatval($hours) - $fHours;
$seconds = $fPS * 60;
$minutes = $fPM * 60;
if ($_SESSION['record'] = 1) {
	$finished = 1;
	unset($_SESSION['record']);
}
$errorOrSuccess = '';
$finishingTime = floor($hours) . " hours ". $minutes . " minutes "  . floor($seconds) . " seconds ";

?>
<div id="main" class="main">

	<div class="heightHeader">
	</div>

	<div class="mainbody">
		<script src="src/canvas.js">
		</script>
		<?php
		// print_r($_POST['data']);
		if (isset($_POST['data'])) {
			$data = $_POST['data'];
			$data2 = json_decode($data);
			unset($_SESSION['data']);
			$_SESSION['data'] = $data2;
		} else {

			$data2 = $_SESSION['data'];

		}
		$result = $cms->getQuestions()->selectFirstResult();





		$pagesCompleted = 0;
		$questionsAttempted = 0;
		$right = 0;
		$wrong = 0;
		print_r($data2);
		foreach($data2 as $pages) {

			if (isset($pages->length)) {
				echo 'here';
				$pagesCompleted++;
				for ($i = 0; $i < $pages->length; $i++) {
					$property = 'a'.$i;

					if ($pages->$property->right > 0 || $pages->$property->wrong > 0) {
						$questionsAttempted++;
					}
					$right = $right + $pages->$property->right;
					$wrong = $wrong + $pages->$property->wrong;

				}
			}
		}

		$whole = $right + $wrong;
		$onePer = $whole / 100;
		if ($right != 0) {
			$percentRight = $right / $onePer;
		} else {
			$percentRight = 0;

		}

		$percentage = intval($percentRight);
		$_SESSION['percentage'] = $percentage;
		$results = $cms->getQuestions()->selectResultsString();
		if (isset($_GET['record'])) {
			if ($results == false) {

				$timestamp = strtotime('now');
			} else {
				$end = strtotime('now') - $result['timestamp'];
				$timestamp = (($end / 60) / 180);
			}
			if ($results != false) {

				$data = $results['string'] . "{ x: " . (((strtotime('now') - $result['timestamp']) / 60) / 180) . ", y: " . (intval($percentRight)) . "},";
				$count = $cms->getQuestions()->updateSubjectResults($data, (((strtotime('now') - $result['timestamp']) / 60) / 180));
				if ($count > 0) {
					$errorOrSuccess = "SUCCESSFULLY UPLOADED RESULTS!";
				} else {
					$errorOrSuccess = "THERE WAS A PROBLEM.";
				}
			} else {
				$data = "{ x: " . 0 . ", y: " . intval($percentRight) . "},";
				try {
					$cms->getQuestions()->recordSubjectResultsInitial($data, '0');
				} catch(Exception $e) {
					$errorOrSuccess = "THERE WAS A PROBLEM.";
				}
			}
			try {
				$cms->getQuestions()->recordResults($percentage, json_encode($_SESSION['data']), $timestamp, $finishingTime, $finished);


			} catch(Exception $e) {
				$errorOrSuccess .= "PLEASE TRY AGAIN.";
			}


		}

		?><div class="margin80">
			<div class="centeredText">
				<?php echo $errorOrSuccess . "<br>"; ?>
				<h1>TIME TAKEN IN THIS ROUND OF THE QUESTIONNAIRE</h1>
				<h1><?PHP echo $finishingTime; ?></h1>
				<h1>RECORD RESULTS</h1>
				<p>Please remember, if you record your result before completion of the subjects question set, it is not
					an accurate result in relation to the whole question group. If you only do one page of questions, it will result
					in a percentage that dips and raises based on learning new content. If possible, you should only record your result after a
					full question set has been completed.</p>
					<form action="results.php?record=yes" method="POST">
						<input type="submit" value="RECORD!">
					</form>
					<br>
					<h1>PAGES ATTEMPTED: <?= $pagesCompleted ?></h1><br>
					<h4>QUESTIONS ATTEMPTED: <?= $questionsAttempted ?></h4>
					<h4>OVERALL RIGHT ANSWERS: <?= $right ?></h4>
					<h4>OVERALL WRONG ANSWERS: <?= $wrong ?></h4><br>
					<h1 style=>OVERALL RESULT: <?= intval($percentRight) . "%" ?></h1>
				</div>

				<?php
				if ($right == 0 && $wrong == 0)  {
					$wrong = 1;
				}
				?>
				<div class="margin25">
					<canvas id="myCanvas" style="width: 100%"></canvas>
				</div>
				<div style="text-align: center;">
					<br>
					<br>
					<h1>ALL TIME RESULTS</h1>
					<br>
				</div>
				<div style="height: 20px;">
				</div>
				<div class="margin50">
					<?php
					if ($results != false) { ?>
						<canvas id="lineChart" style="width: 100%"></canvas>
						<?php
					}
					?>
				</div>
				<div  class="centeredText">
					<a href='questionnaire.php?refresh=yes<?php echo "&page=".$_SESSION['page']; if (isset($_SESSION['fast'])) { echo "&fast=yes";} ?>'>RETURN TO QUESTIONNAIRE!</a>
				</div>
				<script>

				var myCanvas = document.getElementById("myCanvas");
				myCanvas.width = 1000;
				myCanvas.height = 1000;

				var ctx = myCanvas.getContext("2d");
				ctx.lineWidth = 2;

				ctx.imageSmoothingEnabled = true;
				var myScore = { rigth: <?= $right ?>,
					wrong: <?= $wrong ?> }

					var myDoughnutchart = new PieChart({
						canvas: myCanvas,

						seriesName: "Question Score",
						padding: 2,
						data: myScore,
						colors:["#07fa07","#fa0707"],
						doughnutHoleSize:0.5,
						doughnutHoleColor:"#100dd9"
					});

					myDoughnutchart.draw();

				</script>




				<?php
				$pageCounter = 0;
				foreach($data2 as $page) {
					$pageResults = 0;
					$pageCounter++;
					?>
					<?php

					if (isset($page->length)) {
						?>
						<div class="centeredText">
							<?php
							echo "<br>";
							echo "<h3>PAGE: " . $pageCounter . "</h3><br>";
							echo "<br>";
							?>
							<div class="width80">

								<?php
								for ($i = 0; $i < $page->length; $i++) {
									$pageResults++;
									$property = 'a'. $i;

									if ($page->$property->right != 0 && $page->$property->wrong != 0 ||
									$page->$property->right == 0 && $page->$property->wrong != 0 ||
									$page->$property->right != 0 && $page->$property->wrong == 0) {
										?>



										<div  class="settings10">
											<legend  for="myCanvas<?= $pageCounter.'a'.$i ?>" ><?= "Question Number: " . $pageResults . "<br>" ?>
												<canvas id="myCanvas<?= $pageCounter.'a'.$i ?>"></canvas>
											</legend>
										</div>



										<script>

										var myCanvas = document.getElementById("myCanvas<?= $pageCounter.'a'.$i ?>");
										myCanvas.width = 200;
										myCanvas.height = 200;

										var ctx = myCanvas.getContext("2d");
										ctx.lineWidth = 2;

										ctx.imageSmoothingEnabled = true;
										var myScore = { <?php if ($page->$property->right == 0 && $page->$property->wrong == 0) {
											echo "right: 0 , wrong: 1"; } else {
												echo "right:" . $page->$property->right . "," .
												"wrong:" . $page->$property->wrong;  } ?>
											}
											var myDoughnutchart<?= $pageCounter.'a'.$i ?> = new PieChart({
												canvas: myCanvas,

												seriesName: "Question Score",
												padding: 20,
												data: myScore,
												colors:["#07fa07","#fa0707"],
												doughnutHoleSize:0.5,
												doughnutHoleColor:"#100dd9"
											});
											myDoughnutchart<?= $pageCounter.'a'.$i ?>.draw();
										</script>
										<?php
									}
								}
								?>

								<?php
							}
							?>

							<?php
						}
						if ($results != false) {
							?>
						</div>
						<script>

						window.onload = function () {
							var myLineChart = new LineChart({
								canvasId: "lineChart",
								minX: <?= 0 ?>,
								minY: 0,
								maxX: <?php if ($result == false) {echo 3; } else { echo ((((strtotime('now') - $result['timestamp']) / 60) / 180)); } ?>,
								maxY: 100,
								unitsPerTickX: 8,
								unitsPerTickY: 10
							});

							var data = [
								{ x: 0, y: <?= $result['score'] ?> },
								<?=   $results['string'] ?? ''  ?>



								{ x: <?= ((((strtotime('now') - $result['timestamp']) / 60) / 180)) ?>, y: <?= intval($percentRight) ?>}];

								myLineChart.drawLine(data, "#07fa07", 3);
							};
						</script>
						<?php
					}
					?></div>

					<div style="color: white !important" class="centeredText">
						<p ><a href='questionnaire.php?refresh=yes<?php echo "&page=".$_SESSION['page']; if (isset($_SESSION['fast'])) { echo "&fast=yes";} ?>'>RETURN TO QUESTIONNAIRE!</a></p>
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

		<div class="copyright">
			<?php
			include "includes/footer.php";
			?>
		</div>
	</div>
</div>

<?php
$e = microtime(true);
echo ($e - $s);
?>
</body>
</html>
