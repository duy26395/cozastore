<?php
require_once( '../facebookAPI/autoload.php' );
const REDIRECT ='https://duy263.toidayhoc.com/cozastore/facebook-Login/Redirect.php';

$fb = new Facebook\Facebook([
    'app_id' => '393371742420715',
    'app_secret' => '58ccde3909169e8f424a441a6ccfd546',
    'default_graph_version' => 'v2.5',
  ]);
 
$helper = $fb->getRedirectLoginHelper();
 
$permissions = ['email']; // Optional permissions for more permission you need to send your application for review
$loginUrl = $helper->getLoginUrl(REDIRECT, $permissions);
header("location: ".$loginUrl);
 