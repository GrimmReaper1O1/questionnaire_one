<?php
declare(strict_types = 1);                                          // Use strict types
use MySite\Validate\Validate;                                      // Import class
include '../src/bootstrap.php';                                     // Setup file

$errors = [];                                                       // Initialize array

$token = $_GET['token'] ?? '';                                      // Get token
if (!$token) {                                                      // If id not returned
  redirect('login.php');                                          // Redirect
}

$id = $cms->getToken()->getMemberId($token, 'password_reset');      // Get member id
if (!$id) {                                                         // If no id
  redirect('login.php', ['warning' => 'Link expired, try again.',]); // Redirect
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {                     // If form submitted
  $password = $_POST['password'];                             // Get new password
  $confirm  = $_POST['confirm'];                              // Get password confirm

  // Validate passwords and check they match
  $errors['password'] = Validate::isPassword($password)
  ? '' : 'Passwords must be at least 8 characters and have:<br>
  A lowercase letter<br>An uppercase letter<br>A number
  <br>And a special character';                   // Invalid password
  $errors['confirm']  = ($password === $confirm)
  ? '' : 'Passwords do not match';                        // Password does not match
  $invalid = implode($errors);                                // Join error messages

  if ($invalid) {                                             // If password not valid
    $errors['message'] = 'Please enter a valid password.';  // Store error message
  } else {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);                                                    // Otherwise
    $cms->getMember()->passwordUpdate($id, $passwordHash);      // Update password
    $member  = $cms->getMember()->getMemberViaId($id);                 // Get member details
    $subject = 'Password Updated';                          // Create subject and body
    $body    = 'Your password was updated on ' . date('Y-m-d H:i:s') .
    ' - if you did not reset the password, email ' . $email_config['admin_email'];
    $email   = new \PhpBook\Email\Email($email_config);     // Create email object
    // Send email
    $email->sendEmail($email_config['admin_email'], $member['email'], $subject, $body);
    redirect('login.php', ['success' => 'Password updated']); // Redirect to login
  }
}
?>
<html>
<body>
  <form action="password-reset.php" method="POST">
    <label for="password">Password:</label>
    <input type="text" size="50" name="password">
    <label for="confirm">Confirm:</label>
    <input type="text" size="50" name="confirm">
    <input type="submit" value="Submit!">
  </body>
  </html>
