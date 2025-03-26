<?php
include "../../src/bootstrap.php";
$error = '';
$error2 = '';
$message = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$moved = false;


	try {
		$upload_path = '../uploads/';
		$max_size = 3500000;
		$allowed_types = ['image/jpeg', 'image/gif', 'image/png',];
		$allowed_exts = ['jpg', 'jpeg', 'png',];

		$error2 = ($_FILES['file']['size'] <= $max_size) ? '' : 'Your file is too large. It must be under 2MB';
		$type = mime_content_type($_FILES['file']['tmp_name']);
		$error2 .= in_array($type, $allowed_types) ? '' : 'Your file is of the wrong type. It must be a pdf, doc, docx, odt, txt, or rtf.';
		$ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
		$error2 .= in_array($ext, $allowed_exts) ? '' : 'It must have the right file extension.';

		if ($error2 === '') {
			$filename = create_filename($_FILES['file']['name'], $upload_path);
			$destination = $upload_path . $filename;
			$moved = move_uploaded_file($_FILES['file']['tmp_name'], $destination);


		}

	} catch (Error $e) {
		$error .= "You didn't select a file.";
	}
	if ($moved === true) {


		try {

			$floatNum = floatval($_POST['floatNum']);

			$cms->getQuestions()->insertApendix($filename, $_POST['alt'], $_SESSION['id'], $floatNum);
			$message .= "Your document updated successfully! ";




		} catch(Exception $e) {
			$error2 .= "We're sorry! There was a problem. Please try again.";
		}

	}

}
?>
