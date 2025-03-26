<?php
$currentPath = dirname(__DIR__); 
include "../includes/header3.php";

if ($_SESSION['administrator']['admin'] == 1) {
	$error = '';
	$error2 = '';
	$message = '';
	if (isset($_GET['delete'])) {
		$cms->getQuestions()->deleteAudio();
	}


	$audio = $cms->getQuestions()->selectAudio();


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
		<br><br><br>
		<?php if ($audio != false) {
			?>
			<div id="status"></div>
			<audio style="width: 100%;" controls>
				<source src=",,/uploads/<?= $audio['file_name'] ?? '' ?>" type="audio/ogg">
					<source src="../uploads/<?= $audio['file_name'] ?? '' ?>" type="audio/mpeg">
						Your browser does not support the audio element.
					</audio><br>
					<?php
				} ?>
				<br>
				<div class="centeredText">
					<?php
					if ($audio != false) {
						?>

						<span> <a href="uploadAudio.php?delete=<?= $audio['id'] ?>">DELETE AUDIO!</a></span>
						<?php
					} ?>

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
					<h3 id="status"></h3>
				<form id='apendix' action="uploadAudio.php" method="POST" enctype="multipart/form-data">
					<label>Description of audio:</label><input id="alt" type="text" name="alt" /><br>
					<label>Audio file choice:</label><input id="file" type="file" name="file" onchange="uploadFile()" /><br>
					<progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
					<p id="loaded"></p>
				</form>
			</div>
			</div>
				<script src="../script/audioUpload.js"></script>

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
