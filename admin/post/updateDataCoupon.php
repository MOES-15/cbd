<?php 
include '../../config/config.php';
$id = $_POST['id'];
$coupon = $_POST['coupon'];
$amount = $_POST['amount'];
$type = $_POST['type'];
$type_apply = $_POST['type_apply'];
$date = $_POST['date'];
$products = $_POST['products'];
if($type_apply == 'Productos'){
    $num_product = count($_POST['products']);
    $null = '';
    $update = $conn->prepare("UPDATE products SET coupon=? WHERE coupon=?");
    $update->bind_param('ss', $null, $id);
    $update->execute();
    for($i = 0;$i < $num_product; $i++){
        $update = $conn->prepare("UPDATE products SET coupon=? WHERE id=?");
        $update->bind_param('ss', $id, $products[$i]);
        $update->execute();
    }
}else{
    $null = '';
    $update = $conn->prepare("UPDATE products SET coupon=? WHERE coupon=?");
    $update->bind_param('ss', $null, $id);
    $update->execute();
}
$add = $conn->prepare("UPDATE coupons SET coupon=?, amount=?, type=?, type_amount=?, date_due=? WHERE id=?");
$add->bind_param('ssssss', $coupon, $amount, $type_apply, $type, $date, $id);
$add->execute();

?>