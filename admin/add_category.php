<?php include('../connection.php');
@session_start();

if(!isset($_SESSION['admin_login'])) {
  header("Location: login.php");
  }

 include('header.php'); 

$msg = 0;

if(isset($_POST['delete'])) {
    mysqli_query($conn,"DELETE from category WHERE id='{$_POST['hide_id']}'");

    $msg = 1;
    $msg_alert = '<br> <div class="alert alert-danger alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong> Success! </strong>  Category Deleted Successfully </div>';
}


if (isset($_POST['add_department'])) {


    mysqli_query($conn,"INSERT into `category`(`name`) VALUES ('{$_POST['name']}') ");
    
    $msg = 1;
    $msg_alert = '<br> <div class="alert alert-success alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong> Success! </strong>  Category Added Successfully </div>';
}


 ?>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#"> Dashboard </a>
            </li>
            <li class="breadcrumb-item active"> Category </li>
          </ol>

              <?php if ($msg=='1') {
                echo $msg_alert;
              } ?>

          <!-- DataTables Example -->
          <div class="card mb-12">
            <div class="card-header"> <i class="fas fa-table">  </i>  Ajout New Categorie
            <a href="view_category.php" class="btn btn-info btn-sm" style="float: right;"> Voir Categorie </a>
             </div>

            <div class="card-body">
              <div class="table-responsive">
                    <form method="POST" action="" enctype="multipart/form-data" >
                          <label>  Nom </label>
                          <input type="text" name="name" class="form-control" placeholder="Enter Category Name" > <br>

                          <center> <button type="submit" style="width: 30%" name="add_department" class="btn btn-primary form-control" > Add Categorie </button> </center>
                    </form>
              </div>
            </div>
          </div>
      
      
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span> Copyright © siteweb 2021 </span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

<?php  include('footer.php'); ?>