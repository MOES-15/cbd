<?php
include_once('../config/config.php');
require '../vendor/autoload.php';
MercadoPago\SDK::setAccessToken('TEST-145822906898522-040202-f1da1c931116869679728535d53d9447-730391541');
$preference = new MercadoPago\Preference();
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
$p = $_POST['checkout'];
$num = count($p);
$get_c = $conn->query("SELECT * FROM products");
$row_c = $get_c->num_rows;
$data = $get_c->fetch_all(MYSQLI_ASSOC);
$products = [];
for($i_p = 0; $i_p < $num; $i_p++){
  for($i = 0; $i < $row_c; $i++){
      if($data[$i]['id'] === $p[$i_p][0]['id']){
        $total_2 += ($data[$i]['precio'] * $p[$i_p][0]['cart_cant']);
        $item = new MercadoPago\Item();
        $item->title = $data[$i]['nombre'];
        $item->quantity = $p[$i_p][0]['cart_cant'];
        $item->unit_price = $data[$i]['precio'];
        $products[] = $item;
    }
  }
}
$preference->items = $products;
$preference->save();
echo $preference->init_point;
 /*    session_start();
    $_SESSION['name'] = $_POST['form'];
    print_r($_POST['finalCart']); */
?>