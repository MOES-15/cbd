<?php 
date_default_timezone_set("America/Mexico_City");
session_start();
include_once('../config/config.php');
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
    $discount_ = 0;
    $products_ = [];
    $products = [];
    for($i_p = 0; $i_p < $num; $i_p++){
        for($i = 0; $i < $row_c; $i++){
            if($data[$i]['id'] === $p[$i_p][0]['id']){
                if($data[$i]['coupon'] === $coupon['id']){
                    if($coupon['type_amount'] == 'Cantidad'){
                        $discount += ($coupon['amount']);
                        $discount_ += ($coupon['amount'] * $p[$i_p][0]['cart_cant']);
                    }else{
                        $discount += (($data[$i]['precio']) * $coupon['amount']) / 100;
                        $discount_ += (($data[$i]['precio'] * $p[$i_p][0]['cart_cant']) * $coupon['amount']) / 100;
                    }
                    $products_ = [
                        'id' => $data[$i]['id'],
                        'name' => $data[$i]['nombre'],
                        'cart_cant' => $p[$i_p][0]['cart_cant'],
                        'price' => $data[$i]['precio'] - $discount
                    ];
                    $products[] = $products_;
                }else{
                    $products_ = [
                        'id' => $data[$i]['id'],
                        'name' => $data[$i]['nombre'],
                        'cart_cant' => $p[$i_p][0]['cart_cant'],
                        'price' => $data[$i]['precio']
                    ];
                    $products[] = $products_;
                }
            }
        }
    }
    $_SESSION['name_cupon'] = $name;
    $_SESSION['products'] = $products;
    $_SESSION['coupon'] = $discount_;
    echo $discount_;
}else{
    echo 0;
}
?>