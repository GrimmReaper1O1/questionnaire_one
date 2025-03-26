	<?php
//include "../src/bootstrap.php";
session_start();

$array[0]['question'] = 'Tom and mandy went to the store and bought some chocolate. <br> The above should be spelt with commas in which of the following ways';
$array[0]['a1'] = 'Tom, and Mandy went to the store, and bought some chocolate. <br><br> Commas are requried before all co-ordinating conjunctions.';
$array[0]['a2'] = 'Tom and Mandy went to the store and bought some chocolate. <br><br> No commas are required before any adverbs.';
$array[0]['a3'] = 'Tom and Mandy, went to the store and bought some chocolate. <br><br> Commas are required as dramatic pauses, but not in regards to less than three co-ordinating conjunctions.';
$array[0]['a4'] = 'Tom and Mandy went to the store and, bought some chocolate. <br><br> A comma is required after three or more co-ordinating conjunctions.';
$array[0]['a5'] = 'Tom and Mandy went to, the store and, bought some chocolate. <br><br> A dranatic pause should be used to define meaning and a comma is required after a co-ordinating conjunction.';
$array[0]['a6'] = 'Tom and Mandy went to the store, and bought some chocolate. <br><br> A comma is not always required for a co-ordinating conjunction. It is up to your discression as to where to use one. ';
$array[0]['a7'] = 'Tom and Mandy went to the store and bought, some chocolate. <br><br> A dramatic pause enhances the form of a sentence.';
$array[0]['a8'] = 'Tom and Mandy, went to the store and bought, some chocolate <br><br> Commas should be used to separate clauses, both independent and dependent.';
$array[0]['asw1'] = "Wrong <br>Tom, and Mandy went to the store, and bought some chocolate. <br> Essential information should never be separated by a comma.";
$array[0]['asw2'] = "Wrong <br>Tom and Mandy went to the store and bought some chocolate. <br> A comma is required if there are two co-ordinating conjunctions or more but <br> should never be separated by a comma.";
$array[0]['asw3'] = "Wrong <br>Tom and Mandy, went to the store and bought some chocolate. <br> Although a dramatic pause could be used here it is best not to use too many <br> commas and a comma is required when two or more co-ordinating conjunctions are used.";
$array[0]['asw4'] = "Wrong <br>Tom and Mandy went to the store and, bought some chocolate. <br> The comma should come before the co-ordination conjunction, not after, and must <br> be used when there are two or more co-ordinating conjunctions.";
$array[0]['asw5'] = "Wrong <br>Tom and Mandy went to, the store and, bought some chocolate. <br> This is the wrong place to use a co-ordinating conjunction in both cases.";
$array[0]['asw6'] = "Corect <br>Tom and Mandy went to the store, and bought some chocolate. <br> A comma should never be used to separate essential information and must be used when there are two or more co-ordinating conjunctions.";
$array[0]['asw7'] = "Wrong <br>Tom and Mandy went to the store and bought, some chocolate. <br> The comma is missing before the second and. Although only comma, a dramatic pause would work in dialogue and in a childrens book the comma is missplaced otherwise.";
$array[0]['asw8'] = "Wrong <br>Tom and Mandy, went to the store and bought, some chocolate. <br> The first comma is unneccessary as is the second. A comma is used in relation to this text where there are two or more co-ordinating conjunctions.";
$array[0]['correct'] = "a6";
$array[1]['question'] = 'test';
$array[1]['a1'] = 'asfasdffasdfsdaasdfsdfdsa';
$array[1]['a2'] = 'asdfadfasdfsafdasfdasfdsafd';
$array[1]['a3'] = 'asdfasdfasdfafsdasdffsadsdfadfsaafsd';
$array[1]['a4'] = 'afafsddfsafasfdasdfasdfa';
$array[1]['a5'] = 'asdfafsdsdfasfdasfdssfad';
$array[1]['a6'] = 'afsdasfdasdffsdsafdsadffads';
$array[1]['a7'] = 'safafsdfafsddfs';
$array[1]['a8'] = 'afsdafsdasfdfsdaasfdasfsfd';
$array[1]['asw1'] = "Wrong <br>asfdafsdasfdfsadfsdaasfdasfdsfdaasdf";
$array[1]['asw2'] = "Wrong <br>afsdsafdasdfafsdfadsfsd";
$array[1]['asw3'] = "Wrong <br>asfdafsdsfadasfdfsfd";
$array[1]['asw4'] = "Wrong <br>afsdafsdsfdfsdsafdaf";
$array[1]['asw5'] = "Wrong <br>afsdafsdfasdadsffasdasfdafsdasfd";
$array[1]['asw6'] = "Corect <br>safdafsdsafdfsdafsdsafddffsad";
$array[1]['asw7'] = "Wrong <br>asfdfasdfsadafsdfsdafsadfsd";
$array[1]['asw8'] = "Wrong <br>afsdasfdasdsafdfsadsfda";
$array[1]['correct'] = "a6";



$array2[0]['question'] = 'Tom and mandy went to the store and bought some chocolate. <br> The above should be spelt with commas in which of the following ways';
$array2[0]['a1'] = 'Tom, and Mandy went to the store, and bought some chocolate. <br><br> Commas are requried before all co-ordinating conjunctions.';
$array2[0]['a2'] = 'Tom and Mandy went to the store and bought some chocolate. <br><br> No commas are required before any adverbs.';
$array2[0]['a3'] = 'Tom and Mandy, went to the store and bought some chocolate. <br><br> Commas are required as dramatic pauses, but not in regards to less than three co-ordinating conjunctions.';
$array2[0]['a4'] = 'Tom and Mandy went to the store and, bought some chocolate. <br><br> A comma is required after three or more co-ordinating conjunctions.';
$array2[0]['a5'] = 'Tom and Mandy went to, the store and, bought some chocolate. <br><br> A dranatic pause should be used to define meaning and a comma is required after a co-ordinating conjunction.';
$array2[0]['a6'] = 'Tom and Mandy went to the store, and bought some chocolate. <br><br> A comma is required when there are two or more co-ordinating conjunctions, but should not be used to separate essential information.';
$array2[0]['a7'] = 'Tom and Mandy went to the store and bought, some chocolate. <br><br> A dramatic pause enhances the form of a sentence.';
$array2[0]['a8'] = 'Tom and Mandy, went to the store and bought, some chocolate <br><br> Commas should be used to separate clauses, both independent and dependent.';
$array2[0]['asw1'] = "Wrong <br>Tom, and Mandy went to the store, and bought some chocolate. <br> Essential information should never be separated by a comma.";
$array2[0]['asw2'] = "Wrong <br>Tom and Mandy went to the store and bought some chocolate. <br> A comma is required if there are two co-ordinating conjunctions or more but <br> should never be separated by a comma.";
$array2[0]['asw3'] = "Wrong <br>Tom and Mandy, went to the store and bought some chocolate. <br> Although a dramatic pause could be used here it is best not to use too many <br> commas and a comma is required when two or more co-ordinating conjunctions are used.";
$array2[0]['asw4'] = "Wrong <br>Tom and Mandy went to the store and, bought some chocolate. <br> The comma should come before the co-ordination conjunction, not after, and must <br> be used when there are two or more co-ordinating conjunctions.";
$array2[0]['asw5'] = "Wrong <br>Tom and Mandy went to, the store and, bought some chocolate. <br> This is the wrong place to use a co-ordinating conjunction in both cases.";
$array2[0]['asw6'] = "Corect <br>Tom and Mandy went to the store, and bought some chocolate. <br> A comma should never be used to separate essential information and must be used when there are two or more co-ordinating conjunctions.";
$array2[0]['asw7'] = "Wrong <br>Tom and Mandy went to the store and bought, some chocolate. <br> The comma is missing before the second and. Although only comma, a dramatic pause would work in dialogue and in a childrens book the comma is missplaced otherwise.";
$array2[0]['asw8'] = "Wrong <br>Tom and Mandy, went to the store and bought, some chocolate. <br> The first comma is unneccessary as is the second. A comma is used in relation to this text where there are two or more co-ordinating conjunctions.";
$array2[0]['correct'] = "a6";
$array2[1]['question'] = 'test';
$array2[1]['a1'] = 'asfasdffasdfsdaasdfsdfdsa';
$array2[1]['a2'] = 'asdfadfasdfsafdasfdasfdsafd';
$array2[1]['a3'] = 'asdfasdfasdfafsdasdffsadsdfadfsaafsd';
$array2[1]['a4'] = 'afafsddfsafasfdasdfasdfa';
$array2[1]['a5'] = 'asdfafsdsdfasfdasfdssfad';
$array2[1]['a6'] = 'afsdasfdasdffsdsafdsadffads';
$array2[1]['a7'] = 'safafsdfafsddfs';
$array2[1]['a8'] = 'afsdafsdasfdfsdaasfdasfsfd';
$array2[1]['asw1'] = "Wrong <br>asfdafsdasfdfsadfsdaasfdasfdsfdaasdf";
$array2[1]['asw2'] = "Wrong <br>afsdsafdasdfafsdfadsfsd";
$array2[1]['asw3'] = "Wrong <br>asfdafsdsfadasfdfsfd";
$array2[1]['asw4'] = "Wrong <br>afsdafsdsfdfsdsafdaf";
$array2[1]['asw5'] = "Wrong <br>afsdafsdfasdadsffasdasfdafsdasfd";
$array2[1]['asw6'] = "Corect <br>safdafsdsafdfsdafsdsafddffsad";
$array2[1]['asw7'] = "Wrong <br>asfdfasdfsadafsdfsdafsadfsd";
$array2[1]['asw8'] = "Wrong <br>afsdasfdasdsafdfsadsfda";
$array2[1]['correct'] = "a6";

$q1 = 0;
$q2 = 0;








if (isset($_GET['reset'])) {
	if (isset($_SESSION['q1'])) {
	unset($_SESSION['q1']);
	unset($_SESSION['q2']);
	}
	unset($_SESSION['number']);
	unset($_SESSION['number2']);
	
}

if (isset($_GET['unset'])) {
	unset($_SESSION['number']);
	unset($_SESSION['number1']);
}

if (isset($_SESSION['number'])) {
$i = $_SESSION['number'];
$b = $_SESSION['number2'];
if (isset($_SESSION['q1'])) {
$q1 = $_SESSION['q1'];
$q2 = $_SESSION['q2'];
}
}

if (isset($_SESSION['number'])) {




if (isset($_POST['a1'])) {
	echo $array[$i]['asw1'] . "<br>";
if ($array[$i]['correct'] == 'a1')
{
	$q1++;

}
}
if (isset($_POST['a2'])) {
	echo $array[$i]['asw2']. "<br>";
if ($array[$i]['correct'] == 'a2')
{
	$q1++;

}
}
if (isset($_POST['a3'])) {
	echo $array[$i]['asw3']. "<br>";
if ($array[$i]['correct'] == 'a3')
{
	$q1++;

}
}
if (isset($_POST['a4'])) {
	echo $array[$i]['asw4']. "<br>";
if ($array[$i]['correct'] == 'a4')
{
	$q1++;

}
}
if (isset($_POST['a5'])) {
	echo $array[$i]['asw5']. "<br>";
if ($array[$i]['correct'] == 'a5')
{
	$q1++;

}
}
if (isset($_POST['a6'])) {
	echo $array[$i]['asw6']. "<br>";
if ($array[$i]['correct'] == 'a6')
{
	$q1++;

}
}
if (isset($_POST['a7'])) {
	echo $array[$i]['asw7']. "<br>";
if ($array[$i]['correct'] == 'a7')
{
	$q1++;

}
}
if (isset($_POST['a8'])) {
	echo $array[$i]['asw8']. "<br>";
if ($array[$i]['correct'] == 'a8')
{
	$q1++;

}
}
if (isset($_POST['1a1'])) {
	echo $array2[$b]['asw1']. "<br>";
	if ($array2[$b]['correct'] == 'a1')
{
	$q2++;

}
}
if (isset($_POST['1a2'])) {
	echo $array2[$b]['asw2']. "<br>";
if ($array2[$b]['correct'] == 'a2')
{
	$q2++;

}
}
if (isset($_POST['1a3'])) {
	echo $array2[$b]['asw3']. "<br>";
if ($array2[$b]['correct'] == 'a3')
{
	$q2++;

}
}
if (isset($_POST['1a4'])) {
	echo $array2[$b]['asw4']. "<br>";
if ($array2[$b]['correct'] == 'a4')
{
	$q2++;

}
}
if (isset($_POST['1a5'])) {
	echo $array2[$b]['asw5']. "<br>";
if ($array2[$b]['correct'] == 'a5')
{
	$q2++;

}
}
if (isset($_POST['1a6'])) {
	echo $array2[$b]['asw6']. "<br>";
if ($array2[$b]['correct'] == 'a6')
{
	$q2++;

}
}
if (isset($_POST['1a7'])) {
	echo $array2[$b]['asw7']. "<br>";
if ($array2[$b]['correct'] == 'a7')
{
	$q2++;

}
}
if (isset($_POST['1a8'])) {
	echo $array2[$b]['asw8']. "<br>";
if ($array2[$b]['correct'] == 'a8')
{
	$q2++;

}
}

$_SESSION['q1'] = $q1;
$_SESSION['q2'] = $q2;


?>
<form action="question.php?unset=yes" method="POST">
<input type="submit" value="RESET!">
</from>
<?php

} else {
if (isset($_GET['unset']) || isset($_GET['reset'])) {
$_SESSION['number'] = rand(0, 1);
$_SESSION['number2'] = rand(0, 1);
$i = $_SESSION['number'];
$b = $_SESSION['number2'];
if (isset($_SESSION['q1'])){
$q1 = $_SESSION['q1'];
$q2 = $_SESSION['q2'];
}

}
echo "Please select only one entry per question and choose the one with the correct grammar. <br><br>";
echo "<br>";
?>
<form action="question.php" method="POST">
<?php

if ($q1 < 4) {
?>
<?= $array[$i]['question'] ?><br>
<input type="radio" name="a1"> <?= $array[$i]['a1'] ?><br><br>
<input type="radio" name="a2"> <?= $array[$i]['a2'] ?><br><br>
<input type="radio" name="a3"> <?= $array[$i]['a3'] ?><br><br>
<input type="radio" name="a4"> <?= $array[$i]['a4'] ?><br><br>
<input type="radio" name="a5"> <?= $array[$i]['a5'] ?><br><br>
<input type="radio" name="a6"> <?= $array[$i]['a6'] ?><br><br>
<input type="radio" name="a7"> <?= $array[$i]['a7'] ?><br><br>
<input type="radio" name="a8"> <?= $array[$i]['a8'] ?><br><br>
<?php
}

if ($q2 < 4) {
?><br><br><br>
<?= $array2[$b]['question'] ?><br>

<input type="radio" name="1a1"> <?= $array2[$b]['a1'] ?><br><br>
<input type="radio" name="1a2"> <?= $array2[$b]['a2'] ?><br><br>
<input type="radio" name="1a3"> <?= $array2[$b]['a3'] ?><br><br>
<input type="radio" name="1a4"> <?= $array2[$b]['a4'] ?><br><br>
<input type="radio" name="1a5"> <?= $array2[$b]['a5'] ?><br><br>
<input type="radio" name="1a6"> <?= $array2[$b]['a6'] ?><br><br>
<input type="radio" name="1a7"> <?= $array2[$b]['a7'] ?><br><br>
<input type="radio" name="1a8"> <?= $array2[$b]['a8'] ?><br><br>
<?php } 
if ($q1 >= 4 && $q2 >= 4) {
	echo "CONGRATULATIONS! YOU MADE IT THROUGH THE QUESTIONS AND GOT ALL THE ANSWERS RIGHT FOUR TIMES. <br> KEEP UP THE GOOD WORK!";
} else {
?>

<input type="submit" value="submit">

<?php
} ?>
</form>
<?php
if ($q1 >= 4 && $q2 >= 4) {
?>
<form action="question.php?reset=yes" method="POST">
<input type="submit" value="RESET THE TEST!">
</form>

<?php
}
}