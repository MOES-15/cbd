<?php
date_default_timezone_set("America/Mexico_City");
require '../vendor/autoload.php';
include '../config/config.php';
MercadoPago\SDK::setAccessToken('TEST-6490919314959474-050219-be40aa3585e520a52bd7c0fc1812b532-260364979');
$merchant_order = null;
$get = $_GET["topic"];
$conn->query("INSERT INTO content (content) VALUES ('$get')");
if($_GET["topic"] == 'payment'){
        $payment = MercadoPago\Payment::find_by_id($_GET["id"]);
        $merchant_order = MercadoPago\MerchantOrder::find_by_id($payment->order->id);
}else if($_GET["topic"] == 'merchant_order'){
      $merchant_order = MercadoPago\MerchantOrder::find_by_id($_GET["id"]);
}
    $id = $merchant_order->external_reference;
    $conn->query("INSERT INTO content (content) VALUES ('$id')");
  // If the payment's transaction amount is equal (or bigger) than the merchant_order's amount you can release your items
  $get = $conn->query("SELECT * FROM orders WHERE id_order = '$id'");
  $data = $get->fetch_assoc();



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
$p = json_decode($data['products']);
$num = count($p);
$products = '';
for ($i = 0; $i < $num; $i++) {
    $products .= '<div style="padding: 2px 0;color: #000 !important;">' . $p[$i]['nombre'] . ' ('. $p[$i]['cart_cant'] .' x '. $p[$i]['precio'] .')</div>';
}

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
        $Mail->Priority = 1;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
        $mail->setFrom('orders@highcbdd.com', 'Highcbdd');
        $mail->addAddress('pablo.150520@gmail.com', 'Nueva orden generada en mercado pago');
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
                <body>
                    <div>
                        <div style="padding: 20px;">
                            <div style="font-size: 14px !important; margin-top: 30px; color: #000; width: 100%;">
                                <div style="padding-top: 15px; padding-bottom: 10px; font-size: 13px !important; color: #000 !important;"><b>NOMBRE(S) Y APELLIDOS:</b></div>
                                <div style="padding: 10px 0; color: #000 !important;">' . $data['name'] . ' ' . $data['last_name'] . '</div>
                                <div style="padding-top: 15px; padding-bottom: 10px; font-size: 13px !important; color: #000 !important;"><b>CORREO ELECTRÓNICO:</b></div>
                                <div style="padding: 10px 0;"><a href="mailto:' . $data['email'] . '" style="text-decoration: none; color: #000;">' . $data['email'] . '</a></div>
                                <div style="padding-top: 15px; padding-bottom: 10px; font-size: 13px !important; color: #000 !important;"><b>PRODUCTOS:</b></div>
                                <div style="padding: 10px 0;">' . $products . '</div>
                                <div style="padding-top: 15px; padding-bottom: 10px; font-size: 13px !important; color: #000 !important;"><b>DIRECCIÓN:</b></div>
                                <div style="padding: 10px 0; color: #000 !important;">
                                Calle: ' . $data['street'] . '<br>
                                No. ext: ' . $data['no_ext'] . '<br>
                                No. int: ' . $data['no_int'] . '<br>
                                Estado: ' . $data['state'] . '<br>
                                Municipio: ' . $data['munici'] . '<br>
                                Colonia: ' . $data['suburb'] . '<br>
                                Codigo postal: ' . $data['cp'] . '<br>
                                </div>
                            </div>
                            <div style="font-size:15px; text-align: center; margin-top: 80px; padding-bottom: 20px; color: #000 !important;">Esta pedido fue generado el '. date('d-m-Y') .' a las '. date('h:i A') .'</div><br>
                        </div>
                    </div>
                </body>
            </html>';
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Nueva orden recibida';
        $mail->Body    = $template;
        $mail->CharSet = 'UTF-8';
        $mail->send();
    } catch (Exception $e) {
        error_log("Error al enviar el mensaje: {$mail->ErrorInfo}");
    }
?>