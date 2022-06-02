<?php
include '../config/config.php';
date_default_timezone_set("America/Mexico_City");
$data = json_decode($_POST['data__']);
$add = $conn->prepare("INSERT INTO data (data) VALUES (?)");
$add->bind_param('s', $data);
$add->execute();
?>