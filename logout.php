<?php include 'connection.php'; 
@session_start();
session_destroy(); 

unset($_SESSION['email']);
unset($_SESSION['id']);


header('location: index.php');

 ?>