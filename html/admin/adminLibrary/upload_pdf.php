<?php
$currentPath = dirname(__DIR__); 
include "../../includes/header3.php";
if ($_SESSION['administrator']['root'] == 1) {
	$error = '';
	$error2 = '';
	$message = '';
	if(isset($_SESSION['site']['cId'])) {

		$class = $_SESSION['site']['cId'];
	} else {
		$class = 'empty';
	}


	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$moved = false;

		if($class != 'empty' || isset($_POST['ignoreClass'])) {
			try {
				$upload_path = '../../uploads/';
				$max_size = 2137552 * 3;
				$allowed_types = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
				'application/vnd.oasis.opendocument.text','text/plain', 'application/rtf'];
				$allowed_exts = ['pdf', 'doc', 'docx', 'odt', 'txt', 'rtf'];

				$error2 = ($_FILES['document']['size'] <= $max_size) ? '' : 'Your file is too large. It must be under 2MB';
				$type = mime_content_type($_FILES['document']['tmp_name']);
				$error2 .= in_array($type, $allowed_types) ? '' : 'Your file is of the wrong type. It must be a pdf, doc, docx, odt, txt, or rtf.';
				$ext = strtolower(pathinfo($_FILES['document']['name'], PATHINFO_EXTENSION));
				$error2 .= in_array($ext, $allowed_exts) ? '' : 'It must have the right file extension.';

				if ($error2 === '') {
					$filename = create_filename($_FILES['document']['name'], $upload_path);
					$destination = $upload_path . $filename;
					$moved = move_uploaded_file($_FILES['document']['tmp_name'], $destination);
					$destination = "../uploads/" . $filename;

				}

			} catch (Error $e) {
				$error .= "You didn't select a file.";
			}
			if ($moved === true) {


				try {
					if (isset($_POST['ignoreClass'])) {

						$cms->getLibrary()->insertIntoLibrary($_POST['author'], $_POST['name'], $destination, $_POST['description'], $_SESSION['id'], 0);
						$message .= "Your document updated successfully! ";
						$result = $cms->getLibrary()->selectDocumentByAuthorName($_POST['author'], $_POST['name'], $_SESSION['id']);
						$cms->getLibrary()->insertKeywords($result['id'], $_POST['key1'], $_POST['key2'], $_POST['key3'], $_POST['key4'], $_POST['key5'], $_POST['key6']);


					} else {


						$cms->getLibrary()->insertIntoLibrary($_POST['author'], $_POST['name'], $destination, $_POST['description'], $_SESSION['id'], $class);
						$message .= "Your document updated successfully! ";
						$row = $cms->getLibrary()->selectDocumentByAuthorName($_POST['author'], $_POST['name'], $_SESSION['id']);
						$cms->getLibrary()->insertKeywords($row['id'], $_POST['key1'], $_POST['key2'], $_POST['key3'], $_POST['key4'], $_POST['key5'], $_POST['key6']);




					}

				} catch(Exception $e) {
					$error2 .= "We're sorry! There was a problem. Please try again.";
				}

			}
		} else {
			$error .= "You were not in a class when you uploaded the document.";
		}
	}
	?>
	<div id="main" class="main">

		<div class="heightHeader">
		</div>
		<div class="mainbody">
			<div class="centeredText">
				<?= $error . $message . $error2 . '<br>' ?? '' ?>
				<?php
				// what the fuck is this shit
				if ($message == '' || $error2 != '' || $message != '') {
					?>
					<p>CLASS MUST BE ENTERED THROUGH EITHER ADMINISTER CLASSES OR CLASSES BEFORE UPLOADING.</p>
				</div>

				<div class="margin80">
					<fieldset class="fieldset2">
						<form action="upload_pdf.php" method="POST" enctype="multipart/form-data">

							<input type="checkbox" name="ignoreClass"><label for="ignoreClass"> Insert into the main library without class.</label><br>
							<label for="name">Document name:</label>
							<input class="width100" type="text" name="name"value="<?=  $_POST['name'] ?? '' ?>"><br>

							<label for="author">Author:</label>
							<input  class="width100" type="text" size="50" name="author" value="<?= $_POST['author'] ?? '' ?>"><br>
							Description of file:<br>
							<textarea class="width100" name="description" rows="10" > <?= $_POST['description'] ?? '' ?></textarea><br>
							<br>
							<label for="key1">Up to seven keywords per field:</label><br>
							<input  class="width100" type="text" name="key1" size="80" value="<?=  $_POST['key1'] ?? '' ?>"><br>
							<input  class="width100" type="text" name="key2" size="80" value="<?=  $_POST['key2'] ?? '' ?>"><br>
							<input  class="width100" type="text" name="key3" size="80" value="<?=  $_POST['key3'] ?? '' ?>"><br>
							<input class="width100"  type="text" name="key4" size="80" value="<?=  $_POST['key4'] ?? '' ?>"><br>
							<input  class="width100" type="text" name="key5" size="80" value="<?=  $_POST['key5'] ?? '' ?>"><br>
							<input  class="width100" type="text" name="key6" size="80" value="<?=  $_POST['key6'] ?? '' ?>"><br>
							<br>
							<label for="document">Upload PDF file:</label>
							<div style="padding-right: 1%; z-index: 9; margin: 0 auto; width:20%"><input type="file" name="document"></div><br>
							<div class="submit-middle"> <input  type="submit" name="submit" value="SUBMIT!"></div>
						</form>
					</fieldset>
				</div>
				<div style="height: 1200px;">
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
<?php }
} else {
	header("Location: ../../../classes.php");
	exit();
}
?>

<div>
	<?php include '../../includes/footer2.php'; ?>
</div>
</body>
</html>
