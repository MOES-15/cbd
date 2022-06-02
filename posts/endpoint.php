<?php
require '../vendor/autoload.php';
include '../config/config.php';
date_default_timezone_set("America/Mexico_City");
  MercadoPago\SDK::setAccessToken("TEST-6490919314959474-050219-be40aa3585e520a52bd7c0fc1812b532-260364979");
  switch($_POST["type"]) {
      case "payment":
          $payment = MercadoPago\Payment::find_by_id($_POST["data"]["id"]);
          break;
      case "plan":
          $plan = MercadoPago\Plan::find_by_id($_POST["data"]["id"]);
          break;
      case "subscription":
          $plan = MercadoPago\Subscription::find_by_id($_POST["data"]["id"]);
          break;
      case "invoice":
          $plan = MercadoPago\Invoice::find_by_id($_POST["data"]["id"]);
          break;
      case "point_integration_wh":
          // $_POST contiene la informaciòn relacionada a la notificaciòn.
          break;
  }
$add = $conn->query("INSERT INTO content (content, data) VALUES ('$plan', '$data_2')");
?>