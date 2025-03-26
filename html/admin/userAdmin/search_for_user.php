<?php
$currentPath = dirname(__DIR__); 
include "../../includes/header3.php";
if ($_SESSION['administrator']['admin'] = 1) {
  // must be duel functionallity dependent on root or via owned classes.
  $error = '';

  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $row = $cms->getMember()->selectViaEmail($_POST['user']);

    if ($row != false) {

    } else {
      $error .= "The user could not be found. <br>";
    }
  }
  echo $error;
  ?>
  <form action="search_for_user.php" method="POST">
    <label name="user">User:<label>
      <input type="text" name="user"><br>
      <input type="submit" value="SUBMIT!"><br>
    </form>
    <?php
    if (isset($row)) { ?>
      User: <?= $row['email'] ?><br>
      case: <?= $row['case_id'] ?> <br>

      <?php

    }

  } else {
    header("Location: how_dare_you.php");
    exit();
  }
