<?php
require '../vendor/autoload.php';
include '../config/config.php';
MercadoPago\SDK::setAccessToken('TEST-6490919314959474-050219-be40aa3585e520a52bd7c0fc1812b532-260364979');

  $merchant_order = null;

  switch($_GET["topic"]) {
      case "payment":
          $payment = MercadoPago\Payment::find_by_id($_GET["id"]);
          // Get the payment and the corresponding merchant_order reported by the IPN.
          $merchant_order = MercadoPago\MerchantOrder::find_by_id($payment->order->id);
          break;
          case "merchant_order":
            $merchant_order = MercadoPago\MerchantOrder::find_by_id($_GET["id"]);
            $add = $conn->query("INSERT INTO content (content, data) VALUES ('$merchant_order', '2')");
          break;
  }

  $paid_amount = 0;
  foreach ($merchant_order->payments as $payment) {  
      if ($payment['status'] == 'approved'){
          $paid_amount += $payment['transaction_amount'];
      }
  }
 
  // If the payment's transaction amount is equal (or bigger) than the merchant_order's amount you can release your items
  if($paid_amount >= $merchant_order->total_amount){
      $json = json_encode($merchant_order);
    $conn->query("INSERT INTO content (content, data) VALUES ('$json', 'pay')");
      if (count($merchant_order->shipments)>0) { // The merchant_order has shipments
          if($merchant_order->shipments[0]->status == "ready_to_ship") {
              print_r("Totally paid. Print the label and release your item.");
          }
      } else { // The merchant_order don't has any shipments
          print_r("Totally paid. Release your item.");
      }
  } else {
      print_r("Not paid yet. Do not release your item.");
  }
?>