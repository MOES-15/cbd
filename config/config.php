<?php
$server = 'localhost';
$database = 'highcebe_cbd';
$username = 'highcebe_cbd';
$password = 'dasdDwer$5ef34#'; 
/* 
$server = 'localhost';
$database = 'cbd';
$username = 'root';
$password = '';
*/

$conn = new mysqli($server, $username, $password, $database);
if($conn->connect_errno){
    die("Connection failed: " . $conn->connect_error);
}

function s($string, $type){
    if($type == "PASSWORD"){
        $string = trim($string);
        return strip_tags($string); //Elimina etiquetas

    }else{
        $string = trim($string); //Elimina espacios en blanco al inicio y al final
        $string = preg_replace("/[<>?={}()#:|&]/", "", $string); //Elimina los caracteres <>\"=?{}#'&
        $string = stripslashes($string); //Eliminar barras
        $string = strip_tags($string); //Elimina etiquetas
        $string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8'); //Codifica caracteres especiales


        if($type == "EMAIL"){
            $string = filter_var($string, FILTER_SANITIZE_EMAIL);
            error_log('2 '. $string);
        }else if($type == "FOAT"){
            $string = filter_var($string, FILTER_SANITIZE_NUMBER_FLOAT);
        }else if($type == "INT"){
            $string = filter_var($string, FILTER_SANITIZE_NUMBER_INT);
        }else if($type == "STRING"){
            $string = filter_var($string, FILTER_SANITIZE_STRING);
        }else if($type == "URL"){
            $string = filter_var($string, FILTER_SANITIZE_URL);
        }else{
            $string = filter_var($string, FILTER_SANITIZE_STRING);
        }

        return $string;
    }
}
?>