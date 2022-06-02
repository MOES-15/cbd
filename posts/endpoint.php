<?php
include '../config/config.php';
date_default_timezone_set("America/Mexico_City");
$body = @file_get_contents('php://input');
$data = json_decode($body);
$data_2 = 'llega';
$add = $conn->query("INSERT INTO content (content, data) VALUES ('$data', '$data_2')");
?>