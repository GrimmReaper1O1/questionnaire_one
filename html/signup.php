<?php
include 'includes/header2.php';
// session_start();
include '../src/bootstrap.php';
$time = date("Y-m-d H:i:sa");
$id = $_COOKIE['id'] ?? 1;
$error['message'] = '';
if (isset($_COOKIE['id'])) {
  if($id !== 1){
    $id = $_COOKIE['id'];
    header('Location: classes.php?id=' . $id);
    exit;
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user = array();
  $user['pass'] = $_POST['pass'];
  $user['pass2'] = $_POST['pass2'];
  $user['email'] = $_POST['email'];
  $user['phone'] = $_POST['phoneNumber'];
  $user['firstName'] = $_POST['firstName'];
  $user['middleName'] = $_POST['middleName'];
  $user['lastName'] = $_POST['lastName'];
  $user['phoneNumber'] = $_POST['phoneNumber'];
  if (strlen($user['firstName']) > 2 && strlen($user['middleName']) > 2 && strlen($user['lastName']) > 2 && strlen($user['email']) > 2) {
    $error['pass'] = $user['pass'] ? '' : 'Please enter a password';
    if ($user['pass'] == $user['pass2'] && strlen($user['pass']) >= 6) {
      $error['pass'] = 'Your password must be at least six characters long and must be the same when retyped.';
    }


    $username_check_isset = 'FALSE';
    $root = $cms->getMember()->selectViaEmail("administrator@questionnaire.com");
    //try {
    if ($root == false && $_POST['email'] == 'administrator@questionnaire.com') {

      if (strlen($_POST['pass']) >= 6 && $user['pass'] == $user['pass2']) {

        // want to incorporate date check notes later
        $user['passh'] = password_hash(trim($user['pass']), PASSWORD_DEFAULT);
        $row = $cms->getMember()->getRowViaEmail($user['email']);
        print_r($row);
        if ($row != false) {
          $username_check = $row['email'];
          $username_check_isset = 'TRUE';

          if ($user['email'] === $username_check) {
            $error['message'] = "The username you have requested is already taken. <br>";
          }

        } else {

          $terms = "Under the license agreement of utilizing this website you may not install pireted books in the library. ";
          $terms .= "You are intended to create these pdf, doc, or docx files yourself or gain the permission of the author to use them via this means. ";
          $terms .= "However, if you are a school facility or higher education learning facility under Australian copywrite law the fair ";
          $terms .= "use laws state that you may copy parts of text books for the purpose of education. Please research these laws ";
          $terms .= "yourself to ensure legality. You may not copy entire works and place them in the library. The creator of this ";
          $terms .= "website doesn't support piracy. PLEASE SET MAIN SITES TERMS IN THE ADMINISTRATOR FUNCTIONALLITY.";

          $timestamp = strtotime('now');
          $user['ip_address'] = $_SERVER['REMOTE_ADDR'];
          $statement = $cms->getMember()->insertFormAdmin($user['passh'], $user['email'], $timestamp, $_POST['firstName'], $_POST['middleName'], $_POST['lastName'], $_POST['phoneNumber']);
          $row = $cms->getMember()->selectViaEmail($user['email']);
          $result3 = $cms->getMember()->createAdmin($row['user_id'], $row['user_id'], $timestamp, 1, 0);
          $result4 = $cms->getMember()->enterTerms($terms, NULL, 1);
          $cms->getMember()->updateUsers($user['email']);
          $_SESSION['email'] = $user['email'];
          $_SESSION['passh'] = $user['passh'];
          $_SESSION['signed_in'] = true;

          $id = $row['user_id'];

          $user['id'] = $row['user_id'];
          $_SESSION['id'] = $row['user_id'];
          $_SESSION['signed_in'] = TRUE;
          setcookie('id', $id, time() + (60*60*12*28));




          header("Location: Terms.php");
          exit();
        }
      }

    }
    if (strlen($_POST['pass']) >= 6 && $user['pass'] == $user['pass2']) {

      // want to incorporate date check notes later
      $user['passh'] = password_hash($user['pass'], PASSWORD_DEFAULT);
      $row = $cms->getMember()->getRowViaEmail($user['email']);

      if ($row != false) {
        $username_check = $row['email'];
        $username_check_isset = 'TRUE';

        if ($user['email'] === $username_check) {
          $error['message'] = "The username you have requested is already taken.";
        }

      } else {
        $timestamp = strtotime('now');
        $user['ip_address'] = $_SERVER['REMOTE_ADDR'];
        $statement = $cms->getMember()->insertForm($user['passh'], $user['email'], $timestamp, $_POST['firstName'], $_POST['middleName'], $_POST['lastName'], $_POST['phoneNumber']);
        $_SESSION['email'] = $user['email'];
        $_SESSION['passh'] = $user['passh'];
        $_SESSION['signed_in'] = true;
        $ip = $_SERVER['REMOTE_ADDR'];
        $userinfo = $cms->getMember()->selectViaEmail($user['email']) ;
        $id = $userinfo['user_id'];
        $_SESSION['id'] = $id;
        setcookie('id', $id, time() + (60*60*12*28));
        header("Location: Terms.php");
        exit();}
      }
      //}
      // catch(Exception $e) {
      //    $error['message'] = "There was a problem. Please try again later. <br>";
      // }
    } else { $error['message'] .= 'The first name, middle names, email, and last name must be filled. If you choose, you can enter your phone number later.'; }
  }

  ?>

  <?= $time; ?><br>
  <?php echo "<p>" . $error['message'] . "</p>"; ?><?PHP ?>

  <h2>Please sign up</h2>
  <form action="signup.php" method="POST">
    <label for="firstName"><b>First Name:</b></label>
    <input type="text" name="firstName" size="35" value="<?= $user['firstName'] ?? ""; ?>">  <br>
    <label for="middleName"><b>Middle Name:</b></label>
    <input type="text" name="middleName" size="35" value="<?= $user['middleName'] ?? ""; ?>"><br>
    <label for="lastName"><b>Last Name:</b></label>
    <input type="text" name="lastName" size="35" value="<?= $user['lastName'] ?? ""; ?>"><br>
    <label for="email"><b>Username:</b></label>
    <input type="text" name="email" size="35" value="<?= $user['email'] ?? ""; ?>"><br>
    <span type="error"></span><br>
    <label for="pass"><b>Password:</b></label>
    <input type="password" name="pass" size="35" >
    <label for="pass2"><b>Retype Password:</b></label>
    <input type="password" name="pass2" size="35"><br>
    <label style="display: none;" for="phoneNumber"><b>Phone Number:</label>
      <input style="display: none;" type="text" name="phoneNumber" size="35" value="<?= $user['phoneNumber'] ?? ""; ?>"><br>
      <span type="error"><?=  $error['pass'] ?? ""; ?></span><br>
      <input type="submit" value="SUBMIT!">
    </form>
    <?php
    include 'includes/footer.php';
