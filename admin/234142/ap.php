<?php 

    include_once('../../config/config.php');

    function add($ref){
        $ref = trim($ref);
        return $ref;
    }
    $id = md5(uniqid());
    $date = date('Y-m-d');
    $title = $_POST['title'];
    $autor = $_POST['autor'];
    $twitter = $_POST['twitter'];
    $category_one = $_POST['category_one'];
    $category_two = $_POST['category_two'];
    $description_small = $_POST['description-small'];
    $description = $_POST['description'];
    $name_photo   = $_FILES['image_data']["name"];
    $size_photo = $_FILES['image_data']['size'];
    $id_video = $_POST['video'];
    if(empty($title) || empty($autor) || empty($name_photo) || empty($category_one) || empty($category_two)|| empty($description_small)|| empty($description)){
        header('Location: ../create?error=null');
    }else{
                        $get = $conn->prepare("SELECT * FROM blog WHERE titulo=?");
                        $get->bind_param('s', $title);
                        $get->execute();
                        $get = $get->get_result();
                        $num = $get->num_rows;
                        if($num != 0){
                            header('Location: ../create?error=1');
                        }else{
                            $photo_move = '';
                            $fileName = time() . basename($name_photo);
                            $fileUploaded = "../../assets/media/img/post/" . time() . basename($name_photo);
                            $extensionFile = strtolower(pathinfo($name_photo, PATHINFO_EXTENSION));
                            //Se valida si el formato es correcto para actualizar la foto
                            if ($extensionFile =="jpg" || $extensionFile =="jpeg"){ 
                                //validar si el tamaño del archivo es menor que 200kb
                                if ($size_photo < 1500000){
                                    // se validó el archivo correctamente y el tamaño, se puede continuar...
                                    if(move_uploaded_file($_FILES['image_data']["tmp_name"], $fileUploaded)){
                                        $photo_move = $fileName;
                                    }
                                }
                            }

                            $add = $conn->prepare('INSERT INTO blog (id, titulo, descripcion_corta, contenido, imagen, fecha, autor, categoria_1, categoria_2, video) VALUES (?,?,?,?,?,?,?,?,?,?)');
                            $add->bind_param('ssssssssss', $id, $title, $description_small, $description, $photo_move, $date, $autor, $category_one, $category_two, $video);
                            $add->execute();
                //}
                            if($add == TRUE){
                                header('Location: ../../post?p_ref='. urlencode($title));
                            }else{
                                header('Location: ../create?error=error');
                            }

                        }
    }

?>