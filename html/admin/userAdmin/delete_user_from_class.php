<?php
include "../includes/header_others.php";
if ($_SESSION['administrator']['root'] == 1) {
  $error = '';
  $timestamp = date("Y/m/d h:i:sa");


  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $row = $cms->getMember()->getViaEmail($_POST['user']);
    if ($row['case_id'] == $_POST['case_number']) {
      if ($row != false) {
        $result2 = $cms->getMember()->deleteUserFromCaseAndDeleteUserViaUserId($row['user_id']);
        if ($result2 > 0) {
          $error .= 'The users were backed up and deleted. <br>';
        } else {
          $error .= "There was a problem. <br>";
        }
      } else {$error .= "The user was not found. <br>";}


      if ($row != false) { $id = intval($row['user_id']);
        $result5 = $cms->getEvidence()->deleteEvidenceViaId($id);
        if ($result5 > 0) {
          $error .= 'The statements were successfully deleted. <br>';
        } else {
          $error .= "There were no statements to be deleted. <br>";
        }

        //         $error .= 'The statements were successfully backed up. <br>';

        // $result5 = $cms->getEvidence()->deleteUsersFromCaseViaCase($id);

        // if ($result5 > 0) {
        //     $error .= 'The statements were successfully deleted. <br>';
        // } else {
        //     $error .= "There were no statements to be deleted. <br>";
        // }
      }



    }
  }
  ?>

  <h1>Delete user from case and remove user as well as delete all evidence.</h1>
  <?php
  echo $error;
  ?>

  <form action="delete_user_from_case.php" method="POST">
    <label for="user">email:</label>
    <input type="text" name="user" size="50" ><br>
    <label for="case_number">Case number:</label>
    <input type="text" name="case_number" size="50"><br>

    <input type="submit" value="Search!">
  </form>


  <?php

  include "../includes/footer.php";
} else {
  header("Location: ../../classes.php");
  exit();
}
