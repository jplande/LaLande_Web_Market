<?php include 'connection.php'; 
@session_start();
session_destroy(); 

unset($_SESSION['admin_login']);
unset($_SESSION['id']);


header('location: login.php');

 ?>