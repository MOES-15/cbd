<?php
require '../vendor/autoload.php';
include '../config/config.php';
  MercadoPago\SDK::setAccessToken("TEST-6490919314959474-050219-be40aa3585e520a52bd7c0fc1812b532-260364979");
  $payment = MercadoPago\Payment::find_by_id($_POST["data"]["id"]);
$add = $conn->query("INSERT INTO content (content, data) VALUES ('$payment', '$data_2')");
?>