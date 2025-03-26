<?php
$currentPath = dirname(__DIR__); 
include "../includes/header3.php";

if ($_SESSION['administrator']['admin'] == 1) {
	$error = '';
	$error2 = '';
	$message = '';

	if (isset($_GET['delete'])) {

		if ($_GET['delete'] != 'none') {
			$result = $cms->getQuestions()->deleteApendix($_GET['delete']);
			if ($result < 0) {
				$error .= 'The deletion was successfull!<br>';
			} else {
				$error .= 'The deletion was not successfull.<br>';
			}

		}

	}

	$apendixArray = $cms->getQuestions()->selectImages();
	$counter = 0;
	foreach ($apendixArray as $apendix) {
		$apendixFloatNum[$counter] = $apendix['float_num'];

		$counter++;
	}

	?>


	<script>
	var floatNum = <?= JSON_encode($apendixFloatNum) ?>;

</script>

<?php
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
	<div class="width80 marginAuto">
		<div  class="floatLeft width70">
			<br>
			<br>
			<br>
			<?php
			if (isset($_GET['success'])) {
				echo '<h1 class="centeredText">Upload Successfull!</h1>';
			}
			?>
			<div id="status"></div>
			<form id='apendix' action="uploadApendix.php" method="POST" enctype="multipart/form-data">
				<div class="width50 inline"><label>Description of appendix:</label></div><div class="inline width50"><input id="alt" type="text" name="alt" /><br></div><br>
				<div class="width50 inline"><label>Position via floating point number:</label></div><div class="inline width50"><input id="floatNum" type="text" name="floatNum" /><br></div><br>
				<div class="width100 centeredText"><label>Appendix file choice:</label></div><br>
				<div class="centeredText"><input style="display: inline-block;" id="file" type="file" name="file" onchange="uploadFile()" /></div>
				<progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
				<h3 id="status"></h3>
				<p id="loaded"></p>
			</form>
			<script src="../script/apendixUpload.js"></script>
		</div>
		<div class="floatLeft width30">
			<div>
				<?php
				if ($apendixArray != false) {
					$i = 0;
					foreach ($apendixArray as $apendix){
						?>
						<div class="centeredText">
							<figure>
								<img id="<?= $i ?>"  class="apendix" src="../uploads/<?= $apendix['file_name'] ?? '' ?>" alt="<?= $apendix['alt_text'] ?? '' ?>" width="30%" />
								<figcaption>Appendix <?= round($apendix['float_num'], 2) ?? 'Not listed.' ?> </figcaption>
							</figure>
							<br>
							<span>
								<a href="uploadApendix.php?delete=<?= $apendix['id'] ?? 'none' ?>">DELETE APPENDIX</a>
							</span>
							<br>
						</div>
						<?php
						$i++;
					}
				}
				?>


			</div>
		</div>

	</div>



	<div class="addHeight">
	</div>
	<div id="imageDiv">
		<div id="img" ><div id="placement" class="centeredText"></div></div>
		<div id="buttons centeredText marginAuto"></div>
		<div class="inline width100">
			<div id="one"><button id="left">Left</button></div><div id="cDiv"></div><div id="two"><button id="right">Right</button></div>
		</div>
	</div>
</div>
<?php
include '../includes/footer2.php'; ?>
<script src="../script/showImage.js"></script>
</body>
</html>





<?php
} else {
	header('Location: ../classes.php');
}
