<?php
include '../config/config.php';
date_default_timezone_set("America/Mexico_City");
$data = @file_get_contents('php://input');
$add = $conn->prepare("INSERT INTO content (content) VALUES (?)");
$add->bind_param('s', $data);
$add->execute();
?>