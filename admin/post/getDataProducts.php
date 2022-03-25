<?php 
include_once('../../config/config.php');
$id = s($_POST['ref'], 'STRING');
$get = $conn->prepare("SELECT * FROM products WHERE id=?");
$get->bind_param('s', $id);
$get->execute();
$result = $get->get_result();
$row = $result->num_rows;
if($row != 0){
    $data = $result->fetch_assoc();
    echo json_encode($data);
}else{
    echo 'null';
}
?>