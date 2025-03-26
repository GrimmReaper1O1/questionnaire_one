<?php
$currentPath = dirname(__DIR__); 
include "../../includes/header3.php";
if ($_SESSION['administrator']['admin'] == 1) {
  $error = '';
  $timestamp = date("Y/m/d h:i:sa");
  $result2 = false;
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['yN'] === 'yes' || $_POST['yN'] === 'YES') {
      $result = $cms->getMember()->getMemberViaId($_SESSION['alterAccount']);
      if ($result == false) { $error .= "The user no longer exists. ";}
      if ($result != false) {


        $result2 = $cms->getEvidence()->deleteAllEvidenceViaUserId($result['user_id']);


        if ($result2 > 0) {
          $error .= 'The statments were successfully deleted! <br>'; }


        }



        $result4 = $cms->getMember()->deleteUserFromCaseAndDeleteUserViaUserId($result['user_id']);

        if ($result4 > 0) {
          $error .= "The user has been deleted. <br>";
        }





      }
    }

    echo $error;

    if ($error == '') {
      ?>


      <h1>Are you sure you would like to delete the account <?= $result['email'] ?? '' ?>?
        <br></h1>
        <form action="delete_account.php" method="post">
          <label for='yN'>Please type yes or no:</label><input type="text" name="yN"><br>

          <label for='reason'>Reason for deleting the account:</label><input type="text" name="reason"><br>
          <input type="submit" value="submit">
        </form>
        <?php
      }
      include "includes/footer.php";
    } else {
      header("Location: ../../classes.php");
      exit();
    }
