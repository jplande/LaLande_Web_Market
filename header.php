<?php

include 'connection.php';
@session_start(); 

?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title> Lalande_Web_Market </title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
    <?php  include 'connection.php';  ?>


    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a style="color: #138496;font-weight: bold" class="navbar-brand" href="index.php"> Lalande_Web_Mark </a>
                </div>
                <!-- Fin header -->

                <!-- Lien Nav, forms, et autre Pour basculer -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Acceuil</a></li>
                        
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Categories</a>
                            <ul class="dropdown-menu">
                                <?php $cat =  mysqli_query($conn,"SELECT * from category");
                                      while($rowcat = mysqli_fetch_assoc($cat)) { 
                                        echo '<li><a style="color:white" href="shop.php?cat='.$rowcat['id'].'">'.$rowcat['name'].'</a></li>';
                                    } ?>
                            </ul>
                        </li>
                       

                        <?php if(isset($_SESSION['email'])) {
                                    echo '<li class="nav-item"><a class="nav-link" href="compte.php"> Compte </a></li>';
                                    echo '<li class="nav-item"><a class="nav-link" href="logout.php"> Logout </a></li>';
                                } else {
                                    echo '<li class="nav-item"><a class="nav-link" href="login.php"> Login </a></li>
                                          ';
                                    echo '<li class="nav-item"><a class="nav-link" href="Inscription.php"> Inscription </a></li>
                                          ';
                                 } ?>
                                 
                      <li class="nav-item">
                        <form method="POST" action="shop.php">
                                <div class="input-group">
                                   <input type="text" class="form-control" placeholder="Recherche" name="search" style="border-bottom: 1px solid white">
                                    <button class="btn btn-info btn-sm" type="submit" name="searchbtn" >  Recherche </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        
                        <li>
                            <a href="cart.php" >
                                <i class="fa fa-shopping-bag"> Mon Panier </i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>    
        </nav>
    </header>
