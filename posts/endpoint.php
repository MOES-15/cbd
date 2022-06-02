<?php
include '../config/config.php';
date_default_timezone_set("America/Mexico_City");
$body = @file_get_contents('php://input');
$data = json_decode($body);
$add = $conn->query("INSERT INTO content (content) VALUES ('$data')");
?>