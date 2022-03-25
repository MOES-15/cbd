<?php 
include_once('../../config/config.php');
$id = $_POST['ref'];
$null = '';
$stmt = $conn->query("DELETE FROM coupons WHERE id='$id'");
    if($stmt == true){
        $update = $conn->prepare("UPDATE products SET coupon=? WHERE coupon=?");
        $update->bind_param('ss', $null, $id);
        $update->execute();
    }
    echo $stmt;
?>