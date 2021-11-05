<?php

session_start();
require_once '../facebookAPI/autoload.php';
require_once '../ConfigConnect.php';

$fb = new Facebook\Facebook([
    'app_id' => '393371742420715',
    'app_secret' => '58ccde3909169e8f424a441a6ccfd546',
    'default_graph_version' => 'v2.5',
]);

$helper = $fb->getRedirectLoginHelper();
if (isset($_GET['state'])) {
    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
}

try
{
    $accessToken = $helper->getAccessToken();
} catch (Facebook\Exceptions\FacebookResponseException$e) {
    // When Graph returns an error

    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException$e) {
    // When validation fails or other local issues

    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

try
{
    // Get the Facebook\GraphNodes\GraphUser object for the current user.
    $response = $fb->get('/me?fields=id,name,email,first_name,last_name', $accessToken->getValue());

} catch (Facebook\Exceptions\FacebookResponseException$e) {
    // When Graph returns an error
    echo 'ERROR: Graph ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException$e) {
    // When validation fails or other local issues
    echo 'ERROR: validation fails ' . $e->getMessage();
    exit;
}

$me = $response->getGraphUser();

$sql = "SELECT id,fullname,emailAdress,password FROM members WHERE fbid = ?";

if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $me->getProperty('id');
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) == 1) {
            $_SESSION["loggedin"] = true;
            $_SESSION["fullname"] = $me->getProperty('name');
            $_SESSION["Email"] = $me->getProperty('email');

            header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header("location: https://duy263.toidayhoc.com/cozastore/index.php");
        } else {
            $username = $me->getProperty('name');
            $emailAdress =  $me->getProperty('email');
            $password_string = '!@#$%*&abcdefghijklmnpqrstuwxyzABCDEFGHJKLMNPQRSTUWXYZ23456789';
$password = substr(str_shuffle($password_string), 0, 12);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $fbid = $me->getProperty('id');
            $stmt = $conn->prepare("INSERT INTO `members`(`fullname`, `emailAdress`,`password`,`fbid`) VALUES (?, ?, ?, ?)");
            $stmt->bind_param('ssss', $username, $emailAdress, $hashed_password, $fbid);
            mysqli_stmt_execute($stmt);
            $_SESSION["loggedin"] = true;
            $_SESSION["fullname"] = $me->getProperty('name');
            $_SESSION["Email"] = $me->getProperty('email');

            header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header("location: https://duy263.toidayhoc.com/cozastore/index.php");
        }
    }
}

