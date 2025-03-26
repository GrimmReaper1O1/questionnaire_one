<?php
$currentPath = dirname(__DIR__); 
include "../includes/header3.php";

if ($_SESSION['administrator']['admin'] == 1) {
	$error = '';
	$error2 = '';
	$message = '';
	if (isset($_GET['delete'])) {
		$cms->getQuestions()->deleteVideo();
	}



	$video = $cms->getQuestions()->selectVideo();


	?>
	<div class="heightHeader"></div>
	<div id="main" class="main mainbody">
		<div style="text-align: right !important;">
			<div class="inline width20">
				<br><br>
				<span><a href="introductionToSubject.php?id=<?= $_SESSION['subject'] ?>">BACK TO INTRODUCTION!</a></span>
				<br><br>
			</div>
		</div>
		<?php
		if ($video != false) {
			?>
			<br><br><br>

			<div class="centeredText">
			<div class="video">	
			
			<video  style="width: 100%" poster="<?= $row['posterFilename'] ?? '' ?>"
					id="subjectVideo"
					type="video/webm" preload="none"
					controls
					alt="<?= $video['alt_text'] ?>" >

					<source src="../uploads/<?= $video['file_name'] ?? '' ?>" type="video/mp4" />
						<source src="../uploads/<?= $video['file_name'] ?? '' ?>" type="video/webm" />
						</video>
		</div><br>
					</div>
				<?php } ?>

				<br>
				<div class="centeredText">
					<?php
					if ($video != false) {
						?>

						<span> <a href="uploadVideo.php?delete=<?= $video['id'] ?>">DELETE VIDEO!</a></span>
						<?php
					}
					?>
				</div>
				<br>
				<br>
				<?php
				if (isset($_GET['success'])) {
					echo '<h1 class="centeredText">Upload Successfull!</h1>';
				}
				?>
				<div class="width50 centeredText">
				<div class="inlineBlock alignLeft">
				<div id="status"></div>
				<form id='apendix' action="uploadVideo.php" method="POST" enctype="multipart/form-data">
					<label>Description of video:</label><input id="alt" type="text" name="alt" /><br>
					<label>Video file choice:</label><input type="file" id="file" name="file" onchange="uploadFile()" /><br>
					<progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
					<h3 id="status"></h3>
					<p id="loaded"></p>

				</form>
			</div>
			</div>
				<script src='../script/videoUpload.js'></script>

				<?php
				echo $message . $error2 . $error;  ?>

				<div class="addHeight">
				</div>
			</div>
			<?php
			include '../includes/footer2.php'; ?>
		</body>
		</html>





		<?php
	} else {
		header('Location: ../classes.php');
	}
