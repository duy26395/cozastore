<?php
//Include Google Configuration File
include('googleConfig.php');
require_once '../ConfigConnect.php';

// if($_SESSION['access_token'] == '') {
//     $urlheader = 
// header("Location: ../index.php");
// } 
//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
//It will Attempt to exchange a code for an valid authentication token.
$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
//This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
if(!isset($token['error']))
{
//Set the access token used for requests
$google_client->setAccessToken($token['access_token']);
//Store "access_token" value in $_SESSION variable for future use.
$_SESSION['access_token'] = $token['access_token'];
//Create Object of Google Service OAuth 2 class
$google_service = new Google_Service_Oauth2($google_client);
//Get user profile data from google
$data = $google_service->userinfo->get();
//Below you can find Get profile data and store into $_SESSION variable
if(!empty($data['given_name']))
{
$firstname = $data['given_name'];
}
if(!empty($data['family_name']))
{
$lastname = $data['family_name'];
}
if(!empty($data['email']))
{
$email = $data['email'];
}
$Islogin = true;

}
}
$sql = "SELECT id,fullname,emailAdress,password FROM members WHERE emailAdress = ?";
if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $email;
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) == 1) {
            $_SESSION["loggedin"] = $Islogin;
            $_SESSION["fullname"] = $firstname .' '. $lastname;
            $_SESSION["Email"] = $email;
            header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header("location: https://duy263.toidayhoc.com/cozastore/index.php");
        } else {
            $fullname = $firstname .' '. $lastname;
            $emailAdress =  $email;
            $password_string = '!@#$%*&abcdefghijklmnpqrstuwxyzABCDEFGHJKLMNPQRSTUWXYZ23456789';
            $password = substr(str_shuffle($password_string), 0, 12);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO `members`(`fullname`, `emailAdress`,`password`) VALUES (?, ?, ?)");
            $stmt->bind_param('sss', $fullname, $emailAdress, $hashed_password);
            mysqli_stmt_execute($stmt);
            $_SESSION["loggedin"] = $Islogin;
            $_SESSION["fullname"] = $fullname;
            $_SESSION["Email"] = $email;

            header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header("location: https://duy263.toidayhoc.com/cozastore/index.php");
        }
    }
}

?>
