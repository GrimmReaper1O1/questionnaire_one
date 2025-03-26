<?php
$currentPath = dirname(__DIR__); 
include "includes/header3.php";

$error = false;                                                 // Error message
$sent  = false;                                                 // Has email been sent

if ($_SERVER['REQUEST_METHOD'] == 'POST') {                     // If form submitted
  $email = $_POST['email'];                                            // Get email
  $error = \MySite\Validate\Validate::isEmail($email) ? '' : 'Please enter your email'; // Validate
  if ($error === '') {                                                 // If valid
    $row = $cms->getMember()->selectViaEmail($email);
    $id = $row['user_id'];            // Get member id
    if ($row != false) {                                                       // If id found
      $token = $cms->getToken()->create($email, 'password_reset');    // Token
      $link  = "localhost/"  . 'password-reset.php?token=' . $token;
      //. DOC_ROOT
      // Link
      $subject = 'Reset Password Link';                            // Subject + body
      $body  = 'To reset password click: <a href="' . $link . '">' . $link . '</a>';
      $mail  = new \MySite\Email\Email($email_config);            // Email object
      $sent  = $mail->sendEmail($email_config['admin_email'], $email,
      $subject, $body); 			   // Send mail=
      print_r($sent);
    }
  }
}

?>
<h1>FORGOT PASSWORD?</h1><br>
<h4>Fill in email and click the button below</h4>
<form action="password-lost.php" method="post">
  <label for="email">Email:</label>
  <input type="email" name="email" size="50">
  <input type="submit" value="FORGOT PASSWORD!">
</from>
<?php include 'includes/footer.php'; ?>


<?php

// $data['navigation'] = $cms->getCategory()->getAll();         // Categories for navigation
// $data['error']      = $error;                                // Validation errors
// $data['sent']       = $sent;                                 // Did it send

// echo $twig->render('password-lost.html', $data);            // Render template
