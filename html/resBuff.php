<?php

?>

<!DOCTYPE HTML>
<html>
<head>
</head>
<body style="background-color: rgb(16,13,217);">
	<div id="res">
	</div>
	<script ></script>
	<script>

	<?php for ($i = 1; $i <= $_GET['tp']; $i++) { ?>
		var page<?= $i ?> = JSON.parse(sessionStorage.getItem('page<?= $i ?>'));

		<?php
	}
	?>
	var pages = {}
	<?php for ($i = 1; $i <= $_GET['tp']; $i++) { ?>
		pages.pg<?= $i ?> = page<?= $i ?>;

		<?php
	}
	?>

	console.log(pages);
	var place = JSON.stringify(pages);
	console.log(place);
	console.log(JSON.parse(place));
	debugger;
	var url = 'results.php';
	var div1 = document.getElementById('res');

	var form = "<form style='visibility; hidden;' id='form' action='" + url + "' method='post'>" +
	"<input style='visibility; hidden;'id='transfer' type='text' name='data' value='" + place + "' />" +
	'</form>';

	div1.innerHTML += form;

	document.addEventListener('DOMContentLoaded',  function() {
		document.getElementById('form').submit();
	} );

</script>

</body>
</html>
