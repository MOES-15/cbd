<?php 
include '../../config/config.php';
$id = md5(uniqid());
$coupon = $_POST['coupon'];
$amount = $_POST['amount'];
$type = $_POST['type'];
$type_apply = $_POST['type_apply'];
$date = $_POST['date'];
$products = $_POST['products'];
if($type_apply == 'Productos'){
    $num_product = count($_POST['products']);
    for($i = 0;$i < $num_product; $i++){
        $update = $conn->prepare("UPDATE products SET coupon=? WHERE id=?");
        $update->bind_param('ss', $id, $products[$i]);
        $update->execute();
    }
}
$add = $conn->prepare("INSERT INTO coupons (id, coupon, amount, type, type_amount, date_due) VALUES (?,?,?,?,?,?)");
$add->bind_param('ssssss', $id, $coupon, $amount, $type_apply, $type, $date);
$add->execute();

?>