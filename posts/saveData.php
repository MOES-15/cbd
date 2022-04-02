<?php
// SDK de Mercado Pago
require '../mp/vendor/autoload.php';
// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-145822906898522-040202-f1da1c931116869679728535d53d9447-730391541');
$preference = new MercadoPago\Preference();

$int = ' no. int ' . $_POST['int'];
if($_POST['int'] == ''){
    $int = ' ';
}
$preference->back_urls = array(
    "success" => "https://highcbdd.com/dev/pay?status=34hf7sf8g8sdf8d7f&u=" . base64_encode($_POST['name']),
    "failure" => "https://highcbdd.com/dev/cart",
    "pending" => "https://highcbdd.com/dev/pay?status=das876f67dsf87sff67&u=". base64_encode($_POST['name'])
);
$preference->auto_return = "approved";
$payer = new MercadoPago\Payer();
$payer->name = $_POST['name'];
$payer->surname = $_POST['last_name'];
$payer->email = $_POST['email'];
$payer->phone = array(
  "area_code" => "+52",
  "number" => $_POST['tel']
);
$payer->address = array(
  "street_name" => $_POST['street'],
  "street_number" => $_POST['ext'],
  "zip_code" => $_POST['cp']
);
// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Mi producto';
$item->quantity = 1;
$item->unit_price = 75.56;
$preference->items = array($item);
$preference->save();
echo $preference->init_point;
 /*    session_start();
    $_SESSION['name'] = $_POST['form'];
    print_r($_POST['finalCart']); */
?>