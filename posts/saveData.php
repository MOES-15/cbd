<?php
session_start();
include '../config/config.php';
require '../vendor/autoload.php';
MercadoPago\SDK::setAccessToken('TEST-6490919314959474-050219-be40aa3585e520a52bd7c0fc1812b532-260364979');
$preference = new MercadoPago\Preference();
$preference->back_urls = array(
    "success" => "https://highcbdd.com/pay?status=34hf7sf8g8sdf8d7f&u=" . base64_encode($_POST['name']),
    "failure" => "https://highcbdd.com/cart",
    "pending" => "https://highcbdd.com/pay?status=das876f67dsf87sff67&u=". base64_encode($_POST['name'])
);
/* $preference->back_urls = array(
  "success" => "localhost/madigen/cbd/pay?status=34hf7sf8g8sdf8d7f&u=" . base64_encode($_POST['name']),
  "failure" => "localhost/madigen/cbd/cart",
  "pending" => "localhost/madigen/cbd/pay?status=das876f67dsf87sff67&u=". base64_encode($_POST['name'])
); */
$preference->auto_return = "approved";
$preference->notification_url = "https://highcbdd.com/posts/endpoint.php";
$id_ = time();
$preference->external_reference = $id_;
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
  "state_name" => $_POST['state'],
  "street_number" => $_POST['ext'],
  "zip_code" => $_POST['cp']
);
$get_c = $conn->query("SELECT * FROM products");
$row_c = $get_c->num_rows;
$data = $get_c->fetch_all(MYSQLI_ASSOC);
$products = [];
if($_SESSION['coupon'] == 0 || !isset($_SESSION['coupon'])){
  $p = $_POST['products'];
  $num = count($p);
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
}else{
  $p = $_SESSION['products'];
  $num = count($p);
  for($i_p = 0; $i_p < $num; $i_p++){
    $item = new MercadoPago\Item();
    $item->title = $p[$i_p]['name'];
    $item->quantity = $p[$i_p]['cart_cant'];
    $item->unit_price = $p[$i_p]['price'];
    $products[] = $item;
  }
}
$preference->payer = $payer;
$preference->items = $products;
$preference->save();
$id_order = $preference->id;
$name = $_POST['name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$tel = $_POST['tel'];

$street = $_POST['street'];
$state = $_POST['state'];
$munici = $_POST['munici'];
$suburb = $_POST['suburb'];
$int = $_POST['int'];
$ext = $_POST['ext'];
$cp = $_POST['cp'];
$products = json_encode($p);


// echo $preference->init_point;
$add_data = $conn->query("INSERT INTO orders (id, name, last_name, email, tel, id_order, street, state, munici, suburb, int, ext, cp, products) 
VALUES ('$id_order', '$name', '$last_name', '$email', '$tel', '$id_', '$street', '$state', '$munici', '$suburb', '$int', '$ext', '$cp', '$products')");

if($add_data == true){
  echo $preference->init_point;
}else{
  echo $preference->init_point;
}
 /*    session_start();
    $_SESSION['name'] = $_POST['form'];
    print_r($_POST['finalCart']); */
?>