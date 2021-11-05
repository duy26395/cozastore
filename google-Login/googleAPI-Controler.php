<?php
 
//Include Google Client Library for PHP autoload file
require_once 'googleConfig.php';
 
//Make object of Google API Client for call Google API
$google_client = new Google_Client();
 
//Set the OAuth 2.0 Client ID
$google_client->setClientId('596825688161-80rt9vkgqjcfn4pveukl4uc07varqdbr.apps.googleusercontent.com');
 
//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');
 
//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://duy263.toidayhoc.com/cozastore/google-Login/Redirect.php');
 
//
$google_client->addScope('email');
 
$google_client->addScope('profile');
session_start();
  header("location: ".$authUrl); 
$loginUrl = 'https://duy263.toidayhoc.com/cozastore/google-Login/Redirect.php';
$authUrl = $google_client->createAuthUrl();
$session = isset($_SESSION["loggedin"]) ? $loginUrl : $authUrl;
header("location: ".$session); 
// if ($session == true) {
//     var_dump('true');
// //     $loginUrl = 'https://duy263.toidayhoc.com/cozastore/google-Login/Redirect.php'; 
// // header("location: ".$loginUrl); 

// }
//   } else {
//   //Create a URL to obtain user authorization
//       var_dump('false');

// //   header("location: ".$authUrl); 
// }


 
?>