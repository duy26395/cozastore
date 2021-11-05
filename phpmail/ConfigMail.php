<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'vendor/PHPMailer/PHPMailer/src/Exception.php';
include 'vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
include 'vendor/PHPMailer/PHPMailer/src/SMTP.php';
include 'vendor/autoload.php';

function sendEmail($link, $email)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->Host = "smtp.gmail.com";
    $mail->Username = "duy.kidd@gmail.com";
    $mail->Password = "lkaytqvjeqjxwlbt";

    $mail->IsHTML(true);
    $mail->AddAddress($email);
    $mail->SetFrom("duy.kidd@gmail.com", "Mail Server Test");
    $mail->Subject = 'Reset Password';
    $mail->Body = 'Click On This Link to Reset Password ' . $link . '';
    $sendMailres = (!$mail->Send()) ? false : true;
    $mail->clearAllRecipients();
    return $sendMailres;
}
