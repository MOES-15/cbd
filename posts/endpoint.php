<?php
include '../config/config.php';
date_default_timezone_set("America/Mexico_City");

$id = $_GET['id'];
$type = $_GET['topic'];

$data_2 = 'llega';
$add = $conn->query("INSERT INTO content (content, data) VALUES ('$id', '$data_2')");
?>