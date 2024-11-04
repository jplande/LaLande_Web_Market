<?php
  $servername = "localhost";
  $uname = "root";
  $pw = '';
  $dbname = "Lalande";
  // Creer connection
  // Creer connection
  $conn = new mysqli($servername, $uname, $pw, $dbname);
      // verif connection
  if ($conn->connect_errno) {
    die("Connection echouer: " . $conn->connect_error);
    exit();
      }

$ip_server = $_SERVER['SERVER_ADDR']; 
      ?>
