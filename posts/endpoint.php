<?php
require '../vendor/autoload.php';
include '../config/config.php';
MercadoPago\SDK::setAccessToken('TEST-6490919314959474-050219-be40aa3585e520a52bd7c0fc1812b532-260364979');
  $merchant_order = null;
  switch($_GET["topic"]) {
      case "payment":
          $payment = MercadoPago\Payment::find_by_id($_GET["id"]);
          // Get the payment and the corresponding merchant_order reported by the IPN.
            $merchant_order = MercadoPago\MerchantOrder::find_by_id($payment->order->id);
          break;
          case "merchant_order":
            $merchant_order = MercadoPago\MerchantOrder::find_by_id($_GET["id"]);
          break;
  }
  $paid_amount = 0;
  foreach ($merchant_order->payments as $payment) {  
      if ($payment['status'] == 'approved'){
          $paid_amount += $payment['transaction_amount'];
      }
  }
  // If the payment's transaction amount is equal (or bigger) than the merchant_order's amount you can release your items
  $id = $merchant_order->preference_id;
  $get = $conn->query("SELECT * FROM orders WHERE id = '$id'");
  $data = $get->fetch_assoc();
  $name = $data['name'];
  $conn->query("INSERT INTO content (content, data) VALUES ('$name', 'name')");



  /* if($paid_amount >= $merchant_order->total_amount){
      if (count($merchant_order->shipments)>0) { // The merchant_order has shipments
          if($merchant_order->shipments[0]->status == "ready_to_ship") {
              print_r("Totally paid. Print the label and release your item.");
          }
      } else { // The merchant_order don't has any shipments
          print_r("Totally paid. Release your item.");
      }
  } else {
      print_r("Not paid yet. Do not release your item.");
  } */
/* 
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
        
        $mail->setFrom('orders@highcbdd.com', $nombres);
        $mail->addAddress('pablo.150520@gmail.com', 'Para walross');
        $template = '
        <html>
            <head>
                <meta charset="UTF-8">
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue:wght@300;400;500;600;700&display=swap" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;500;600;700&display=swap" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;500;600;700&display=swap" rel="stylesheet">
            </head>
                <body style="background: url(https://www.walross.mx/dev/images/wallpaperbetter.png); background-size: cover; background-repeat: no-repeat; background-position: center; width:100%; height:100%;">
                    <div style=\'width: 100%; height: 100%;\'>
                        <div style="width: 100%; height: 100%;">
                            <div style="text-align: center; padding-top: 80px; padding-bottom: 50px;">
                                <img src="https://www.walross.mx/dev/images/logos/blanco.png" alt="" style="width:200px;">
                            </div>
                            <div style="text-align: center;">
                                <div style="border-radius: 20px; width:300px; padding: 10px 10px; background-color:#31F900; text-align: center; font-weight: 700; font-size: 22px; margin-top: 20px; margin-left: auto; margin-right: auto; color: #FFF; ">Nueva cotización recibida</div>
                            </div>
                        </div>
                        <div style="height: 100%; border-radius: 10px; margin: auto; padding: 20px;">
                            <div style="font-size: 14px !important; margin-top: 30px; color: #fff; text-align:center; width: 100%;">
                                <div style="padding-top: 45px; padding-bottom: 30px; font-size: 20px !important; color: #fff !important;"><b>NOMBRE(S) Y APELLIDOS:</b></div>
                                <div style="padding: 10px 0; color: #fff !important;">' . $nombres . '</div>
                                <div style="padding-top: 45px; padding-bottom: 30px; font-size: 20px !important; color: #fff !important;"><b>CORREO ELECTRÓNICO:</b></div>
                                <div style="padding: 10px 0;"><a href="mailto:' . $email . '" style="text-decoration: none; color: #fff;">' . $email . '</a></div>
                                <div style="padding-top: 45px; padding-bottom: 30px; font-size: 20px !important; color: #fff !important;"><b>SELECCIÓN INDUSTRIA:</b></div>
                                <div style="padding: 10px 0;">' . $o . '</div>
                                <div style="padding-top: 45px; padding-bottom: 30px; font-size: 20px !important;color: #fff !important;"><b>SELECCIÓN ESPECIFICACIONES:</b></div>
                                <div style="padding: 10px 0;">' . $o_2 . '</div>
                                <div style="padding-top: 45px; padding-bottom: 30px; font-size: 20px !important; color: #fff !important;"><b>DATO ADICIONAL:</b></div>
                                <div style="padding: 10px 0; color: #fff !important;">' . $mensaje . '</div>
                            </div>
                            <div style="font-size:15px; text-align: center; margin-top: 80px; padding-bottom: 20px; color: #fff !important;">Esta cotización fue generada el '. date('d-m-Y') .' a las '. date('h:i A') .'</div><br>
                        </div>
                    </div>
                </body>
            </html>';
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Nueva cotización recibida';
        $mail->Body    = $template;
        $mail->CharSet = 'UTF-8';
        $mail->send();
    } catch (Exception $e) {
        error_log("Error al enviar el mensaje: {$mail->ErrorInfo}");
    } */
?>