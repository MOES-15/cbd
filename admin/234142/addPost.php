<?php
    header('Access-Control-Allow-Origin: https://panel.madigen.mx');
    include_once('../../config/config.php');
    $id = md5(uniqid());
    $date = date('Y-m-d');
    $title = $_POST['title'];
    $autor = $_POST['autor'];
    $youtube = $_POST['youtube'];
    $category_one = $_POST['category_one'];
    $category_two = $_POST['category_two'];
    $small = $_POST['small'];
    $body = $_POST['bod'];
    $name_photo   = $_FILES['image']["name"];
    $size_photo = $_FILES['image']['size'];
    if(empty($title) || empty($autor) || empty($name_photo) || empty($category_one) || empty($category_two)|| empty($small)|| empty($body)){
        echo NULL;
    }else{
        $get = $conn->prepare("SELECT * FROM blog WHERE titulo=?");
        $get->bind_param('s', $title);
        $get->execute();
        $get = $get->get_result();
        $num = $get->num_rows;
        if($num != 0){
            echo 'one';
        }else{
        
            $photo_move = '';
            $fileName = time() . basename($name_photo);
            $fileUploaded = "../../assets/media/img/post/" . time() . basename($name_photo);
            $extensionFile = strtolower(pathinfo($name_photo, PATHINFO_EXTENSION));
            if ($extensionFile =="jpg"){ 
                if ($size_photo < 1000000){
                    if(move_uploaded_file($_FILES['image']["tmp_name"], $fileUploaded)){
                        $photo_move = $fileName;
                    }
                }
            }
            $add = $conn->prepare('INSERT INTO blog (id, titulo, descripcion_corta, contenido, imagen, fecha, autor, categoria_1, categoria_2, video) VALUES (?,?,?,?,?,?,?,?,?,?)');
            $add->bind_param('ssssssssss', $id, $title, $small, $body, $photo_move, $date, $autor, $category_one, $category_two, $youtube);
            $add->execute();
            if($add == TRUE){
                echo true;
            }else{
                echo false;
            }
            

        }
    }

?>