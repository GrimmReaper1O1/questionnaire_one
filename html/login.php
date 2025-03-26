<?php
include "includes/header1.php";
include '../src/bootstrap.php';

$id = $_SESSION['id'] ?? 0;
$error = "";
echo time();
if (isset($_SESSION['id']) || isset($_COOKIE['id'])){
  if ($id  !== 0) {
    $row = $cms->getMember()->getViaId($id);

    if ($row['user_id'] == $id) {

      $_SESSION['id'] = $id;

      header('Location: Terms.php');
      exit();
    }
  }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $user['email'] = $_POST['email'] ?? '';
  $user['pass'] = $_POST['pass'] ?? '';
  $row = $cms->getMember()->getRowViaEmail($user['email']);


  $bad_login_limit = 3;
  $lockout_time = 1800;

  if ($row != false) {
    $first_failed_login = $row['time_stamp'];
    $failed_login_count = $row['failed_attempts'];
    $pw = $row['pass'];
    if(
      ($failed_login_count >= $bad_login_limit)
      &&
      ((time() - $first_failed_login) < $lockout_time)
    ) {
      $error .= "You are currently locked out.";

      // or return, or whatever.
    } elseif (password_verify($user['pass'], $pw) == false) {
      if( time() - $first_failed_login > $lockout_time ) {
        echo 'here 1';
        // first unsuccessful login since $lockout_time on the last one expired
        $first_failed_login = time(); // commit to DB
        $failed_login_count = 1; // commit to db
        $cms->getMember()->updateUsers($row['email']);
        $cms->getMember()->updateLogin($failed_login_count, $row['email']);
      } else {
        $error = "Your password or username is incorrect.";
        $failed_login_count++; // commit to db.
        $cms->getMember()->updateLogin($failed_login_count, $row['email']);
      }

    } else {
      // user is not currently locked out, and the login is valid.
      // do stuff
      echo 'here 3';
      $siteSettings = $cms->getMember()->selectSiteDefaultSettings();

      if (password_verify($user['pass'], $pw)) {
        $_SESSION['id'] = $row['user_id'];

        if (isset($row['style'])) {
          $_SESSION['site']['style'] = $row['style'];
          $_SESSION['layoutOfSite'] = $cms->getMember()->selectStyle($row['style']);


        } elseif ($siteSettings != false) {

          $_session['site']['style'];
          $_SESSION['layoutOfSite'] = $cms->getMember()->selectStyle($siteSettings['style']);

        
        }

        $ip = $_SERVER['REMOTE_ADDR'];

        $timestamp = date('now');
        $id = $row['user_id'];
        $cms->getMember()->updateUsers($timestamp);
        $cms->getMember()->updateLogin(0, $user['email']);

        if ($row['user_id'] == $id) {

          $_SESSION['id'] = $id;


          $row = $cms->getMember()->getViaId($id);
          if (isset($row['style'])) {

            $_SESSION['layoutOfSite'] = $cms->getMember()->selectStyle($row['style']);

          }

          header('Location: Terms.php');
          exit();
        }

        $_SESSION['id'] = $id;
        setcookie('id', $id, time() + (60*60*12*28));
        header('Location: Terms.php');
        exit();
      } 
    }
  } else { $error = "Your password or username is incorrect."; }
}



echo "<p>" . $error . "<br></p>";
?>
<form action="login.php" method="POST">
  <label for="email"><b>Username:</b></label>
  <input type="text" name="email" value="<?= $user['email'] ?? '' ?>"><br>
  <label for="pass"><b>Password:</b></label>
  <input type="password" name="pass">
  <input type="submit" value="Log In"><br>
  <a style="display: none;" href="password-lost.php">Forgot Password?</a>

  <?php
  include 'includes/footer.php';
  ?>
