<?php 
include_once('../../config/config.php');
$id = s($_POST['ref'], 'STRING');
$estatus = s($_POST['estatus'], 'STRING');
$update = $conn->prepare("UPDATE orders SET estatus=? WHERE id=?");
$update->bind_param('ss', $estatus, $id);
$update->execute();
?>