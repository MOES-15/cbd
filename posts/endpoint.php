<?php
include '../config/config.php';
date_default_timezone_set("America/Mexico_City");
$body = @file_get_contents('php://input');
$data = json_decode($body);
$add = $conn->prepare("INSERT INTO content (content) VALUES (?)");
$add->bind_param('s', $data);
$add->execute();
?>