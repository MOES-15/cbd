<?php 
include_once('../../config/config.php');
    $id = s($_POST['ref'], 'STRING');
    $null = '';
    $update = $conn->prepare("UPDATE products SET coupon=? WHERE id=?");
    $update->bind_param('ss', $null, $id);
    $update->execute();
?>