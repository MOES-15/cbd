<?php 
session_start(); 
if (isset($_SESSION['s']) || empty($_SESSION['s']['i'])){ 
    session_unset(); 
    session_destroy();
    header('Location: ../login'); 
    exit(); 
}
?>