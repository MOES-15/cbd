<?php
// SDK de Mercado Pago
require '../mp/vendor/autoload.php';
// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-145822906898522-040202-f1da1c931116869679728535d53d9447-730391541');
$preference = new MercadoPago\Preference();
$preference->back_urls = array(
    "success" => "https://www.tu-sitio/success",
    "failure" => "http://www.tu-sitio/failure",
    "pending" => "http://www.tu-sitio/pending"
);
$preference->auto_return = "approved";
$payer = new MercadoPago\Payer();
$payer->name = "Charles";
$payer->surname = "Luevano";
$payer->email = "charles@hotmail.com";
$payer->date_created = "2018-06-02T12:58:41.425-04:00";
$payer->phone = array(
  "area_code" => "",
  "number" => "949 128 866"
);
$payer->address = array(
  "street_name" => "Cuesta Miguel Armendáriz",
  "street_number" => 1004,
  "zip_code" => "11020"
);
// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Mi producto';
$item->quantity = 1;
$item->unit_price = 75.56;
$preference->items = array($item);
$preference->save();
echo $preference->id;
 /*    session_start();
    $_SESSION['name'] = $_POST['form'];
    print_r($_POST['finalCart']); */
?>