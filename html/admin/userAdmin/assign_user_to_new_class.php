<?php
include "../includes/header5.php";


if ($_SESSION['administrator']['admin'] == 1) {
  $error = '';




  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $row = $cms->getMember()->selectViaEmail($_POST['user']);
    if (isset($row['email'])) {

      $result = $cms->getMember()->updateMemberToNewCase($row['user_id'], $_POST['caseNum']);

      // here would be a good spot to join tables
      if ($result > 0) {

        $error .= "The change in case number for this user was successfull! <br>";
      } else {
        $error .= "The change was not successfull. Either the case number or user doesn't exist, or there was a problem. Please try again. <br>";
      }
    } else {
      $error .= "The user could not be found.";
    }


  }






  echo "<p>" . $error . "<p>";
  ?>
  <form action="assign_user_to_new_case.php" method="POST">
    <label for="user">User:</label><input type="text" name="user"><br>
    <label for="caseNum">Case number:</label><input type="text" name="caseNum"><br>
    <input type="submit" value="SUBMIT!">
    <?PHP
    include "../includes/footer.php";
  } else {
    header("Location: ../../classes.php");
    exit();
  }
