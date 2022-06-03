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
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'localhost';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'orders@highcbdd.com';                     //SMTP username
        $mail->Password   = 'nfqCitHpZLiVri7';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
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