<?php 
header('Access-Control-Allow-Origin: https://panel.madigen.mx');
include_once('../../config/config.php');
$get = $conn->query("SELECT * FROM blog");
$num = $get->num_rows;
$r = $get->fetch_all(MYSQLI_ASSOC);
echo json_encode($r);
?>