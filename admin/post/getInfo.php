<?php 
include_once('../../config/config.php');
$id = s($_POST['ref'], 'STRING');
$get = $conn->prepare("SELECT * FROM info_order IO INNER JOIN orders O ON O.id = IO.id_info WHERE IO.id_info=?");
$get->bind_param('s', $id);
$get->execute();
$result = $get->get_result();
$row = $result->num_rows;
if($row != 0){
    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data);
}else{
    echo 'null';
}
?>