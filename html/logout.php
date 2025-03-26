<?php
require "../src/bootstrap.php";
$_SESSION = [];
// Empty $_SESSION superglobal
$param    = session_get_cookie_params();         // Get session cookie parameters
unset($_SESSION);
setcookie(session_name(), '', time() - 2400, $param['path'], $param['domain'],
$param['secure'], $param['httponly']);  // Clear session cookie
setcookie('id', '', time() - 2400);

session_destroy();
header('Location: login.php');
