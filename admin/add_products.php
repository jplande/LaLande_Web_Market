<?php include('../connection.php');
@session_start();

if(!isset($_SESSION['admin_login'])) {
  header("Location: login.php");
  }

 include('header.php'); 

$msg = 0;

if (isset($_POST['add_product'])) {

    $product_img=$_FILES['image']['name'];
    $tmp_name=$_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_name, "../images/$product_img");


    $name = str_replace("'", " ", $_POST['name']);
    $desc = str_replace("'", " ", $_POST['desc']);

    $insert_product= mysqli_query($conn,"INSERT INTO `products`(`name`, `cat`, `type`, `image`, `price`, `description`) values ('{$name}','{$_POST['category']}','other','{$product_img}','{$_POST['price']}','{$desc}')");

   if ($insert_product) {
    $msg = 1;
     $msg_alert = '<br> <div class="alert alert-success alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong> Success! </strong> Product Added Successfully </div>';
   }

}


 ?>
      <div id="content-wrapper">
        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#"> Dashboard </a>
            </li>
            <li class="breadcrumb-item active"> Ajout nouveau produit </li>
          </ol>

          <?php if ($msg=='1') {
                echo $msg_alert;
              } ?>

          <div class="card mb-12">
            <div class="card-header"> <i class="fas fa-table">  </i>  Ajout nouveau Produit
             <a href="view_products.php" class="btn btn-info btn-sm" style="float: right;"> Voir Produit </a>
           </div>

            <div class="card-body">
              <div class="table-responsive">
                    <form method="POST" action="" enctype="multipart/form-data" >
                           <label> Nom Produit </label>
                           <input type="name" class="form-control" name="name" required> <br>


                          <label> Categorie Produit </label>
                          <select class="form-control" name="category" >


                            <?php $cat =  mysqli_query($conn,"SELECT * from category");
                                      while($rowcat = mysqli_fetch_assoc($cat)) { 
                                    echo '<option value="'.$rowcat['id'].'"> '.$rowcat['name'].' </option>';
                                    } ?>
                          </select> <br>

                           <label > Produit Image </label>
                           <input type="file" class="form-control" name="image" required> <br>

                          <label> Produit prix </label>
                          <input type="text" class="form-control" name="price" required> <br>

                          <label > Produit Description </label>
                          <textarea style="height:200px" class="form-control" name="desc" required> </textarea>  <br>

                           <button type="submit" style="width: 30%" name="add_product" class="btn btn-primary form-control" > Ajout Produit </button>
                    </form>
              </div>
            </div>
          </div>
        </div>
      </div>

 
      
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © siteWeb 2021 </span>
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