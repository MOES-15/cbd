<?php 
include_once('../../config/config.php');
$_p = s($_POST['p'], 'PASSWORD');
$_e = s($_POST['e'], 'EMAIL');
/* echo password_hash($_p, PASSWORD_DEFAULT, ['cost' => 12]); */
$get = $conn->prepare("SELECT * FROM users WHERE email=?");
$get->bind_param('s', $_e);
$get->execute();
$result = $get->get_result();
$row = $result->num_rows;
    if($row != 0){
        $data = $result->fetch_assoc();
        if(password_verify($_p, $data['password']) || password_verify($_p, $data['password_r'])){
            session_start();
            $_SESSION['s'] = [
                'i' => $data['id']
            ];
            echo 'true';
        }else{
            echo 'null_p';
        }
    }else{
        echo 'null_e';
    }
?>