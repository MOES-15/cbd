<?php
date_default_timezone_set("America/Mexico_City");
require '../vendor/autoload.php';
include '../config/config.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
MercadoPago\SDK::setAccessToken('APP_USR-6490919314959474-050219-6f68fe4bd5c207555995f769394c178e-260364979');
    $merchant_order = null;
    if($_GET["topic"] == 'payment'){
            $payment = MercadoPago\Payment::find_by_id($_GET["id"]);
            $merchant_order = MercadoPago\MerchantOrder::find_by_id($payment->order->id);
    }else if($_GET["topic"] == 'merchant_order'){
        $merchant_order = MercadoPago\MerchantOrder::find_by_id($_GET["id"]);
    }
    $id = $merchant_order->external_reference;
    if($a != ''){

        $get = $conn->query("SELECT * FROM orders WHERE id_order = '$id'");
        $data = $get->fetch_assoc();
        $p = json_decode($data['products'], true);
        $products = '';
        foreach ($p as $v) {
            $products .= '<div style="padding: 2px 0;color: #000 !important;">- ' . $v[0]['name'] . ' (<b>'. $v[0]['cart_cant'] .'</b> x $'. $v[0]['price'] .')</div>';
        }
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'localhost';
        $mail->SMTPAuth = false;
        $mail->SMTPAutoTLS = false;
        $mail->Port = 25;
        $mail->Priority = 1;
    
        $mail->setFrom('orders@highcbdd.com', 'Highcbdd');
        /* $mail->addAddress('highcbd2@gmail.com', 'Nueva orden generada en mercado pago');
        $mail->addAddress('highCBD1@gmail.com', 'Nueva orden generada en mercado pago');
        $mail->addAddress('c.vilchez@madigen.mx', 'Nueva orden generada en mercado pago'); */
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
                                <div style="padding-top: 15px; padding-bottom: 10px; font-size: 20px !important; color: #000 !important; text-align: center;"><b>NUEVO PEDIDO GENERADO</b></div>
                                <div style="padding-top: 15px; padding-bottom: 35px; font-size: 16px !important; color: #000 !important; text-align: center;"><b>MERCADO PAGO TE ENVIARA CORREO CUANDO EL PAGO ESTE CONFIRMADO, DE MOMENTO PUEDES REVISAR LA ORDEN EN EL PANEL</b></div>
                                <div style="padding-top: 15px; padding-bottom: 10px; font-size: 13px !important; color: #000 !important;"><b>ID: '.$data['id_order'].'</b></div>
                                <div style="padding-top: 15px; padding-bottom: 10px; font-size: 13px !important; color: #000 !important;"><b>NOMBRE(S) Y APELLIDOS:</b></div>
                                <div style="padding: 10px 0; color: #000 !important;">' . $data['name'] . ' ' . $data['last_name'] . '</div>
                                <div style="padding-top: 15px; padding-bottom: 10px; font-size: 13px !important; color: #000 !important;"><b>CORREO ELECTRÓNICO:</b></div>
                                <div style="padding: 10px 0;"><a href="mailto:' . $data['email'] . '" style="text-decoration: none; color: #000;">' . $data['email'] . '</a></div>
                                <div style="padding-top: 15px; padding-bottom: 10px; font-size: 13px !important; color: #000 !important;"><b>CUPON:</b></div>
                                <div style="padding: 10px 0;">' . $data['cupon'] . '</div>
                                <div style="padding-top: 15px; padding-bottom: 10px; font-size: 13px !important; color: #000 !important;"><b>PRODUCTOS:</b></div>
                                <div style="padding: 10px 0;">' . $products . '</div>
                                <div style="padding-top: 15px; padding-bottom: 10px; font-size: 13px !important; color: #000 !important;"><b>DIRECCIÓN:</b></div>
                                <div style="padding: 10px 0; color: #000 !important;">
                                Calle: ' . $data['street'] . '<br>
                                No. ext: ' . $data['no_ext'] . '<br>
                                No. int: ' . $data['no_int'] . '<br>
                                Estado: ' . $data['state_'] . '<br>
                                Municipio: ' . $data['munici'] . '<br>
                                Colonia: ' . $data['suburb'] . '<br>
                                Codigo postal: ' . $data['cp'] . '<br>
                                </div>
                            </div>
                            <div style="font-size:15px; text-align: center; margin-top: 80px; padding-bottom: 20px; color: #000 !important;">Este pedido fue generado el '. date('d-m-Y') .' a las '. date('h:i A') .'</div><br>
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
    }
?>