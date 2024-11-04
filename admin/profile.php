<?php include('../connection.php');
@session_start();

if(!isset($_SESSION['admin_login'])) {
  header("Location: login.php");
  }


$msg = 0;


if (isset($_POST['submit_add'])) {

   $qr =  mysqli_query($conn,"UPDATE `preferences` SET `admin_email`='{$_POST['admin_email']}',`admin_pass`='{$_POST['admin_pass']}' WHERE id='{$_SESSION['id']}'");

   if ($qr) {
      $msg = 1;
      $msg_alert = '<div class="alert alert-success alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong> Success !  </strong>   Your Profile Updated Successfully </div>';
   }
}


$sqlitem=  mysqli_query($conn,"SELECT * from preferences WHERE id='{$_SESSION['id']}'");
$rowitem = mysqli_fetch_assoc($sqlitem);

 include('header.php');   
 ?>

       
           <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#"> Dashboard </a>
            </li>
            <li class="breadcrumb-item active"> Admin Profil </li>
          </ol>

             <?php if ($msg=='1') {
                echo $msg_alert;
              } ?>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-key"></i>
              Admin Profil 
           </div>
                       
                        <form  method="POST" action="" enctype="multipart/form-data" >

                           <div class="col-md-12 col-sm-6 col-xs-12 nopadding">
                              <div class="form-group">
                                 <label  class="col-sm-4 col-form-label"> Email </label>
                                 <div class="col-sm-8"> 
                                    <input type="email" class="form-control" name="admin_email"  value="<?php echo $rowitem['admin_email'] ?>" required>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-12 col-sm-6 col-xs-12 nopadding">
                              <div class="form-group">
                                 <label  class="col-sm-4 col-form-label"> Mot de Passe </label>
                                 <div class="col-sm-8"> 
                                    <input type="password" class="form-control" name="admin_pass"  value="<?php echo $rowitem['admin_pass'] ?>" required>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-12 col-sm-6 col-xs-12 nopadding">
                              <div class="form-group"> 
                                 <div class="col-sm-8"> 
                                    <button type="submit" name="submit_add" class="btn btn-primary form-control">MAJ Profil </button>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  
               </div>
            </div>
         </section>
 
<?php include 'footer.php' ?>


   <style type="text/css">
      input[type="text"] {
  border:1px solid grey;
  display: block;
  margin-bottom: 10px;
  background-color: white;
}

 input[type="email"] {
  border:1px solid grey;
  display: block;
  margin-bottom: 10px;
  background-color: white;
}

 input[type="file"] {
  border:1px solid grey;
  display: block;
  margin-bottom: 10px;
  background-color: white;
}

textarea {
   border:1px solid grey;
  display: block;
  margin-bottom: 10px;
  background-color: white;
}

   </style>

   </body>
</html>