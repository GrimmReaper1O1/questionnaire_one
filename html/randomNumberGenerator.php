<?php
if (isset($_GET['reset'])) {
	?>
	<form action="randomNumberGenerator.php?numbers=yes" method="POST">
	<label for="firstNumber">Please choose length of top number.</label><br>
	<input type="number" name="firstNumber" size="10"><br>
	<label for="secondNumber">Please choose length of bottom number.</label><br>
	<input type="number" name="secondNumber" size="10"><br>
	<label for="decimal">Please choose decimal place.<br>
							  Don't enter if you don't want<br>
							  a decimal place. Otherwise it<br>
							  will be added</label><br>
	<input type="number" name="decimal" size="10"><br>
	<input type="checkbox" name="negative"><label for="negative">Make negitive numbers randomly</label><br>
	<input type="submit" value="SUBMIT!"><br>
	</from>
	<?php 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$num1 = $_POST['firstNumber'];
	$num2 = $_POST['secondNumber'];
	$dec = $_POST['decimal'];
	$one = '';
	$two = '';
	$three = '';
	$four = '';
	for ($i = 0; $i < $num1; $i++) {
		$one = $one . strval(rand(1,9));
	}
	for($i = 0; $i < $num2; $i++) {
		$two = $two . strval(rand(1,9));
	}
	for($i = 0 ; $i < $dec; $i++) {
		$three = $three . strval(rand(1,9));
	}
	for($i = 0 ; $i < $dec; $i++) {
		$four = $four . strval(rand(1,9));
	}
	echo $one . '.' . $three . "<br>";
	echo $two . '.' . $four . "<br>";
	
}