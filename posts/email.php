<?php

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


    $mail = new PHPMailer(true);

    try {
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'localhost';
        $mail->SMTPAuth = false;
        $mail->SMTPAutoTLS = false; 
        $mail->Port = 25;
        $Mail->Priority = 1;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
        $mail->setFrom('orders@highcbdd.com', 'asdsd');
        $mail->addAddress('pablo.150520@gmail.com', 'Para walross');
        $template = 'adsadasdsadsdjdbdjabdbasbdksdbsak';
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Nueva orden recibida';
        $mail->Body    = $template;
        $mail->CharSet = 'UTF-8';
        print_r($mail->send());
    } catch (Exception $e) {
        print_r($e);
    }
?>