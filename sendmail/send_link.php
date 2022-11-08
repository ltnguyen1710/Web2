<?php
require('../process/login.php');
require('PHPMailer.php');
require('SMTP.php');
require('Exception.php');

function createSMTPconnection($mail_receiver,$name_receiver,$message){
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;
    //$mail->SMTPAutoTLS = false; 
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    // GMAIL username
    $mail->Username = "checkerVNnamm@gmail.com";
    // GMAIL password
    $mail->Password = "wgrvqfohbfyllxeh";
    $mail->SMTPSecure = "ssl";
    $mail->From = 'checkerVNnamm@gmail.com';
    $mail->FromName = 'checkerVN';
    $mail->AddAddress($mail_receiver, $name_receiver);
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = $message;
    if ($mail->Send()) {
        echo "Check Your Email and Click on the link sent to your email";
    } else {
        echo "Mail Error - >" . $mail->ErrorInfo;
    }
}


