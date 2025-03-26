<?php
include "includes/header3.php";
$questions = 5;
for ($i = 1; $i < $questions; $i++) {
	$neg['1' . $i] = 0;
	$neg['2' . $i] = 0;
}
$minus = '<b style="color:white">-</b>';
$space = " &nbsp; ";
$s1 = '';
$s2 = '';
?>
<div class="heightHeader"></div>
<div>
<div style="height: 50px"></div>


<?php

if (isset($_GET['reset'])) {
	?>
	<div class="centeredText margin50">
	<form action="addition.php?numbers=yes" method="POST">
		<label for="firstNumber">Please choose length of top number.</label><br>
		<input type="number" name="firstNumber" size="10"><br>
		<label for="secondNumber">Please choose length of bottom number.</label><br>
		<input type="number" name="secondNumber" size="10"><br>
		<label for="decimalPlace">Please choose decimal place.<br>
			Don't enter if you don't want<br>
			a decimal place. </label><br>
			<input type="number" name="decimalPlace" size="10"><br>
			<input type="checkbox" name="negative"><label for="negative">Make negitive numbers randomly</label><br>
			<input style="display: inline-block;" type="submit" value="SUBMIT!"><br>
		</from>
</div>
		<?php
	}
	if (isset($_POST['firstNumber'])) {
		if ($_POST['firstNumber'] < $_POST['secondNumber']) {
			$_SESSION['firstNumber'] = $_POST['secondNumber'];
			$_SESSION['secondNumber'] = $_POST['firstNumber'];

		} else {
			$_SESSION['firstNumber'] = $_POST['firstNumber'];
			$_SESSION['secondNumber'] = $_POST['secondNumber'];
		}
		if ($_POST['decimalPlace'] == '') {
			$_SESSION['decimalPlace'] = 0;
		} else {
			$_SESSION['decimalPlace'] = $_POST['decimalPlace'];

		}

		if (isset($_POST['negative'])) {
			$_SESSION['negative'] = 'on';

		} else { $_SESSION['negative'] = 'off';
		}
	}

	if (isset($_GET['numbers'])) {
		if ($_SESSION['firstNumber'] != '' && $_SESSION['secondNumber'] != '') {
			$r1 = $_SESSION['firstNumber'] - $_SESSION['decimalPlace'];
			$r2 = $_SESSION['firstNumber'] - $r1;

			$r3 = $_SESSION['secondNumber'] - $_SESSION['decimalPlace'];
			$r4 = $_SESSION['secondNumber'] - $r3;


			$r5 = $_SESSION['decimalPlace'];

			$nine = "9";
			$zero = "0";
			$one = '1';
			$a1 = "";
			$a2 = '';
			$a3 = '';
			$a4 = '';
			$b1 = '';
			$b2 = '';
			$b3 = '';
			$b4 = '';
			$r1 = $r1 + $r5;
			$r3 = $r3 + $r5;
			for($a = 0; $a < $r1; $a++) {
				$a1 = $a1 . $nine;
			}

			for($b = 0; $b < $r2; $b++) {
				$b1 = $b1 . $nine;
			}
			$_SESSION['a1'] = $a1;
			$_SESSION['b1'] = $b1;
			for($c = 0; $c < ($r1 -1); $c++)  {
				$a3 = $a3 . $zero;
			}
			for($d = 0; $d < ($r2); $d++)  {
				$a4 = $a4 . $zero;
			}

			$_SESSION['a3'] = $one . $a3;
			$_SESSION['a4'] = $a4;
			for($e = 0; $e < $r3; $e++) {
				$a2 = $a2 . $nine;
			}

			for($f = 0; $f < $r4; $f++) {
				$b2 = $b2 . $nine;
			}

			$_SESSION['a2'] = $a2;
			$_SESSION['b2'] = $b2;
			for($g = 0; $g < ($r3 -1); $g++)  {
				$b3 = $b3 . $zero;
			}
			for($h = 0; $h < $r4; $h++)  {
				$b4 = $b4 . $zero;
			}

			$_SESSION['b3'] = $one . $b3;
			$_SESSION['b4'] = $b4;



			?>
			<div class="margin50">
			<form action="addition.php?calculate=yes" method="POST">
				<?php

				for($i = 1; $i < $questions; $i++) {
					$top1 = rand(intval($_SESSION['a3']), intval($_SESSION['a1']));
					$top2 = rand(intval($_SESSION['b3']), intval($_SESSION['a2']));


					if ($_SESSION['decimalPlace'] != 0) {
						$bottom1 = rand(0, intval($_SESSION['b1']));
						$bottom2 = rand(0, intval($_SESSION['b2']));
						$bot1len = strlen(strval($bottom1));
						$bot2len = strlen(strval($bottom2));
						if ($bot1len < $r2) {
							$count =  $r2 - $bot1len;
							for ($p = 0; $p < $count; $p++) {
								$v = strval(rand(1,9));
								$bottom1 = $bottom1 . $v;
							}
						}
						if ($bot2len < $r4) {
							$count = $r4 - $bot2len;
							for ($p = 0; $p < $count; $p++) {
								$v = strval(rand(1,9));
								$bottom2 = $bottom2 . $v;
							}
						}
						$top = strval($top1) . '.' . strval($bottom1);
						$bottom = strval($top2) . '.' . strval($bottom2);

					} else {
						$top = $top1;
						$bottom = $top2;
					}


					$topLen = strlen(strval($top));
					$bottomLen = strlen(strval($bottom));
					if ($_SESSION['negative'] == 'on') {
						$negOn = rand(0, 1);
						if ($negOn == 1) {
							$top = "-" . $top;
							$neg['1' . $i] = 1;

						}
						$negOn = rand(0,1);
						if ($negOn == 1) {
							$bottom = "-" . $bottom;
							$neg['2' . $i] = 1;

						}
					}
					$_SESSION['answ' . $i] = floatval($top) + floatval($bottom);





					if ($bottomLen < $topLen) {
						$remainingLen = $topLen - $bottomLen;

						for($p = 0; $p < ($remainingLen); $p++) {
							$s2 = $s2 . $space;
						}
					}
					if ($neg['1' . $i] == 1 && $neg['2' . $i] == 0) {
						$_SESSION['bottom' . $i] = "<b>+</b>" . '<b style="color: '. $_SESSION['layoutOfSite']['mbc'].'">-</b>' . $space . $s2 . strval($bottom) .  "<br>";

					} else {
						$_SESSION['bottom' . $i] = "<b>+</b>" . $space . $s2 . strval($bottom) .  "<br>";
					}
					if ($neg['1' . $i] == 0 && $neg['2' . $i] == 1) {
						$_SESSION['top' . $i] =  '<b style="color: '. $_SESSION['layoutOfSite']['mbc'].'">+</b>' . '<b style="color: '. $_SESSION['layoutOfSite']['mbc'].'">-</b>' . $space . strval($top) . "<br>";
					} else {
						$_SESSION['top' . $i] =  '<b style="color: '. $_SESSION['layoutOfSite']['mbc'].'">+</b>' . $space . strval($top) . "<br>";
					}
					if ($neg['1' . $i] == 0 && $neg['2' . $i] == 0) {
						$_SESSION['top' . $i] =  '<b style="color: '. $_SESSION['layoutOfSite']['mbc'].'">+</b>' . $space . strval($top) . "<br>";
						$_SESSION['bottom' . $i] = "<b>+</b>" . $space . $s2 . strval($bottom) .  "<br>";
					} else {

					}

					echo $_SESSION['top' . $i];
					echo $_SESSION['bottom' . $i];
					$s1 = '';
					$s2 = '';


					?>

					<input type="text" name="question<?= $i ?>" size="20"><br><br><br>

					<?php
				} ?>
				<div class="centeredText">
				<input style="display: inline-block;" type="submit" value="CHECK QUESTIONS!">
			</div>
			</form>
			<form action="addition.php?reset=yes" method="POST">
		<div class="centeredText">		
			<input style="display: inline-block;" type="submit" value="RESET!">
			</div>
		</form>
			</div>
			<?php

		} else {


			echo "<div class='centeredText'>You didn't select both numbers. <a href='addition.php?reset=yes'>Please try again!</a></div>";

		}
	}




	if (isset($_GET['calculate'])) {
			
			?>
			<div class="margin50">

			<?php
		for($i = 1; $i < $questions; $i++) {
			$top = $_SESSION['top' . $i];
			$bottom = $_SESSION['bottom' . $i];
			$topLen = strlen(strval($top));
			$bottomLen = strlen(strval($bottom));

			$s1 = '';
			$s2 = '';
			echo $_SESSION['top' . $i];
			echo $_SESSION['bottom' . $i];
			echo "GIVEN: " . $_POST['question' . $i]. "<br>";
			echo "ANSWER: " . $_SESSION['answ' . $i] . "<br><br>";

			if ($_SESSION['answ' . $i] == $_POST['question' . $i]) {
				echo "CORRECT!" . "<br><br>";

			} else {
				echo "NOT CORRECT." . "<br><br>";

			}
		}		?>
		<form action="addition.php?numbers=yes" method="POST">
			<div class="centeredText">
			<input style="display: inline-block" type="submit" name="SUBMIT!">
	</div>
		</form>
		<form action="addition.php?reset=yes" method="POST">
		<div class="centeredText">
		
		<input style="display: inline-block" type="submit" value="RESET!">
	</div>	
	</from>
	</div>
<?php
	}
	include 'includes/footer2.php';
	?>
	<div class="addHeight"></div>	<div class="addHeight"></div>
</div>
</div>

</body>
</html>
