<?php 
include_once('../config/config.php');
date_default_timezone_set("America/Mexico_City");
$name = s($_POST['coupon'], 'STRING');
$get = $conn->prepare("SELECT * FROM coupons WHERE coupon=?");
$get->bind_param('s', $name);
$get->execute();
$result = $get->get_result();
$row = $result->num_rows;
if($row != 0){
    $coupon = $result->fetch_assoc();
    $p = $_POST['products'];
    $num = count($p);
    $get_c = $conn->query("SELECT * FROM products");
    $row_c = $get_c->num_rows;
    $data = $get_c->fetch_all(MYSQLI_ASSOC);
    $discount = 0;
    for($i_p = 0; $i_p < $num; $i_p++){
        for($i = 0; $i < $row_c; $i++){
            if($data[$i]['id'] === $p[$i_p][0]['id'] && $data[$i]['coupon'] === $coupon['id']){
                if($coupon['type_amount'] == 'Cantidad'){
                    $discount += $coupon['amount'] * $p[$i_p][0]['cart_cant'];
                }else{
                    $discount += (($data[$i]['precio'] * $p[$i_p][0]['cart_cant']) * $coupon['amount']) / 100;
                }
            }
        }
      }
      echo $discount;
}else{
    echo 'null';
}
?>