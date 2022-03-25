<?php 
include_once('../../config/config.php');
$id = '';
$get = $conn->query("SELECT * FROM products");
$row = $get->num_rows;
if($row != 0){
    $data = $get->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data);
}else{
    echo 'null';
}
?>