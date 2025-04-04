<?php
use MySite\CMS\CMS;
session_start(); 
define('APP_ROOT', dirname(__FILE__, 2));                // Application root

                 // Functions
require APP_ROOT . '/config/config.php';                 // Configuration data
require APP_ROOT . '/vendor/autoload.php';               // Autoload libraries


if (DEV === false) {                                     // If not in development
    set_exception_handler('handle_exception');           // Set exception handler
    set_error_handler('handle_error');                   // Set error handler
    register_shutdown_function('handle_shutdown');       // Set shutdown handler
}
// $conn = sqlsrv_connect($serverName, $connection);

$cms = new \MySite\CMS\CMS($dsn, $uid, $pass); // Create CMS object
 
unset($dsn);
unset($user);
unset($pass);
require APP_ROOT . '/src/functions.php';

// unset($connection);                       // Remove database config data

// $twig_options['cache'] = APP_ROOT . '/var/cache';        // Path to Twig cache folder
// $twig_options['debug'] = DEV;                            // If dev mode, turn debug on

// $session2 = $cms->getSession();                           // Create session
// $twig->addGlobal('session', $session);                   // Add session to Twig global

// if (DEV === true) {                                      // If in development
//     $twig->addExtension(new \Twig\Extension\DebugExtension()); // Add Twig debug extension
// }