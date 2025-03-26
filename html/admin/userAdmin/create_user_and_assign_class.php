<?php

include "../includes/header_others.php";
if ($_SESSION['administrator']['admin'] == 1) {
  $user = $_POST['email'] ?? '';
  $pass = $_POST['password'] ?? '';
  $caseId = $_POST['number'] ?? '';
  $user2 = $_POST['email2'] ?? '';
  $pass2 = $_POST['password2'] ?? '';
  $caseId2 = $_POST['number2'] ?? '';
  $error = "";


  if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if ($user !== $user2 || ($user == '' || $user2 == '')) {
      $error .= "The user fields don't match. <br>";

    }
    if ($caseId !== $caseId2 || ($caseId == '' || $caseId2 == '')) {
      $error .= "The case number fields don't match. <br>";

    }
    if ($pass !== $pass2 || ($pass == '' || $pass2 == '')) {
      $error .= "The password fields don't match. <br>";

    }


    if ($user === $user2 && $pass === $pass2 && $caseId2 === $caseId) {
      if ($user !== '' && $pass !== '' && $caseId !== '') {
        $row = $cms->getMember()->selectViaEmail($user);
        // possible join tables in this one
        // update for unique columns
        if ($row == false) {
          $timestamp = date("Y/m/d h:i:sa");
          $pass2 = password_hash($pass2, PASSWORD_DEFAULT);
          $result = $cms->getMember()->selectCaseFromCaseDescriptionViaCaseId($caseId);
          if ($result == false) {
            try {

              $result = $cms->getMember()->insertForm($pass2, $user2, $timestamp, $timestamp, 1, "User created by administrative personnel.", $caseId, $_POST['firstName'], $_POST['middleName'], $_POST['lastName'], $_POST['phoneNumber']);
              $error .= "The account was created successfully! <br>";
            }
            catch(Exception $e) {

              $error .= "The account was not created successfully. <br>";
            }
            $row = $cms->getMember()->getCaseRow($caseId2);
            if ($row != false) {
              try {
                $row = $cms->getMember()->selectViaEmail($user2);
                $result2 = $cms->getMember()->insertUserIntoCase($caseId, $row['user_id'], $_SESSION['id']);
                $error .= "The account was entered into the case list. <br>";

              }
              catch(Exception $e) {


                $error .= "The account was not inserted into the case list. <br>";
              }

            } else {
              $error .= "The case description ID doesn't exist. <br>";
            }


          } else {$error .= "There is no case under that identifier. <br>";}
        } else { $error .= "There is already a user with that name. <br>";}
      }

    }
  }


  echo "<p>" . $error . "</p><br>";
  ?>
  <div id="main" class="main">
    <?php
    if (isset($_SESSION['site']['dmb'])) {
      if ($_SESSION['site']['dmb'] == 0) {
        ?>
        <div class="heightHeader">
        </div>
        <?php
      }

    }

    ?>
    Please place any administrative users under case number 404.<br>
    <form action="create_user_and_assign_case.php" method="POST">
      <label for="email">Email:</label><input type="text" name="email"><br>
      <label for="email2">Retype Email:</label><input type="text" name="email2"><br>
      <label for="password">Password:</label><input type="text" name="password"><br>
      <label for="password2">Retype Password:</label><input type="text" name="password2"><br>
      <label for="number">Case Number:</label><input type="text" name="number"><br>
      <label for="number2">Retype Case Number:</label><input type="text" name="number2"><br>
      <label for="phoneNumber">Phone Number:</label>
      <input type="text" name="phoneNumber" size="35" value="<?= $user['phoneNumber'] ?? ""; ?>"><br>
      <label for="firstName">First Name:</label>
      <input type="text" name="firstName" size="35" value="<?= $user['firstName'] ?? ""; ?>">  <br>
      <label for="middleName">Middle Name:</label>
      <input type="text" name="middleName" size="35" value="<?= $user['middleName'] ?? ""; ?>"><br>
      <label for="lastName">Last Name:</label>
      <input type="text" name="lastName" size="35" value="<?= $user['lastName'] ?? ""; ?>"><br>
      <input type="submit" name="submit" value="SUBMIT!">

    </div>
    <?php
    if (isset($_SESSION['site']['dmb'])) {
      if ($_SESSION['site']['dmb'] == 1) {

        ?>
        <div id="rightLowerSidebar" class="rightLowerSidebar">

        </div>

        <?php

      }
    }

    ?>
  </div>
</div>
<?php
include "../includes/footer.php";

} else {
  header("Location: ../../classes.php");
  exit();
}
