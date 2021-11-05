<?php
include '../ConfigConnect.php';
include '../phpmail/ConfigMail.php';
$username = $password = $emailAdress = $phone = $sql = $fullname = "";
$hashed_password = "";
$login_err = "";
$result = array();
function checkdata($e)
{
    $e = trim($e);
    return $e;
}
// Processing form data when form is submitted
if (isset($_POST['method'])) {
    $method = $_POST['method'];
    switch ($method) {
        case "login":
            $username = checkdata($_POST["user"]);
            $password = checkdata($_POST["pass"]);

            // Validate credentials
            // Prepare a select statement
            $sql = "SELECT id,fullname,emailAdress,password FROM members WHERE emailAdress = ?";

            if ($stmt = mysqli_prepare($conn, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                // Set parameters
                $param_username = $username;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Store result
                    mysqli_stmt_store_result($stmt);

                    // Check if username exists, if yes then verify password
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $id,$fullname, $username, $hashed_password);
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                        if (mysqli_stmt_fetch($stmt)) {
                            if (password_verify($password, $hashed_password)) {
                                // Password is correct, so start a new session
                                session_start();

                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;
                                $_SESSION["fullname"] = $fullname;

                                $result['Islogin'] = true;

                            } else {
                                // Password is not valid, display a generic error message
                                $login_err = "Invalid password.";
                                $result['Islogin'] = false;
                                $result['Mess'] = $login_err;
                            }
                        }
                    } else {
                        // Username doesn't exist, display a generic error message
                        $login_err = "Invalid username.";
                        $result['Islogin'] = false;
                        $result['Mess'] = $login_err;
                    }
                } else {
                    $login_err = "Oops! Something went wrong. Please try again later.";
                    $result['Islogin'] = false;
                    $result['Mess'] = $login_err;
                }
                // Close statement
                mysqli_stmt_close($stmt);
            }
            echo json_encode($result);

            // Close connection
            mysqli_close($conn);
            break;
        case "register":
            $username = checkdata($_POST["username"]);
            $emailAdress = checkdata($_POST["emailAdress"]);
            $phone = checkdata($_POST["phone"]);
            $password = checkdata($_POST["password"]);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO `members`(`fullname`, `emailAdress`, `phonenumber`, `password`) VALUES (?, ?, ?, ?)");
            $stmt->bind_param('ssss', $username, $emailAdress, $phone, $hashed_password);
            //check usser in db
            $sqlcheck = "SELECT emailAdress FROM members WHERE emailAdress = ? Limit 1";
            $stmtcheck = mysqli_prepare($conn, $sqlcheck);
            mysqli_stmt_bind_param($stmtcheck, "s", $emailAdress);
            if (mysqli_stmt_execute($stmtcheck)) {
                mysqli_stmt_store_result($stmtcheck);
                if (mysqli_stmt_num_rows($stmtcheck) == 1) {
                    $result['Isregister'] = false;
                    $result['Mess'] = "User exists";
                } else{
                    if($stmt->execute()){
                        $result['Isregister'] = true;
                    } else {
                        $result['Isregister'] = false;
                        $result['Mess'] = $stmt->error;
                    }
                }
            }

            echo json_encode($result);
            break;
            case "mail-forget":
            $emailId = isset($_POST['email']) ? $_POST['email'] : "";

            $sql = mysqli_query($conn, "SELECT * FROM members WHERE emailAdress='" . $emailId . "' Limit 1");
            
            if (!empty($sql) && $sql->num_rows > 0) {
                while ($row = $sql->fetch_assoc()) {
                    $token = md5($emailId) . rand(10, 9999);
                    $curDate = date("Y-m-d H:i:s");
                    $string = 'abcdefghijklmnpqrstuwxyzABCDEFGHJKLMNPQRSTUWXYZ23456789';
                    $key = substr(str_shuffle($string), 0, 12);
                    $expFormat = mktime(
                        date("H"), date("i") + 10, date("s"), date("m"), date("d"), date("Y")
                    );

                    $expDate = date("Y-m-d H:i:s", $expFormat);

                    $insertPWTemp = mysqli_query($conn, "INSERT INTO `password_reset_temp` (`email`, `expDate`, `key`)
                        VALUES ('" . $emailId . "', '" . $expDate . "','" . $key . "');");

                    $link = '<p><a href="https://duy263.toidayhoc.com/cozastore/resetpass.php?key=' . $key . '&email=' . $emailId . '&action=reset" target="_blank">Click To Reset password</a></p>';
                    $sendMailres = sendEmail($link, $emailId);
                }
            } else {
                $sendMailres = false;
                $result['IssendMail'] = false;
                $result['Mess'] = "The mail does not exist in the database";
            }
            if ($sendMailres) {
                $result['IssendMail'] = true;
            } else {
                $result['IssendMail'] = false;
            }
            echo json_encode($result);
            break;
            case "reset-pass":
            $key = $_POST['key'] ? $_POST['key'] : "";
            $password = $_POST['pass'] ? $_POST['pass'] : "";
            $curDate = date("Y-m-d H:i:s");
            $sql = "SELECT expDate,email FROM password_reset_temp WHERE `key` ='" . $key . "' Limit 1";
            $resultsql = $conn->query($sql);
            if (!empty($resultsql) && $resultsql->num_rows > 0) {
                while ($row = $resultsql->fetch_assoc()) {
                    $curDateEmail = $row['expDate'];
                    $email = $row['email'];
                }
            } else {
                $result['IsUpdatepass'] = false;
                $result['Mess'] = $conn->error;
            }
            $curDateEmail = isset($curDateEmail) ? $curDateEmail :"";
            if ($curDate <= $curDateEmail) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "UPDATE `members` SET `password` = '" . $hashed_password . "' where emailAdress = '" . $email . "'";
                $resultsql = $conn->query($sql);
                if ($resultsql) {
                    $result['IsUpdatepass'] = true;
                } else {
                    $result['IsUpdatepass'] = false;
                    $result['Mess'] = $conn->error;
                }
            } else {
                $result['IsUpdatepass'] = false;
                $result['Mess'] = "Link has die, pls request again !!";
            }
            echo json_encode($result);
            break;
    }
}
