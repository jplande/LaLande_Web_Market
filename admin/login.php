<?php include('../connection.php');
@session_start();

if(isset($_SESSION['admin_login'])) {
  header("Location: index.php");
  }

if(isset($_POST['submit'])) {
  $query = mysqli_query($conn,"SELECT * from preferences WHERE admin_email = '{$_POST['username']}' and admin_pass = '{$_POST['password']}'");

  $num = mysqli_num_rows($query);
  if($num > 0) {
    $rowfetch = mysqli_fetch_assoc($query);
    $_SESSION['admin_login'] = $_POST['username'];
    $_SESSION['id'] = $rowfetch['id'];

    echo "<script> window.open('index.php','_self') </script>";

    } else {
      $message = 1;
      }
  }

if ((isset($_GET['logout'])) &&($_GET['logout']=="true")){
  
  $_SESSION['admin_login'] = NULL;
  unset($_SESSION['admin_login']);
  session_destroy();
  $message = 0;
}
?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin | Login </title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body style="background-image: url('../images/banneradmin.jpg');background-size: cover;">


    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header" style="background-color: #007BFF;color: white;text-align: center">Admin Login</div>
        <div class="card-body">

          <?php if (isset($message)) {
        if($message == 0) {
          echo "<p><div class=\"alert alert-success\" style=\"cursor:default;\">logout Reussi!</div> </p>";
          } elseif($message == 1) {
            echo "<p><div class=\"alert alert-danger\" style=\"cursor:default;\">Les informations d'identification ne correspondent pas!</div> </p>";
            }} ?> 

            
            
           <form action="" class="form-signin" role="form" method="post">
            <div class="form-group">         
                <input name="username" type="email" required class="form-control" id="username" placeholder="Email address" maxlength="100">
            </div>
            <div class="form-group">
                <input name="password" type="password" required class="form-control" id="password" placeholder="Password" maxlength="50">
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">s'identifier</button>
          </form>
         
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>