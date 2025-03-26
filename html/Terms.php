<?php
include "../src/bootstrap.php" ;
echo $_SESSION['id'];
$row = $cms->getMember()->getViaId($_SESSION['id']);
//    print_r($accept);
if ($row != false) {
  if ($row['accepted_terms'] == 1)
  {
    header("Location: classes.php?reset=yes");
    exit;
  }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $accept = $_POST['accept'] ?? 0;
  print_r($accept);
  if (isset($accept)){
    if($accept == 'on') {
      $cms->getMember()->updateAcceptTerms($_SESSION['id']);
      // setcookie('id', $_SESSION['id'], time() + (60*60*1));


      header("Location: classes.php?reset=yes");
      exit;
    } else {
      unset($_SESSION);
      header("Location: logout.php");
      exit;
    }
  }
}
$terms = $cms->getMember()->getTermsMain();



?>
<div>
  <a href='print_terms.php'>Printer friendly version of terms</a>
  <h1>Welcome<br>Please read the conditons carefully!</h1>
  <p> <?= $terms['terms'] ?? "" ;?> </p>

  <form action="Terms.php" method="POST">
    <lable name="accept">I agree to the end user license agreement and the terms!</lable>
    <input type='checkbox' id='checkbox' name='accept'>
    <input type="submit" name="submit" value="SUBMIT!">
  </div>
  <?php
  include "includes/footer.php";
