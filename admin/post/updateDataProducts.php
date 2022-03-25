<?php 
include_once('../../config/config.php');
$id = s($_POST['id'], 'STRING');
$sku = s($_POST['sku'], 'STRING');
$name_p = s($_POST['name_p'], 'STRING');
$price = $_POST['price'];
$amount = s($_POST['amount'], 'INT');
$update = $conn->prepare("UPDATE products SET sku=?, cantidad=?, nombre=?, precio=? WHERE id=?");
$update->bind_param('sisss', $sku, $amount, $name_p, $price, $id);
$update->execute();
?>