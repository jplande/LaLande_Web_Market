<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    
   
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.php"> Admin Panel </a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
         
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link" href="profile.php" > <i class="fa fa-user-circle"> Profil </i> </a> </li> &nbsp; &nbsp;
          <a class="nav-link " href="logout.php"  role="button"  aria-expanded="false"> <i class="fa fa-sign-out"> Logout </i> </a> </li>

          
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fa fa-home"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="view_category.php">
            <i class="fa fa-tasks"></i>
            <span> Categories </span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="view_products.php">
            <i class="fa fa-table"></i>
            <span> Produits </span></a>
        </li>


        <li class="nav-item active">
          <a class="nav-link" href="view_orders.php">
            <i class="fa fa-braille"></i>
            <span> Commandes </span></a>
        </li>

         <li class="nav-item active">
          <a class="nav-link" href="view_users.php">
            <i class="fa fa-user"></i>
            <span> Users </span></a>
        </li>

      </ul>


