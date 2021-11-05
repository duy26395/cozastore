<?php
session_start();
require_once '../facebookAPI/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '393371742420715',
    'app_secret' => '58ccde3909169e8f424a441a6ccfd546',
    'default_graph_version' => 'v2.5',
]);

$_SESSION["loggedin"] = false;
unset($_SESSION['fullname']);
unset($_SESSION['fbid']);
unset($_SESSION['Email']);
session_destroy();

header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("location: https://duy263.toidayhoc.com/cozastore/login.php");


?>