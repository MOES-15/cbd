<?php 
include_once('../../config/config.php');
$id = s($_POST['ref'], 'STRING');
$null = '';
$stmt = $conn->prepare("DELETE FROM coupons WHERE id=?");
$stmt->bind_param('s', $id);
if($stmt->execute() == true){
    $update = $conn->prepare("UPDATE products SET coupon=? WHERE coupon=?");
    $update->bind_param('ss', $null, $id);
    $update->execute();
}
?>